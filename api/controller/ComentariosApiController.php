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
    $Comentarios = $this->model->getComentarios($url_params[':id']);
    return $this->json_response($Comentarios, 200);
  }

  public function getComentario($url_params = [])
  {
    $Comentarios = $this->model->getComentario($url_params[':id']);
    return $this->json_response($Comentarios, 200);
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

}
?>
