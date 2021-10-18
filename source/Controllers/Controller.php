<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

/**
 * Controlador base
 */
abstract class Controller
{
   /**
    * View do Plates
    *
    * @var Engine
    */
   protected $view;

   /**
    * Controlador de rotas do sistema
    *
    * @var Router
    */
   protected $router;

   /**
    * Construtor do controlador base
    *
    * @param Router $router
    */
   public function __construct($router)
   {
      // SETA O OBJ ROUTER NA CLASSE
      $this->router = $router;

      // DEFINE A PASTA DOS THEMAS A SEREM RENDERIZADOS
      $this->view = new Engine(dirname(__DIR__) . "/Views");

      // PASSA O OBJ CONTROLADOR DE ROTAS PARA TODOS TEMPLATES
      $this->view->addData(['router' => $router]);
   }
}
