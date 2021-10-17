<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use Source\Models\Access;

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
      if(!$obNewAcess){
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
    * Página de sobre
    *
    * @return void
    */
   public function about(): void
   {
      echo $this->view->render('main/about', [
         'title' => "Sobre | " . SITE
      ]);
   }
}
