<?php

namespace Source\Support;

/**
 * Auxiliar do controlador Login
 */
class LoginSupport
{
   /**
    * Verifica se a sessão do usuário é válida
    *
    * @return boolean
    */
   public static function verificaSeEstaLogado(): bool
   {
      // Verifica se existe a sessão
      if (!isset($_SESSION['tokenUser'])) return false;

      $userToken = $_SESSION['tokenUser'];

      // Verifica se o usuário com esse Id existe no banco de dados
      $obUser = (new \Source\Models\User)->find('token = :tk', "tk=$userToken");

      if (!$obUser) return false;

      return true;
   }

   /**
    * Função para deslogar o usuário administrativo
    *
    * @return void
    */
   public static function logout(): void
   {
      if(isset($_SESSION['tokenUser']))
         unset($_SESSION['tokenUser']);

      return;
   }
}
