<?php

/**
 * GET
 */
$router->group('blogAdm');
$router->get("/", "BlogAdmController:posts", "BlogAdm.home");
$router->get("/categorias", "BlogAdmController:categorias", "BlogAdm.categorias");
$router->get("/cadPost", "BlogAdmController:cadPost", "BlogAdm.cadPost");
$router->get("/cadCategoria", "BlogAdmController:cadCategoria", "BlogAdm.cadCategoria");
$router->get("/edtPost/{id}", "BlogAdmController:edtPost", "BlogAdm.edtPost");
$router->get("/delPost/{id}", "BlogAdmController:delPost", "BlogAdm.delPost");
$router->get("/edtCategoria/{id}", "BlogAdmController:edtCategoria", "BlogAdm.edtCategoria");
$router->get("/delCategoria", "BlogAdmController:delCategoria", "BlogAdm.delCategoria");
$router->get("/mensagens", "BlogAdmController:listarMensagens", "BlogAdm.listarMensagens");
$router->get("/enviarEmail/{id}", "BlogAdmController:enviarEmail", "BlogAdm.enviarEmail");

/**
 * POST
 */
$router->post('/edtPost', "BlogAdmController:edtPostDados", "BlogAdm.edtPostDados");
$router->post('/edtCategoria', "BlogAdmController:edtCategoriaDados", "BlogAdm.edtCategoriaDados");
$router->post('/verifySlugExists', "BlogAdmController:verifySlugExists", "BlogAdm.verifySlugExists");
$router->post('/cadPost', "BlogAdmController:cadPostDados", "BlogAdm.cadPostDados");
$router->post('/cadCategoria', "BlogAdmController:cadCategoriaDados", "BlogAdm.cadCategoriaDados");
