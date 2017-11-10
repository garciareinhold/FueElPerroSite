<?php
  require_once('../model/ComentariosModel.php');
  require_once('Api.php');

/**
 *
 */
class ComentariosApi extends Api
{

  function __construct()
  {
      parent::__construct();
      $this->model = new ComentariosModel();
  }

  public function getComentarios($url_params = [])
  {
    $id_delantal= $url_params[":id"];
    $comentarios = $this->model->getComentarios($id_delantal);
    $response= new stdClass();
    $response->comentarios=$comentarios;
    $response->status=200;
    return $this->json_response($response, 200);
  }

  public function getComentario($url_params = [])
  {
    $comentario = $this->model->getComentario($url_params[':id']);
    if($comentario){
      $response= new stdClass();
      $response->comentario= $comentario;
      $response->status=200;
      return $this->json_response($response, 200);
    }
    else return $this->json_response(false, 404);
  }

  public function deleteComentario($url_params = [])
  {
    $id_comentario = $url_params[":id"];
    $comentario = $this->model->getComentario($id_comentario);
    if($comentario)
    {
      $this->model->deleteComentario($url_params[':id']);
      return $this->json_response("Borrado exitoso.", 200);
    }
    else
      return $this->json_response(false, 404);
  }
  public function createComentario($url_params = []) {

    $body = json_decode($this->raw_data);
    $usuario = $body->usuario;
    $descripcion = $body->descripcion;
    $puntaje = $body->puntaje;
    $id_delantal = $body->id_delantal;

    $comentario = $this->model->guardarComentario($usuario, $descripcion, $puntaje, $id_delantal);

    $response= new stdClass();
    $response->comentario=[$comentario];
    $response->status=200;
    return $this->json_response($response, 200);
  }

}
?>
