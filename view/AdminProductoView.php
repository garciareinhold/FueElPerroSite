<?php
class AdminProductoView extends View
{

  public function mostrarProductos($productos)
  {
    $this->smarty->assign('delantales', $productos);
    $this->smarty->display('templates/Admin/panelProductos.tpl');
  }
  public function mostrarFormEditar($id_producto)
  {
    $this->smarty->assign('id_producto', $id_producto);
    $this->smarty->display('templates/Admin/editarProductos.tpl');
  }

}

 ?>
