<?php

/**
 * GET
 */
$router->group(null);
$router->get("/", "ProfileController:home", "profile.home");

/**
 * POST
 */
$router->post("/contato", "ProfileController:recebeDadosDeContato", "profile.recebeDadosDeContato");