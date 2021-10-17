<?php

namespace Source\Controllers;

use Source\Models\User;

/**
 * Login - Controlador
 */
class LoginController extends Controller
{
   /**
    * Construtor do controlador de login
    *
    * @param $router
    */
   public function __construct($router)
   {
      parent::__construct($router);
   }

   /**
    * Formulário de login
    */
   public function login()
   {
      // Se já estiver logado, redireciona pra página do blog
      if(\Source\Support\LoginSupport::verificaSeEstaLogado())
         $this->router->redirect('BlogAdm.home');

      echo $this->view->render('login/login', [
         'title' => "Login | " . SITE
      ]);
   }

   /**
    * Desloga o usuário administrativo
    *
    * @return void
    */
   public function logout(): void
   {
      \Source\Support\LoginSupport::logout();
      $this->router->redirect('login.login');
   }
   
   /**
    * Faz o login em si
    *
    * @param array $data
    * @return void
    */
   public function loginPost($data)
   {
      $data = filter_var_array($data, FILTER_SANITIZE_STRING);
      $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

      // se email for inválido
      if(!$email) return false;

      // VERIFICA SE EMAIL EXISTE NO BANCO DE DADOS
      $emailOb = (new User)->find('email = :e', "e=$email")->fetch(true);

      // SE EMAIL NÃO EXISTE
      if (!count($emailOb)) {
         setMessage('error', "<strong>Dados</strong> incorretos!");
         $this->router->redirect('login.login');
         return;
      }

      // SE A SENHA NÃO CORRESPONDER COM A SENHA CADASTRADA NO BANCO DE DADOS
      if (!password_verify($data['password'], $emailOb[0]->password)) {
         setMessage('error', "<strong>Dados</strong> incorretos!");
         $this->router->redirect('login.login');
         return;
      }

      $_SESSION['tokenUser'] = $emailOb[0]->token;

      $this->router->redirect('BlogAdm.home');
      return;
   }
}
