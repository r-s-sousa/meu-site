<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use Source\Models\Categoria;
use Source\Models\Mensagem;
use Source\Models\Postagem;
use Source\Support\BlogAdmSupport;
use Source\Support\Categorias;
use stdClass;

/**
 * BlogAdm - Controlador
 */
class BlogAdmController extends Controller
{
   /**
    * Construtor do Controlador de blog administrativo
    *
    * @param Router $router
    */
   public function __construct(Router $router)
   {
      parent::__construct($router);

      // Verifica se está logado
      if (!\Source\Support\LoginSupport::verificaSeEstaLogado()) {
         setMessage('error', 'Logue-se 1º');
         $this->router->redirect('login.login');
      }
   }

   // ===================== POSTAGEM ===================== //

   /**
    * Listagem de posts
    *
    * @return void
    */
   public function posts(): void
   {
      $obPosts = (new Postagem)->find()->fetch(true) ?? new stdClass();;
      $categoriasName = [];

      foreach ($obPosts as $post) {
         $categoriasName[$post->id] = Categorias::getAllCategoriasByJson($post->categorias);
      }

      echo $this->view->render('blogAdm/listPosts', [
         'title' => "ADM | " . SITE,
         'obPosts' => $obPosts,
         'categoriasName' => $categoriasName
      ]);
   }

   /**
    * Formulário para cadastro de post
    *
    * @return void
    */
   public function cadPost(): void
   {
      $obCategorias = (new Categoria)->find()->fetch(true);

      echo $this->view->render('blogAdm/cadPost', [
         'title' => 'Cad Post | ' . SITE,
         'obCategorias' => $obCategorias
      ]);
   }

   /**
    * Formulário de edição de post
    *
    * @param array $data
    * @return void
    */
   public function edtPost(array $data): void
   {
      $id = filter_var($data['id'], FILTER_VALIDATE_INT);
      $obPost = (new Postagem)->findById($id);
      $obCategorias = (new Categoria)->find()->fetch(true);

      if (!$id || !$obPost) {
         setMessage('error', "Selecione um post existente!");
         $this->router->redirect('BlogAdm.home');
      }

      echo $this->view->render('blogAdm/edtPost', [
         'title' => "Edt Post | " . SITE,
         'obPost' => $obPost,
         'obCategorias' => $obCategorias
      ]);
   }

   /**
    * Ação de Cadastro de post
    *
    * @return void
    */
   public function cadPostDados(array $dados): void
   {
      $uploaddir = dirname(__DIR__) . "/Views/blog/partials/imgs/";
      $ext = explode(".", $_FILES['img']['name']);
      $ext = "." . $ext[count($ext) - 1];
      $nomeArquivo = md5(date('Y-m-d H:i:s')) . $ext;
      $uploadfile = $uploaddir . basename($nomeArquivo);
      $resultadoMoveFile = move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

      $htmlEntities = filter_var($dados['descricao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $obPost = (new Postagem);
      $obPost->titulo = $dados['titulo'];
      $obPost->descricao = $htmlEntities;
      $obPost->subtitulo = filter_var($dados['subtitulo'], FILTER_SANITIZE_STRING);
      $obPost->slug = filter_var($dados['slug'], FILTER_SANITIZE_STRING);
      $obPost->visivel = filter_var($dados['visivel'], FILTER_SANITIZE_NUMBER_INT);
      $obPost->imgPath = $resultadoMoveFile ? $nomeArquivo : "";
      $obPost->dataPostagem = date('Y-m-d');
      $obPost->categorias = json_encode($dados['categoria']);
      if ($obPost->save()) setMessage('sucesso', 'Cadastrado com sucesso!');

      $this->router->redirect('BlogAdm.home');
      return;
   }

   /**
    * Ação de Edição de post
    *
    * @return void
    */
   public function edtPostDados(array $dados): void
   {
      $obPost = (new Postagem)->findById($dados['id']);
      $uploaddir = dirname(__DIR__) . "/Views/blog/partials/imgs/";
      if (strlen($_FILES['img']['name']) > 0) {
         $ext = explode(".", $_FILES['img']['name']);
         $ext = "." . $ext[count($ext) - 1];
         $nomeArquivo = md5(date('Y-m-d H:i:s')) . $ext;
         $uploadfile = $uploaddir . basename($nomeArquivo);
         move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
      } else {
         $nomeArquivo = $obPost->imgPath;
      }

      $htmlEntities = filter_var($dados['descricao'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $obPost->titulo = $dados['titulo'];
      $obPost->descricao = $htmlEntities;
      $obPost->subtitulo = filter_var($dados['subtitulo'], FILTER_SANITIZE_STRING);
      $obPost->slug = filter_var($dados['slug'], FILTER_SANITIZE_STRING);
      $obPost->visivel = filter_var($dados['visivel'], FILTER_SANITIZE_NUMBER_INT);
      $obPost->imgPath = $nomeArquivo;
      $obPost->dataPostagem = date('Y-m-d');
      $obPost->categorias = json_encode($dados['categoria']);
      if ($obPost->save()) setMessage('sucesso', 'Atualizado com sucesso!');

      $this->router->redirect('BlogAdm.home');
      return;
   }

   /**
    * Ação de Remoção de post
    *
    * @param array $data
    * @return void
    */
   public function delPost(array $data): void
   {
      $id = filter_var($data['id'], FILTER_VALIDATE_INT);
      if (!$id) {
         setMessage('error', 'Error ao tentar deletar Post');
         $this->router->redirect('BlogAdm.home');
      }

      $obPost = (new Postagem)->findById($id);

      if (!$obPost) {
         setMessage('error', 'Postagem não encontrada para remoção');
         $this->router->redirect('BlogAdm.home');
      }

      if ($obPost->destroy()) setMessage('sucesso', 'Postagem deletada com sucesso');
      else setMessage('sucesso', 'Postagem deletada com sucesso');

      $this->router->redirect('BlogAdm.home');
      return;
   }

   /**
    * AJAX - Verifica se slug já existe
    *
    * @param array $data
    * @return void
    */
   public function verifySlugExists(array $data)
   {
      BlogAdmSupport::verificaSeSlugDigitadoEhValido($data);
   }

   // ===================== CATEGORIA ===================== //

   /**
    * Formulário de listagem de categorias
    *
    * @return void
    */
   public function categorias(): void
   {
      $obCategorias = (new Categoria)->find()->fetch(true) ?? new stdClass();
      $qtdByCateriaId = [];


      foreach ($obCategorias as $categoria) {
         $qtdByCateriaId[$categoria->id] = Categorias::getQtdPostsWiteCategory($categoria->id);
      }

      echo $this->view->render('blogAdm/listCategorias', [
         'title' => "ADM | " . SITE,
         'obCategorias' => $obCategorias,
         'qtdByCateriaId' => $qtdByCateriaId
      ]);
   }

   /**
    * Formulário de cadastro de categoria
    *
    * @return void
    */
   public function cadCategoria(): void
   {
      echo $this->view->render('blogAdm/cadCategoria', ['title' => 'Cad Categoria | ' . SITE]);
   }

   /**
    * Formulário de edição de categoria
    *
    * @param array $data
    * @return void
    */
   public function edtCategoria(array $data): void
   {
      $id = filter_var($data['id'], FILTER_VALIDATE_INT);
      $obCategoria = (new Categoria)->findById($id);

      if (!$id || !$obCategoria) {
         setMessage('error', "Selecione uma categoria existente!");
         $this->router->redirect('BlogAdm.categorias');
      }

      $this->view->render('blogAdm/edtCategoria', [
         'title' => "Edt Categoria | " . SITE,
         'obCategoria' => $obCategoria
      ]);
   }

   /**
    * AJAX - Ação de Cadastro de categoria
    *
    * @param array $dados
    * @return void
    */
   public function cadCategoriaDados($dados): void
   {
      $dados = filter_var_array($dados, FILTER_SANITIZE_STRING);
      $categoria = $dados['categoria'];
      $categoria = "#" . str_replace(' ', '_', trim($categoria));

      $obCategoria = (new Categoria)->find('categoria = :c', "c=$categoria")->fetch();
      if ($obCategoria) {
         echo json_encode(['resultado' => false, 'mensagem' => "Categoria já cadastrada"]);
         return;
      }

      $categoria = ltrim($categoria, "#");
      $obCategoria = (new Categoria);
      $obCategoria->categoria = "#" . str_replace(' ', '_', trim($categoria));

      if ($obCategoria->save()) {
         echo json_encode(['resultado' => true, 'mensagem' => "Cadastrado com sucesso!"]);
      } else {
         echo json_encode(['resultado' => false, 'mensagem' => "Error ao tentar cadastrar Categoria!"]);
      }
      return;
   }

   /**
    * AJAX - Ação de edição de categoria
    *
    * @return void
    */
   public function edtCategoriaDados(): void
   {
      $idPraAtualizar = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

      $obCategoria = (new Categoria)->findById($idPraAtualizar);
      if (!$obCategoria) {
         echo json_encode(['resultado' => false, 'mensagem' => 'categoria selecionada não existe']);
         return;
      }

      $novoValor = filter_input(INPUT_POST, 'novoValor', FILTER_SANITIZE_STRING);

      $categoria = str_replace(' ', '_', trim($novoValor));
      $obCategoriaProcurado = (new Categoria)->find('categoria = :c', "c=$categoria")->fetch();

      if ($obCategoriaProcurado) {
         if ($obCategoria->id != $obCategoriaProcurado->id) {
            echo json_encode(['resultado' => false, 'mensagem' => "Categoria já cadastrada"]);
            return;
         }
      }

      $novoValor = ltrim($novoValor, "#");
      $obCategoria->categoria = "#" . str_replace(' ', '_', trim($novoValor));
      $obCategoria->save();

      echo json_encode([
         'resultado' => true,
         'mensagem' => 'categoria atualizada com sucesso',
         'categoria' => $obCategoria->categoria
      ]);
      return;
   }

   /**
    * AJAX - Ação de remoção de categoria
    *
    * @return void
    */
   public function delCategoria(): void
   {
      $idPraDeletar = $_GET['id'];

      $obCategoria = (new Categoria)->findById($idPraDeletar);
      if (!$obCategoria) {
         echo json_encode(['resultado' => false, 'mensagem' => 'categoria selecionada não existe']);
         return;
      }
      $obCategoria->destroy();
      echo json_encode(['resultado' => true, 'mensagem' => 'categoria deletada com sucesso']);
      return;
   }

   // ===================== MENSAGENS ===================== //

   /**
    * Formulário de listagem de mensagens
    *
    * @return void
    */
   public function listarMensagens(): void
   {
      $obMensagens = (new Mensagem)->find()->fetch(true) ?? [];

      echo $this->view->render('blogAdm/mensagens/listMensagens', [
         'title' => 'BlogAdm Listagem de mensagens | '. SITE,
         'obMensagens' => $obMensagens
      ]);
   }

   /**
    * Ação de enviar email de feedback para o usuário.
    *
    * @param array $data
    * @return void
    */
   public function enviarEmail(array $data): void
   {
      $id = filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);
      dd($id);
   }
   
}
