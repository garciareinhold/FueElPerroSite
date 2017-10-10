<?php
class ProductoView extends View
{
  function mostrarProductos($productos){
    $this->smarty->assign('delantales', $productos);
     $this->smarty->display('templates/productos.tpl');
     }
     public function mostrarProducto($delantal)
     {
       $this->smarty->assign('producto', $delantal);
       $this->smarty->display('templates/delantal.tpl');
     }
}
 ?>
