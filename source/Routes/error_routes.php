<?php

/**
 * GET
 */

$router->group("error");
$router->get("/{errcode}", "ErrorController:error", "error.error");


/**
 * POST
 */