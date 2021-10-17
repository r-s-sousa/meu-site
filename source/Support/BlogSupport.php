<?php

namespace Source\Support;

use CoffeeCode\Router\Router;
use Source\Controllers\Controller;
use Source\Models\Postagem;

/**
 * Suporte para controlador de blog
 */
class BlogSupport extends Controller
{
   /**
    * Construtor do suporte para controlador
    *
    * @param Router $router
    */
   public function __construct(Router $router)
   {
      parent::__construct($router);
   }

   /**
    * Obtém os 3 últimos posts
    *
    * @return array
    */
   public function getLastsPosts(): array
   {
      $arrayTextsAbreviado = [];
      $obPostagens = (new Postagem)->find('visivel = true')->order('id DESC')->limit(3)->fetch(true);
      if ($obPostagens) {
         foreach ($obPostagens as $obPostagem) {
            $arrayTextsAbreviado[] = [
               'texto' => trim(substr($obPostagem->titulo, 0, 17))  . "...",
               'slug' => $obPostagem->slug
            ];
         }
      }

      return $arrayTextsAbreviado;
   }
}
