<?php
  include_once('model/ProductoModel.php');
  include_once('view/AdminProductoView.php');

  class AdminProductoController extends Controller
  {
  function __construct(){
      $this->view = new AdminProductoView();
      $this->model = new ProductoModel();

}
    public function productos(){
      $productos = $this->model->getProductos();
      // for cada producto en productos
         // buscar el id_categoria en el model categoria
        // $producto['marca'] =
      $this->view->mostrarProductos($productos);
    }


}
 ?>
