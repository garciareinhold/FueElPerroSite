<?php
  include_once('model/AdminProductoModel.php');
  include_once('view/AdminProductoView.php');
  include_once('model/AdminCategoriaModel.php');


  class AdminProductoController extends Controller
  {
  function __construct(){
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
     echo("termine el mostrar");

   }
   public function createDel()
   {
     $talle = $_POST['talle'];
     $categoria = $_POST['categoria'];
     $descripcion=$_POST['descripcion'];
     $imagen = $_POST['imagen'];

    if(!empty($talle) && !empty($categoria)&& !empty($descripcion)&& !empty($imagen)){
      echo("entre en el if");
      $this->model->guardarProducto($talle, $categoria, $descripcion,$imagen);
      echo("termine el guardar");
      $this->mostrarPanelDelantal();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function showEditProd()
   {
     $id_producto = $_POST['id'] ;
     $this->view->mostrarFormEditar($id_producto);
   }
   public function editProd()
   {
     $id_categoria = $_POST['categoria'] ;
     $talle = $_POST['talle'];
     $descripcion = $_POST['descripcion'];
     $imagen = $_POST['imagen'];
    if(!empty($id_categoria) && !empty($talle)&& !empty($imagen)&& !empty($descripcion)){
      $this->model->editarProducto($id_categoria,$talle,$descripcion,$imagen);
      $this->mostrarPanelDelantal();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function deleteProd()
   {
       $id_categoria = $_POST['id'] ;
       $this->model->borrarProducto($id_producto);
       $this->mostrarPanelDelantal();
   }
}
 ?>
