<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * DAO - Usuário
 */
class User extends DataLayer
{
   /**
    * Construtor do DAO usuários
    */
   public function __construct()
   {
      parent::__construct(
         "usuarios",
         ["nome", "email", "password", "token"]
      );
   }
}
