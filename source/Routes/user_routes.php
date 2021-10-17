<?php

/**
 * GET
 */
$router->group("blogAdm");
$router->get("/usuario/listar", "UserController:listar", "user.listar");
$router->get("/usuario/cadastrar", "UserController:cadastrar", "user.cadastrar");
$router->get("/usuario/editar/{id}", "UserController:editar", "user.editar");
$router->get("/usuario/deletar/{id}", "UserController:deletar", "user.deletar");
$router->get("/usuario/emailVerify", "UserController:emailVerify", "user.emailVerify");

/**
 * POST
 */
$router->post("/cadastrar", "UserController:cadOrEditUser", "user.cadOrEditUser");