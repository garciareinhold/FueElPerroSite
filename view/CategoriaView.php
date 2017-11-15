<?php
  class CategoriaView extends View
  {
    function mostrarCategorias($categorias, $error)
    {
      $this->smarty->assign('error', $error);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('templates/categorias.tpl');
    }
  }
 ?>
