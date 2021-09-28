<?php

/**
 * Apresenta todos argumentos passados de uma 
 * forma bem atrativa
 *
 * @param boolean $exit Finaliza o site após apresentar os dados
 * @return void
 */
function dd()
{
   $args = func_get_args();

   foreach ($args as $arg) {
      echo "<pre>";
      var_dump($arg);
      echo "</pre>";

      echo "<br>";
   }
}

/**
 * Retorna a url completa do projeto, concatenada do que o usuário
 * passar no parâmetro url
 *
 * @param string $url Url a ser concatenada a url base do site
 * @return string url completa
 */
function url($url = "")
{
   if ($url == "") {
      return URL . "/";
   }

   return URL . "/$url";
}

/**
 * Procura os arquivos dentro da pasta assets
 *
 * @param string $path
 * @return string
 */
function asset($path)
{
   return URL . "/themes/assets/{$path}";
}

/**
 * Adiciona na sessão uma chave com a mensagem a ser apresentar
 *
 * @param string $type
 * @param string $message
 * @return void
 */
function setMessage($type, $message)
{
   // Inicia a sessão
   if (!isset($_SESSION)) session_start();

   // Muda a sessão em si
   switch ($type) {
      case "sucesso":
         $_SESSION['mensagem'] = $message;
         break;
      case "error":
         $_SESSION['error'] = $message;
         break;
      default:
         break;
   }
}
