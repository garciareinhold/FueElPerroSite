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

}
?>
