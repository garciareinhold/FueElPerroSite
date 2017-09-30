<?php
  include_once('model/ProductoModel.php');
  include_once('view/ProductoView.php');

  class ProductoController extends Controller
  {
  function __construct(){
      $this->view = new ProductoView();
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
