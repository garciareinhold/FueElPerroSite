<?php
  include_once('model/UsuarioModel.php');
  include_once('view/UsuarioView.php');

  class UsuarioController extends Controller
  {
  function __construct(){
      $this->view = new UsuarioView();
      $this->model = new UsuarioModel();
    }
    public function index(){
      $this->view->mostrarIndex();
    }
    public function home(){
      $this->view->mostrarHome();
    }
}
 ?>
