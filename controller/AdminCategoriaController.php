<?php
  include_once('model/AdminCategoriaModel.php');
  include_once('view/AdminCategoriaView.php');

  class AdminCategoriaController extends Controller
  {
  function __construct(){
      $this->view = new AdminCategoriaView();
      $this->model = new AdminCategoriaModel();

}
    public function index(){
      $this->view->mostrarIndex();
    }
   private function getCategorias()
   {
     $categorias = $this->model->listarCategorias();
     $this->view->mostrarCategorias($categorias);
   }
   public function mostrarPanelCategoria(){
     $categorias = $this->model->listarCategorias();
     $this->view->mostrarCrearCategorias($categorias);
   }
   public function createCat()
   {
     $nombre = $_POST['nombre'];
     $precio = $_POST['precio'];
     $imagen = $_POST['imagen'];
    if(!empty($nombre) && !empty($precio)&& !empty($imagen)){
      $this->model->guardarCategoria($nombre, $precio, $imagen);
      $this->getCategorias();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function deleteCat()
   {
       $id_categoria = $_POST['id'] ;
       $this->model->borrarCategoria($id_categoria);
       $this->getCategorias();
   }
}
 ?>
