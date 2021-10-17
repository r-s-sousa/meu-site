<?php

/**
 * GET
 */
$router->group('blog');
$router->get("/", "BlogController:home", "blog.home");
$router->get("/posts", 'BlogController:searchPost', 'blog.searchPost');
$router->get('/posts/categoria/{categoria}', 'BlogController:searchCategoria', 'blog.searchCategoria');
$router->get("/posts/{postSlug}", "BlogController:showPost", "blog.showPost");

/**
 * POST
 */
