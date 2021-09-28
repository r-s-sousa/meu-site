<?php

// REFERÊNCIAS
use CoffeeCode\DataLayer\Connect;
use Symfony\Component\Dotenv\Dotenv;

/**
 * ENV file OBJ
 */
$dotenv = new Dotenv();

/**
 * Load ENV FILE
 */
$dotenv->load(dirname(__DIR__) . '/.env');

/**
 * Configuração do banco de dadoss
 */
define("DATA_LAYER_CONFIG", [
   "driver" => $_ENV['DRIVER'],
   "host" => $_ENV["HOST"],
   "port" => $_ENV["PORT"],
   "dbname" => $_ENV["DATABASE"],
   "username" => $_ENV["USERNAME"],
   "passwd" => $_ENV["PASSWORD"],
   "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
   ]
]);

// OBTÉM A CONEXÃO
Connect::getInstance();

// SE TIVER ERRO NA CONEXÃO COM BANCO DE DADOS, PARA A APLICAÇÃO
if (Connect::getError())
   die('error na conexão com o banco de dados');

/**
 * Nome do Site
 */
define("SITE", $_ENV['SITE']);

/**
 * Url inicial do Site
 */
define("URL", $_ENV['URL']);

/**
 * Define o fuso-horário brasileiro
 */
date_default_timezone_set('America/Sao_Paulo');
