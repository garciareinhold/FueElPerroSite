<?php
  class CategoriaView extends View
  {
    function mostrarCategorias($categorias)
    {
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('templates/categorias.tpl');
    }
  }
 ?>
