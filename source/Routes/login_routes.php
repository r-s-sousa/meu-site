<?php

/**
 * Rotas GET
 */
$router->group(null);
$router->namespace("Source\Controllers");
$router->get('/blogAdm/login', 'LoginController:login', 'login.login');
$router->get('/blogAdm/logout', 'LoginController:logout', 'login.logout');

/**
 * Rotas POST
 */
$router->post('/blogAdm/login', 'LoginController:loginPost', 'login.post');
