<?php
  include_once('model/CategoriaModel.php');
  include_once('view/CategoriaView.php');

  class CategoriaController extends Controller
  {
  function __construct(){
      $this->view = new CategoriaView();
      $this->model = new CategoriaModel();

}
    public function categoria(){
      $categorias = $this->model->getCategorias();
      $this->view->mostrarCategorias($categorias);
    }


}
 ?>
