<?php

define('RESOURCE', 0);
define('PARAMS', 1);

include_once 'config/Router.php';
include_once '../model/Model.php';
include_once 'controller/ComentariosApiController.php';
include_once 'controller/ApiSecureController.php';


$router = new Router();

$router->AddRoute("comentarios/:id","GET","ComentariosApi","getComentarios");
$router->AddRoute("comentario/:id","GET","ComentariosApi","getComentario");
$router->AddRoute("comentario/:id", "DELETE", "ApiSecureController", "deleteComentario");
$router->AddRoute("comentario", "POST", "ApiSecure", "createComentario");

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
