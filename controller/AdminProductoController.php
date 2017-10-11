<?php
  include_once('model/AdminProductoModel.php');
  include_once('view/AdminProductoView.php');
  include_once('model/AdminCategoriaModel.php');


  class AdminProductoController extends SecuredController
  {
  function __construct(){
      parent::__construct();
      $this->view = new AdminProductoView();
      $this->model = new AdminProductoModel();
      $this->catModel = new AdminCategoriaModel();

}
    public function index(){
      $this->view->mostrarIndex();
    }

   public function mostrarPanelDelantal(){
     $productos = $this->model->listarProductos();
     $categorias= $this->catModel->listarCategorias();
     $this->view->mostrarProductos($productos, $categorias);
   }
   public function createDel()
   {
     $talle = $_POST['talle'];
     $categoria = $_POST['categoria'];
     $descripcion=$_POST['descripcion'];
     $imagen = $_POST['imagen'];

    if(!empty($talle) && !empty($categoria)&& !empty($descripcion)&& !empty($imagen)){
      $this->model->guardarProducto($talle, $categoria, $descripcion,$imagen);
      $this->mostrarPanelDelantal();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function showEditProd()
   {
     echo "entre en show edit  prod";
     $id_producto = $_POST['id'] ;
     var_dump($id_producto);
     $categorias= $this->catModel->listarCategorias();
     $this->view->mostrarFormEditar($id_producto, $categorias);
   }
   public function editDel()
   {
     $id= $_POST['id_delantal'];
     $id_categoria = $_POST['categoria'] ;
     $talle = $_POST['talle'];
     $descripcion = $_POST['descripcion'];
     $imagen = $_POST['imagen'];
     var_dump($id);
     var_dump($id_categoria);
     var_dump($talle);
     var_dump($imagen);

    if(!empty($id_categoria) && !empty($talle)&& !empty($imagen)&& !empty($descripcion)&& !empty($id)){
      echo "entre en el if de editDel en producto Controller";
      $this->model->editarProducto($id,$talle, $descripcion,$id_categoria, $imagen);
      $this->mostrarPanelDelantal();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function deleteDel()
   {
       $id_producto = $_POST['id'] ;
       $this->model->borrarProducto($id_producto);
       $this->mostrarPanelDelantal();
   }
}
 ?>
