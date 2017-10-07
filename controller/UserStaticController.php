<?php
  include_once('view/UserStaticView.php');

  class UserStaticController extends Controller
  {
  function __construct(){
      $this->view = new UserStaticView();
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
    public function panel(){
      $this->view->mostrarPanel();
    }
}
 ?>
