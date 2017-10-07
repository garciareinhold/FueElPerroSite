<?php
class AdminProductoView extends View
{
  function mostrarProductos($productos){
    $this->smarty->assign('delantales', $productos);
     $this->smarty->display('templates/Admin/productos.tpl');
     }
}
 ?>
