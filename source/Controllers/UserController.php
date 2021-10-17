<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use Source\Models\User;

/**
 * User - Controller
 */
class UserController extends Controller
{
   /**
    * Construtor do controlador de usuários
    *
    * @param Router $router
    */
   public function __construct(Router $router)
   {
      parent::__construct($router);

      // Verifica se o usuário que está tentando acessar está devidamente logado
      if (!\Source\Support\LoginSupport::verificaSeEstaLogado())
         $this->router->redirect('login.login');
   }

   /**
    * Formulário de listagem de usuários
    *
    * @return void
    */
   public function listar(): void
   {
      $obUsers = (new User)->find()->fetch(true) ?? [];
      
      echo $this->view->render('blogAdm/users/listUsuarios', [
         'title' => "ADM Usuarios | " . SITE,
         'obUsers' => $obUsers
      ]);
   }

   /**
    * Formulário de cadastro de usuário
    *
    * @return void
    */
   public function cadastrar(): void
   {
      echo $this->view->render('blogAdm/users/cadUsuario', [
         'title' => "ADM Cad Usuário | " . SITE,
      ]);
   }

   /**
    * Formulário de edição de usuário
    *
    * @param array $data
    * @return void
    */
   public function editar(array $data): void
   {
      $id = filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);
      $obUser = (new User)->findById($id);

      if (!$obUser) {
         setMessage('error', 'Usuário não existe, então não pode ser editado!');
         $this->router->redirect('user.listar');
         return;
      }

      echo $this->view->render('blogAdm/users/edtUsuario', [
         'title' => "ADM Edt Usuário | " . SITE,
         'obUser' => $obUser
      ]);
   }

   /**
    * Ação de deletar usuário
    *
    * @param array $data
    * @return void
    */
   public function deletar(array $data): void
   {
      $id = \filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);
      $obUser = (new User)->findById($id);

      if (!$obUser) {
         setMessage('error', 'Erro ao tentar deletar usuário');
         $this->router->redirect('user.listar');
         return;
      }

      if ($obUser->token == $_SESSION['tokenUser']) {
         setMessage('error', 'Você não pode deletar sua própria conta!');
         $this->router->redirect('user.listar');
         return;
      }

      $nomeUsuarioDeletado = $obUser->nome;

      if ($obUser->destroy()) {
         setMessage('sucesso', 'Usuário ' . $nomeUsuarioDeletado . ' deletado com sucesso!');
         $this->router->redirect('user.listar');
         return;
      }

      setMessage('error', 'Erro ao tentar deletar usuário');
      $this->router->redirect('user.listar');
      return;
   }

   /**
    * Ação de cadastrar ou editar usuário
    *
    * @param array $data
    * @return void
    */
   public function cadOrEditUser(array $data): void
   {
      $token = password_hash(md5(date('Y-m-d H:i:s')), PASSWORD_DEFAULT);
      $obUser = new User;
      $email = \filter_var($data['email'], FILTER_VALIDATE_EMAIL);
      $emailPodeSerCadastrado = false;

      if (!$email) {
         echo jsonForResponseAjax(false, 'Email inválido!');
         return;
      }

      // VERIFICA SE EMAIL EXISTE NO BANCO DE DADOS
      $emailOb = (new User)->find('email = :e', "e=$email")->fetch(true);

      if (!$emailOb) {
         $emailPodeSerCadastrado = true;
      }

      if (isset($data['id'])) {
         $id = filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);
         $obUser = (new User)->findById($id);
         if (!$obUser) {
            echo jsonForResponseAjax(false, 'Usuário que foi solicitado atualização é inválido!');
            return;
         } else {
            $token = $obUser->token;
         }
         if (isset($emailOb[0])) {
            if ($emailOb[0]->email == $obUser->email)
               $emailPodeSerCadastrado = true;
         }
      }

      if ($emailPodeSerCadastrado == false) {
         echo jsonForResponseAjax(false, 'Email ja cadastrado!');
         return;
      }

      $password = password_hash(filter_var($data['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
      $obUser->nome = filter_var($data['nome'], FILTER_SANITIZE_STRING);
      $obUser->email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
      $obUser->password = $password;
      $obUser->token = $token;

      if ($obUser->save()) echo jsonForResponseAjax(true, 'Usuário cadastrado/atualizado com sucesso!');
      else echo jsonForResponseAjax(false, 'Error ao tentar cadastrar/atualizar usuário!');

      return;
   }

   /**
    * AJAX - verifica se emai é válido e se já existe
    *
    * @return void
    */
   public function emailVerify(): void
   {
      $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
      if (!$email) {
         echo json_encode(['resultado' => false, 'message' => "Email inválido!"]);
         return;
      }

      $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
      if ($id) {
         $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
         $userOb = (new User)->findById($id);

         if ($userOb->email == $email) {
            echo jsonForResponseAjax(true, 'Email igual ao cadastrado');
            return;
         }
      }

      // VERIFICA SE EMAIL EXISTE NO BANCO DE DADOS
      $emailOb = (new User)->find('email = :e', "e=$email")->fetch(true);

      if (!$emailOb) {
         echo json_encode(['resultado' => true, 'message' => "Email válido!"]);
         return;
      }

      // SE EMAIL JÁ EXISTIR
      if (count($emailOb)) {
         echo json_encode(['resultado' => false, 'message' => "Email já cadastrado!"]);
         return;
      }
   }
}
