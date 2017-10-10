<?php
  include_once('view/AdminStaticView.php');

  class AdminStaticController extends SecuredController
  {
  function __construct(){
      parent::__construct();
      $this->view = new AdminStaticView();
    }
    public function index(){
      $this->view->mostrarIndex();
    }

}
 ?>
