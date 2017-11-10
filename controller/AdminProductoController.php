<?php
  include_once('model/ProductoModel.php');
  include_once('view/AdminProductoView.php');
  include_once('model/CategoriaModel.php');


  class AdminProductoController extends SecuredController
  {
  function __construct(){
      parent::__construct();
      $this->view = new AdminProductoView();
      $this->model = new ProductoModel();
      $this->catModel = new CategoriaModel();

}
    // public function index(){
    //   $this->view->mostrarIndex();
    // }

   public function mostrarPanelDelantal(){
     $productos = $this->model->getProductos();
     $categorias= $this->catModel->getCategorias();
     $this->view->mostrarProductos($productos, $categorias);
   }
   public function createDel()
   {
     $talle = $_POST['talle'];
     $categoria = $_POST['categoria'];
     $descripcion=$_POST['descripcion'];

    if(!empty($talle) && !empty($categoria)&& !empty($descripcion)){
      $this->model->guardarProducto($talle, $categoria, $descripcion,$imagen);
      $this->mostrarPanelDelantal();
    }
    else{
      $this->view->errorCrear();
    }
   }
   public function showEditProd()
   {
     $id_producto = $_POST['id'] ;
     $categorias= $this->catModel->getCategorias();
     $this->view->mostrarFormEditar($id_producto, $categorias);
   }
   public function editDel()
   {
     $id= $_POST['id_delantal'];
     $id_categoria = $_POST['categoria'] ;
     $talle = $_POST['talle'];
     $descripcion = $_POST['descripcion'];

    if(!empty($id_categoria) && !empty($talle)&& !empty($descripcion)&& !empty($id)){
      $this->model->editarProducto($id,$talle, $descripcion,$id_categoria, $imagenes);
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
   private function aceptaFormato($imagenesTipos){
       foreach ($imagenesTipos as $tipo) {
         if($tipo != 'image/jpeg') {
           return false;
         }
       }
       return true;
   }

}
 ?>
