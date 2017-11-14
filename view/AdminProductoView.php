<?php
class AdminProductoView extends View
{

  public function mostrarProductos($productos, $categorias)
  {
    $this->smarty->assign('delantales', $productos);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/Admin/panelProductos.tpl');
  }
  public function mostrarFormEditar($producto, $categorias)
  {
    $this->smarty->assign('producto', $producto);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/Admin/editarProductos.tpl');
  }
  public function mostrarImagenesProducto($producto)
  {
    $this->smarty->assign('producto', $producto);
    $this->smarty->display('templates/Admin/imagenesProducto.tpl');
  }
  function errorCrear($error, $producto){
    $this->smarty->assign('producto', $producto);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/admin/editarProductos.tpl');
  }

}

 ?>
