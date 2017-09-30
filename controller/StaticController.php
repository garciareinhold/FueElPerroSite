<?php
  include_once('view/StaticView.php');

  class StaticController extends Controller
  {
  function __construct(){
      $this->view = new StaticView();
    }
    public function index(){
      $this->view->mostrarIndex();
    }
    public function home(){
      $this->view->mostrarHome();
    }
    public function contacto(){
      $this->view->mostrarContacto();
    }
}
 ?>
