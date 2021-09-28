<?php

// REFERÊNCIAS
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
