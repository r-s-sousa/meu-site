<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - User
 */
class User extends DataLayer
{
   /**
    * Construtor do DAO User
    */
   public function __construct()
   {
      parent::__construct('usuarios', ['nome', 'email', 'password']);
   }
}
