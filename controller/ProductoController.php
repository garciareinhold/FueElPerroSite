<?php
  include_once('model/ProductoModel.php');
  include_once('view/ProductoView.php');
  include_once('model/CategoriaModel.php');


  class ProductoController extends Controller
  {

    function __construct()
    {
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function productos()
    {
      $productos = $this->model->getProductos();
      $categorias= $this->categoriaModel->getCategorias();
      $productos_copia=$productos;
      $this->view->mostrarProductos($this->obtenerNombres($productos_copia, $categorias),$categorias);
    }

    private function obtenerNombres($productos_copia, $categorias)
    //No lo hacemos en AdminProductoController, porque puede haber dos categorias con el mismo nombre.
    //Y el admin podría estar interesado en el id de la categoria para diferenciarlos.
    {
      foreach ($productos_copia as  &$producto_copia)
      {
        $id_categoria=$producto_copia["id_categoria"];
        foreach($categorias as $categoria){
          if($categoria["id_categoria"]==$id_categoria){
            $producto_copia["id_categoria"]=$categoria["nombre_categoria"];
          }
        }
      }
      return $productos_copia;
    }

    public function productoPorCategoria()
    {
      $id_categoria= $_POST['id'];
      $delantales= $this->model->getProductosPorCategoria($id_categoria);
      $categorias= $categorias= $this->categoriaModel->getCategorias();
      $delantales_copia= $delantales;
      $this->view->mostrarProductos($this->obtenerNombres($delantales_copia, $categorias), $categorias);
    }

    public function productoDetalle()
    {
      session_start();
      if(isset($_SESSION['USER'])){
        $puedeAgregar= ($_SESSION['LOGGED'] && $_SESSION['ADMIN'] == 0);
        $nombreUsuario= $_SESSION['USER'];
      }
      else{
          $puedeAgregar=false;
          $nombreUsuario=null;
      }
      $id_delantal= $_POST['id'];
      $delantal= $this->model->getProducto($id_delantal);
      $id_categoria=$delantal["id_categoria"];
      $delantal_copia= $delantal;
      $categorias= $this->categoriaModel->getCategorias();
      foreach ($categorias as $categoria) {
        if($categoria["id_categoria"]==$id_categoria){
          $delantal_copia["id_categoria"]=$categoria["nombre_categoria"];
        }
      }
      $this->view->mostrarProducto($delantal_copia, $puedeAgregar,$nombreUsuario);
    }
  }
?>
