<?php
  class AdminCategoriaView extends View
  {

    public function mostrarCategorias($categorias,$error)
    {
      $this->smarty->assign('error', $error);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('templates/Admin/panelCategorias.tpl');
    }

    public function mostrarFormEditar($id_categoria, $error)
    {
      $this->smarty->assign('error', $error);
      $this->smarty->assign('id_categoria', $id_categoria);
      $this->smarty->display('templates/Admin/editarCategorias.tpl');
    }

  }

?>
