<?php
class AdminProductoView extends View
{

  public function mostrarProductos($productos, $categorias)
  {
    $this->smarty->assign('delantales', $productos);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/Admin/panelProductos.tpl');
  }
  public function mostrarFormEditar($id_producto, $categorias)
  {
    $this->smarty->assign('id_producto', $id_producto);
    $this->smarty->assign('categorias', $categorias);

    $this->smarty->display('templates/Admin/editarProductos.tpl');
  }

}

 ?>
