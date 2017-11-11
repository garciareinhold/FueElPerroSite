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

    public function borrarImagenes()
    {
        $id_imagen= $_POST['id_image'];
        $id_producto=$_POST['id_product'];
        $this->model->borrarImagen($id_imagen);
        $producto= $this->model->getProducto($id_producto);
        $this->view->mostrarImagenesProducto($producto);

    }

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
     $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
     var_dump($_FILES['imagenes']['type']);

    if(!empty($talle) && !empty($categoria)&& !empty($descripcion)){
      if ($this->aceptaFormato($_FILES['imagenes']['type'])) {
        $this->model->guardarProducto($talle, $categoria, $descripcion,$rutaTempImagenes);
        $this->mostrarPanelDelantal();
      }
      else {
        $this->view->errorCrear("Las imagenes tienen que ser JPG.");
      }
    }
    else{
      $this->view->errorCrear();
    }
   }

   public function showEditProd()
   {
     $id_producto = $_POST['id'] ;
     $categorias= $this->catModel->getCategorias();
     $producto=$this->model->getProducto($id_producto);
     $this->view->mostrarFormEditar($producto, $id_producto, $categorias);
   }
   public function editDel()
   {
     $id= $_POST['id_delantal'];
     $id_categoria = $_POST['categoria'] ;
     $talle = $_POST['talle'];
     $descripcion = $_POST['descripcion'];
     $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

    if(!empty($id_categoria) && !empty($talle)&& !empty($descripcion)&& !empty($id)){
      if ($this->aceptaFormato($_FILES['imagenes']['type'])) {
        $this->model->editarProducto($id,$talle, $descripcion,$id_categoria, $rutaTempImagenes);
        $this->mostrarPanelDelantal();
      }
      else {
        $this->view->errorCrear("Las imagenes tienen que ser JPG.");
      }
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
