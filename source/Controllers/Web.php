<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;

/**
 * Controlador das rotas iniciais
 */
class Web extends Controller
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
      echo $this->view->render('main/home', [
         'title' => "HOME | " . SITE,
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
