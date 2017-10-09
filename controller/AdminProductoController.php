<?php
  include_once('model/AdminProductoModel.php');
  include_once('view/AdminProductoView.php');

  class AdminProductoController extends Controller
  {
  function __construct(){
      $this->view = new AdminProductoView();
      $this->model = new AdminProductoModel();

}
    public function index(){
      $this->view->mostrarIndex();
    }

   public function mostrarProducto(){
     $productos = $this->model->listarProductos();
     $this->view->mostrarProductos($productos);
   }
   public function createProd()
   {
     $talle = $_POST['talle'];
     $categoria = $_POST['categoria'];
     $descripcion=$_POST['descripcion'];
     $imagen = $_POST['imagen'];
     
    if(!empty($talle) && !empty($categoria)&& !empty($descripcion)&& !empty($imagen)){
      $this->model->guardarProducto($talle, $categoria, $descripcion,$imagen);
      $this->mostrarProducto();
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
     $nombre = $_POST['nombre'];
     $precio = $_POST['precio'];
     $imagen = $_POST['imagen'];
    if(!empty($nombre) && !empty($precio)&& !empty($imagen)){
      $this->model->editarProducto($id_producto,$imagen,$precio,$nombre);
      $this->mostrarProducto();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function deleteProd()
   {
       $id_categoria = $_POST['id'] ;
       $this->model->borrarProducto($id_producto);
       $this->mostrarProducto();
   }
}
 ?>
