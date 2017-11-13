<?php
class ProductoView extends View
{
  function mostrarProductos($productos){
    $this->smarty->assign('delantales', $productos);
     $this->smarty->display('templates/productos.tpl');
     }
     public function mostrarProducto($delantal, $puedeAgregar, $nombreUsuario)
     {
       $this->smarty->assign('usuario', $nombreUsuario);
       $this->smarty->assign('puedeAgregar', $puedeAgregar);
       $this->smarty->assign('producto', $delantal);
       $this->smarty->display('templates/delantal.tpl');
     }
}
 ?>
