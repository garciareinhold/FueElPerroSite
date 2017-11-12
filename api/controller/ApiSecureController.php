<?php
  require_once('../model/ComentariosModel.php');
  require_once('Api.php');
class ApiSecureController extends Api
{

  function __construct()
  {
    parent::__construct();
    $this->model = new ComentariosModel();
    session_start();
    if(!isset($_SESSION['USER'])){
      header('Location: '.LOGIN);
      die();
    }
  }

  public function deleteComentario($url_params = [])
  {
    if($_SESSION['ADMIN'] == 1){
      $id_comentario = $url_params[":id"];
      $comentario = $this->model->getComentario($id_comentario);
      if($comentario)
      {
        $this->model->deleteComentario($url_params[':id']);
        return $this->json_response("Borrado exitoso.", 200);
      }
      else
      {
        return $this->json_response(false, 404);
      }
    }
    else
    {
      return $this->json_response(false, 404);
    }
  }
  public function createComentario($url_params = []) {
    if ($_SESSION['LOGGED'] && $_SESSION['ADMIN'] == 0) {
      $body = json_decode($this->raw_data);
      $usuario = $body->usuario;
      $descripcion = $body->descripcion;
      $puntaje = $body->puntaje;
      $id_delantal = $body->id_delantal;
      $userName = $this->model->getUserByID($usuario);
      if (($_SESSION['USER'])==($userName[0]["username"])) {

        $comentario = $this->model->guardarComentario($usuario, $descripcion, $puntaje, $id_delantal);
        $response= new stdClass();
        $response->comentario=[$comentario];
        $response->status=200;
        return $this->json_response($response, 200);
      }
      else {
        return $this->json_response(false, 404);
      }
    }
    else {
      return $this->json_response(false, 404);
    }
  }
}
?>
