<?php
class ProductoView extends View
{
  function mostrarProductos($productos){
    $this->smarty->assign('delantales', $productos);
     $this->smarty->display('templates/productos.tpl');
     }
}
 ?>
