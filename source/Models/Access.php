<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - Access
 */
class Access extends DataLayer
{
   /**
    * Construtor do DAO User
    */
   public function __construct()
   {
      parent::__construct('acessos', ['ip'], 'id', false);
   }
}
