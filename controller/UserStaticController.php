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
      $is_admin = FALSE;

      if(isset($_SESSION['LOGGED']) && $_SESSION['LOGGED']){
        $status = $_SESSION['LOGGED'];
        $is_admin=$_SESSION['ADMIN'];
      }
      $this->view->mostrarIndex($status,$is_admin);
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
