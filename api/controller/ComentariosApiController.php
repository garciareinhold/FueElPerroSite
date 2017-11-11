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
    for ($i=0; $i < sizeOf($comentarios) ; $i++) {
     $user = $this->model->getUserByID($comentarios[$i]['usuario']);
     $comentarios[$i]["usuario"] = $user[0]["username"];
    }
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

}
?>
