<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use Source\Models\Access;
use Source\Models\Mensagem;

/**
 * Controlador das rotas iniciais
 */
class ProfileController extends Controller
{
   /**
    * Construtor do controlador de rotas iniciais
    *
    * @param Router $router
    */
   public function __construct($router)
   {
      parent::__construct($router);
   }

   /**
    * Página incial
    *
    * @return void
    */
   public function home(): void
   {
      $ipPC = $_SERVER['REMOTE_ADDR'];
      $obNewAcess = (new Access)->find('ip = :ip', "ip=$ipPC")->fetch();
      // Verifica se já existe, caso não exista cadastra
      if (!$obNewAcess) {
         $obNewAcess = new Access;
         $obNewAcess->ip = $ipPC;
         $obNewAcess->save();
      }

      $qtdAcessos = (new Access)->find()->count();

      echo $this->view->render('main/home', [
         'title' => "HOME | " . SITE,
         'qtdAcessos' => $qtdAcessos
      ]);
   }

   /**
    * Cadastra as mensagens passadas pelo usuário no banco de dados
    *
    * @param array $data
    * @return void
    */
   public function recebeDadosDeContato(array $data): void
   {
      $nome = filter_var($data['name'], FILTER_SANITIZE_STRING);
      $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
      $subject = filter_var($data['subject'], FILTER_SANITIZE_STRING);
      $message = filter_var($data['message'], FILTER_SANITIZE_STRING);

      if (!$email) {
         echo jsonForResponseAjax(false, 'Digite um email válido!');
         return;
      }
      
      $obMensagem = (new Mensagem);
      $obMensagem->nome = $nome;
      $obMensagem->email = $email;
      $obMensagem->titulo = $subject;
      $obMensagem->mensagem = $message;

      if ($obMensagem->save()) echo jsonForResponseAjax(true, 'Mensagem enviada com sucesso!');
      else echo jsonForResponseAjax(false, 'Error no cadastro da mensagem!');

      return;
   }
}
