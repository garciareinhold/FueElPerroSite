<?php
  include_once('view/UserStaticView.php');

  class UserStaticController extends Controller
  {
  function __construct(){
      $this->view = new UserStaticView();
    }
    public function index(){
      session_start();
      $status = FALSE;
      if(isset($_SESSION['LOGGED']) && $_SESSION['LOGGED']){
        $status = $_SESSION['LOGGED'];
      }
      $this->view->mostrarIndex($status);
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
