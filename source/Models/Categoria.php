<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - Postagens
 */
class Categoria extends DataLayer
{
   /**
    * Construtor DAO - Postagens
    */
   public function __construct()
   {
      parent::__construct('categorias', ['categoria'], 'id', false);
   }
}