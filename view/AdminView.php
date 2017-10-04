<?php
class AdminView extends View
{
  function mostrarIndex(){
    $this->smarty->display('templates/Admin/index.tpl');
  }
  function mostrarCategorias($categorias){
    $this->smarty->assign('categorias', $categorias);
     $this->smarty->display('templates/Admin/categorias.tpl');
     }
}

 ?>
