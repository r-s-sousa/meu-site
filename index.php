<?php

// MOSTRA OS ERROS
ini_set('display_errors', "1");

// INICIA A SESSÃO
session_start();

// INLCUI A CLASSE ROUTER
use CoffeeCode\Router\Router;

// INCLUI O AUTOLOAD
require __DIR__ . "/vendor/autoload.php";

// NOVO OBJ DO TIPO ROUTER
$router = new Router(URL);

// DEFINE O NAMESPACE DOS CONTROLADORES
$router->namespace("Source\Controllers");

// BASE PAGE
require_once __DIR__ . "/source/Routes/web_routes.php";

// ERRORS
require_once __DIR__ . "/source/Routes/error_routes.php";

// EXECUTA AS ROTAS
$router->dispatch();

// REDIRECIONA TODOS ERROS
if ($router->error()) $router->redirect('error.error', ['errcode' => $router->error()]);
