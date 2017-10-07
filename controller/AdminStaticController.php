<?php
  include_once('view/AdminStaticView.php');

  class AdminStaticController extends Controller
  {
  function __construct(){
      $this->view = new AdminStaticView();
    }
    public function index(){
      $this->view->mostrarIndex();
    }
  
}
 ?>
