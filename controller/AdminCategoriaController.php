<?php
  include_once('model/CategoriaModel.php');
  include_once('view/AdminCategoriaView.php');

  class AdminCategoriaController extends SecuredController
  {

    function __construct()
    {
      parent::__construct();

      $this->view = new AdminCategoriaView();
      $this->model = new CategoriaModel();
    }
      // public function index(){
      //   $this->view->mostrarIndex();
      // }

     public function mostrarCategoria($error="")
     {
       $categorias = $this->model->getCategorias();
       $this->view->mostrarCategorias($categorias, $error);
     }

     public function createCat()
     {
       $nombre = $_POST['nombre'];
       $precio = $_POST['precio'];
       $imagen = $_POST['imagen'];

      if(!empty($nombre) && !empty($precio)&& !empty($imagen))
      {
        $this->model->guardarCategoria($nombre, $precio, $imagen);
        $this->mostrarCategoria();
      }
      else
      {
        $this->mostrarCategoria("Debe llenar todos los campos");
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

      if(!empty($nombre) && !empty($precio)&& !empty($imagen))
      {
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
