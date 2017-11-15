<?php
  class ProductoView extends View
  {

   function mostrarProductos($productos, $categorias)
   {
     $this->smarty->assign('categorias', $categorias);
     $this->smarty->assign('delantales', $productos);
     $this->smarty->display('templates/productos.tpl');
   }

   public function mostrarProducto($delantal, $puedeAgregar, $nombreUsuario, $image)
   {
     $this->smarty->assign('captcha', $image);
     $this->smarty->assign('usuario', $nombreUsuario);
     $this->smarty->assign('puedeAgregar', $puedeAgregar);
     $this->smarty->assign('producto', $delantal);
     $this->smarty->display('templates/delantal.tpl');
   }

   public function recargarCaptcha($image,$nombreUsuario,$producto)
   {
    $this->smarty->assign('usuario', $nombreUsuario);
    $this->smarty->assign('producto', $producto);
    $this->smarty->assign('captcha', $image);
    $this->smarty->display('templates/formComentarios.tpl');
   }

  }
?>
