<?php
  include_once('model/CategoriaModel.php');
  include_once('view/AdminView.php');

  class AdminController extends Controller
  {
  function __construct(){
      $this->view = new AdminView();
      $this->model = new CategoriaModel();

}
    public function index(){
      $this->view->mostrarIndex();
    }
    public function categoria(){
      $categorias = $this->model->getCategorias();
      $this->view->mostrarCategorias($categorias);
    }


}
 ?>
