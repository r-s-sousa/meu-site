<?php

namespace Source\Controllers;

use CoffeeCode\Paginator\Paginator;
use CoffeeCode\Router\Router;
use Source\Models\Categoria;
use Source\Models\Postagem;
use Source\Support\BlogSupport;
use Source\Support\Categorias;
use Source\Support\PostSupport;

/**
 * Blog - Controlador
 */
class BlogController extends Controller
{
   /**
    * Variável que guardará as categorias
    *
    * @var array
    */
   private $obCategorias;

   /**
    * Variável que guardará as últimas 3 postagens
    *
    * @var array
    */
   private $ultimas;

   /**
    * Variável que guardará a quantidade de posts por categoria
    *
    * @var array
    */
   private $countCategorias;

   /**
    * Construtor do controlador do Blog
    *
    * @param Router $router
    */
   public function __construct(Router $router)
   {
      parent::__construct($router);
      $this->obCategorias = (new Categoria)->find()->fetch(true);
      $this->ultimas = (new BlogSupport($router))->getLastsPosts();
      $this->countCategorias = Categorias::getAllQtdCategorys();
   }

   /**
    * Formulário principal do BLOG (listagem de posts)
    *
    * @return void
    */
   public function home(): void
   {
      $obPostagens = (new Postagem)->find('visivel = true')->order('id DESC')->fetch(true);
      
      $obPostagens = (new Postagem);
      $blogUrl = URL . "/blog/?page=";
      $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED);
      $paginator = new Paginator($blogUrl, "Página", ['Primeira página', 'Primeira'], ['Última página', 'Última']);
      $paginator->pager($obPostagens->find('visivel = true')->count(), 3, $page, 2);
      $obPostagens = $obPostagens->find('visivel = true')->order('id DESC')->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

      $paginatorHtml = $paginator->render();

      if (!$obPostagens) $obPostagens = [];
      $postagensRenderizadas = PostSupport::renderizaPostagens($obPostagens, $this->view, $this->router);

      echo $this->view->render('blog/blog', [
         'title' => "BLOG | " . SITE,
         'posts' => $postagensRenderizadas,
         'mainPage' => true,
         'obCategorias' => $this->obCategorias,
         'ultimas' => $this->ultimas,
         'countCategorias' => $this->countCategorias,
         'paginator' => $paginatorHtml,
      ]);
   }

   /**
    * Formulario com dados de um post específico
    *
    * @param array $data
    * @return void
    */
   public function showPost(array $data): void
   {
      $slug = filter_var($data['postSlug'], FILTER_SANITIZE_STRING);
      $obPost = (new Postagem)->find('visivel = true AND slug = :sl', "sl=$slug")->fetch();
      $htmlFinal = PostSupport::renderizaPostagem($obPost, $this->view, false, 'xl', $this->router);

      echo $this->view->render('blog/blog', [
         'title' => "$slug | " . SITE,
         'posts' => $htmlFinal,
         'obCategorias' => $this->obCategorias,
         'ultimas' => $this->ultimas,
         'countCategorias' => $this->countCategorias
      ]);
   }

   /**
    * Formulário com os posts encontrados de uma dada pesquisa
    *
    * @param array $data
    * @return void
    */
   public function searchPost(array $data): void
   {
      $pesquisa = trim(filter_input(INPUT_GET, 'pesquisa', FILTER_SANITIZE_STRING));

      if (substr($pesquisa, 0, 1)  == "#") {
         $categoria = $pesquisa;
         $this->searchCategoria(['categoria' => ltrim($categoria, '#')]);
         die();
      }

      $obPostagens = (new Postagem)->find('visivel = true AND titulo LIKE :p OR subtitulo LIKE :p', "p=%$pesquisa%")->order('id DESC')->fetch(true);

      if (!$obPostagens) {
         $obPostagens = [];
         $postagensRenderizadas = null;
      } else {
         $postagensRenderizadas = PostSupport::renderizaPostagens($obPostagens, $this->view);
      }

      echo $this->view->render('blog/blogSearch', [
         'title' => "BLOG | " . SITE,
         'posts' => $postagensRenderizadas,
         'pesquisa' => $pesquisa,
         'obCategorias' => $this->obCategorias,
         'ultimas' => $this->ultimas,
         'countCategorias' => $this->countCategorias,
         'countPosts' => count($obPostagens),
      ]);
   }

   /**
    * Formulário com os posts encontrados de uma dada categoria
    *
    * @param array $data
    * @return void
    */
   public function searchCategoria(array $data): void
   {
      $categoriaName = "#" . filter_var($data['categoria'], FILTER_SANITIZE_STRING);
      $obCategoria = Categorias::getCategoryObjByName($categoriaName);
      $obPostagens = [];
      if ($obCategoria) {
         // descobrir todas pessoas que tem essa categoria
         $obPostagens = Categorias::getPostagensWithContainsCategoryId($obCategoria->id);
      }

      $postagensRenderizadas = PostSupport::renderizaPostagens($obPostagens, $this->view, $this->router);

      echo $this->view->render('blog/blogSearch', [
         'title' => "BLOG | " . SITE,
         'posts' => $postagensRenderizadas,
         'pesquisa' => $categoriaName,
         'obCategorias' => $this->obCategorias,
         'ultimas' => $this->ultimas,
         'countCategorias' => $this->countCategorias,
         'countPosts' => count($obPostagens)
      ]);
   }
}
