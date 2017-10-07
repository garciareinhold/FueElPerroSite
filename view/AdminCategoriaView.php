<?php
class AdminCategoriaView extends View
{
  function mostrarCategorias($categorias){
    $this->smarty->assign('categorias', $categorias);
     $this->smarty->display('templates/Admin/categorias.tpl');
  }
  public function mostrarCrearCategorias($categorias)
  {
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('templates/Admin/panelCategorias.tpl');
  }


}

 ?>
