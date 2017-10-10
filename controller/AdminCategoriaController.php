<?php
  include_once('model/AdminCategoriaModel.php');
  include_once('view/AdminCategoriaView.php');

  class AdminCategoriaController extends SecuredController
  {
  function __construct(){
      parent::__construct();
      $this->view = new AdminCategoriaView();
      $this->model = new AdminCategoriaModel();

}
    public function index(){
      $this->view->mostrarIndex();
    }

   public function mostrarCategoria(){
     $categorias = $this->model->listarCategorias();
     $this->view->mostrarCategorias($categorias);
   }
   public function createCat()
   {
     $nombre = $_POST['nombre'];
     $precio = $_POST['precio'];
     $imagen = $_POST['imagen'];
    if(!empty($nombre) && !empty($precio)&& !empty($imagen)){
      $this->model->guardarCategoria($nombre, $precio, $imagen);
      $this->mostrarCategoria();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function showEditCat()
   {
     $id_categoria = $_POST['id'] ;
     $this->view->mostrarFormEditar($id_categoria);
   }
   public function editCat()
   {
     $id_categoria = $_POST['categoria'] ;
     $nombre = $_POST['nombre'];
     $precio = $_POST['precio'];
     $imagen = $_POST['imagen'];
    if(!empty($nombre) && !empty($precio)&& !empty($imagen)){
      $this->model->editarCategoria($id_categoria,$imagen,$precio,$nombre);
      $this->mostrarCategoria();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function deleteCat()
   {
       $id_categoria = $_POST['id'] ;
       $this->model->borrarCategoria($id_categoria);
       $this->mostrarCategoria();
   }
}
 ?>
