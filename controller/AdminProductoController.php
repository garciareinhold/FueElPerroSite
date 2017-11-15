<?php
  include_once('model/ProductoModel.php');
  include_once('view/AdminProductoView.php');
  include_once('model/CategoriaModel.php');


  class AdminProductoController extends SecuredController
  {

    function __construct()
    {
      parent::__construct();
      $this->view = new AdminProductoView();
      $this->model = new ProductoModel();
      $this->catModel = new CategoriaModel();
    }

    public function borrarImagenes()
    {
        $id_imagen= $_POST['id_image'];
        $id_producto=$_POST['id_product'];
        $this->model->borrarImagen($id_imagen);
        $producto= $this->model->getProducto($id_producto);
        $this->view->mostrarImagenesProducto($producto);
    }

    public function agregarImagenes()
    {
      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
      $id_producto=$_POST['id_delantal'];
      if(!empty($rutaTempImagenes)&& $this->aceptaFormato($_FILES['imagenes']['type']))
      {
        $this->model->guardarImagenes($rutaTempImagenes,$id_producto);
        $producto= $this->model->getProducto($id_producto);
        $this->view->mostrarImagenesProducto($producto);
      }
      else
      {
        $this->showEditProd("Debe adjuntar imágenes, recuerde que sean de tipo JPG o PNG");
      }
    }

    public function mostrarPanelDelantal($error="")
    {
     $productos = $this->model->getProductos();
     $categorias= $this->catModel->getCategorias();
     $this->view->mostrarProductos($productos, $categorias, $error);
    }

    public function createDel()
    {
     $talle = $_POST['talle'];
     $categoria = $_POST['categoria'];
     $descripcion=$_POST['descripcion'];
     $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

     if(!empty($talle) && !empty($categoria)&& !empty($descripcion)&&!empty($rutaTempImagenes))
     {
      if ($this->aceptaFormato($_FILES['imagenes']['type']))
      {
        $this->model->guardarProducto($talle, $categoria, $descripcion,$rutaTempImagenes);
        $this->mostrarPanelDelantal();
      }
      else
      {
        $this->mostrarPanelDelantal("Las imagenes tienen que ser JPG o PNG.");
      }
    }
    else{
      $this->mostrarPanelDelantal("Debe llenar todos los campos.");
    }
   }

   public function showEditProd($error="")
   {
     $id_producto = $_POST['id'] ;
     $categorias= $this->catModel->getCategorias();
     $producto=$this->model->getProducto($id_producto);
     $this->view->mostrarFormEditar($producto, $categorias,$error);
   }

   public function addImages()
   {
     $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

     if(isset($rutaTempImagenes))
     {
       $this->model->guardarImagenes($imagenes,$id_delantal);
     }
     $producto= $this->model->getProducto($id_delantal);
     $this->view->mostrarImagenesProducto($producto);
   }

   public function editDel()
   {
     $id= $_POST['id_delantal'];
     $id_categoria = $_POST['categoria'] ;
     $talle = $_POST['talle'];
     $descripcion = $_POST['descripcion'];

     if(!empty($id_categoria) && !empty($talle)&& !empty($descripcion))
     {
        $this->model->editarProducto($id,$talle, $descripcion,$id_categoria);
        $this->mostrarPanelDelantal();
      }
     else
     {
      $this->showEditProd("Debe llenar todos los campos.");
     }
   }

   public function deleteDel()
   {
       $id_producto = $_POST['id'] ;
       $this->model->borrarProducto($id_producto);
       $this->mostrarPanelDelantal();
   }

   private function aceptaFormato($imagenesTipos)
   {
       foreach ($imagenesTipos as $tipo) {
         if($tipo != 'image/jpeg' && $tipo != 'image/png')
         {
           return false;
         }
       }
       return true;
   }

}
 ?>
