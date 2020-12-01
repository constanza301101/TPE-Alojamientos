<?php
require_once 'routerClass.php';
require_once 'api/ApiComentariosController.php';

$router = new Router();

// RUTEO API REST
$router->addRoute('comentarios', 'GET', 'ApiComentariosController', 'showCommentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentariosController', 'showCommentarios');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentariosController', 'deleteCommentarios');
$router->addRoute('comentarios', 'POST', 'ApiComentariosController', 'addCommentarios');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);