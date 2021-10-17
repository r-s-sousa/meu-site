<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - Postagens
 */
class Postagem extends DataLayer
{
   /**
    * Construtor DAO - Postagens
    */
   public function __construct()
   {
      parent::__construct('postagens', ['titulo', 'descricao', 'subtitulo', 'slug', 'imgPath', 'dataPostagem', 'categorias'], 'id', true);
   }
}