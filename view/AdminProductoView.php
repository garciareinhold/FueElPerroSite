<?php
class AdminProductoView extends View
{

  public function mostrarProductos($productos, $categorias)
  {
    $this->smarty->assign('delantales', $productos);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/Admin/panelProductos.tpl');
  }
  public function mostrarFormEditar($producto, $id_producto, $categorias)
  {
    $userId = $_SESSION['USERID'];
    $this->smarty->assign('producto', $producto);
    $this->smarty->assign('id_producto', $id_producto);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('usuario', $userId);

    $this->smarty->display('templates/Admin/editarProductos.tpl');
  }
  public function mostrarImagenesProducto($producto)
  {
    $this->smarty->assign('producto', $producto);
    $this->smarty->display('templates/Admin/imagenesProducto.tpl');
  }

}

 ?>
