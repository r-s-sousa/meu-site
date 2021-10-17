<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - Mensagens
 */
class Mensagem extends DataLayer
{
   /**
    * Construtor do DAO - Mensagens
    */
   public function __construct()
   {
      parent::__construct('mensagens', ['nome','email','titulo','mensagem']);
   }
   
}
