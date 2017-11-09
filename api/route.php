<?php

define('RESOURCE', 0);
define('PARAMS', 1);

include_once 'config/Router.php';
include_once '../model/Model.php';
include_once 'controller/ComentariosApiController.php';
//controllers

$router = new Router();
//url, verb, controller, method
$router->AddRoute("comentarios/:id","GET","ComentariosApi","getComentarios");
$router->AddRoute("comentario/:id","GET","ComentariosApi","getComentario");
$router->AddRoute("comentario/:id", "DELETE", "ComentariosApi", "deleteComentario");
$router->AddRoute("comentario/:id", "POST", "ComentariosApi", "createComentario");

$route = $_GET['resource'];
$array = $router->Route($route);

if(sizeof($array) == 0)
  echo "404";
else
{
  $controller = $array[0];
  $metodo = $array[1];
  $url_params = $array[2];
  echo (new $controller())->$metodo($url_params);
}





?>
