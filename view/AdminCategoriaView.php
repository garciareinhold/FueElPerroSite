<?php
  class AdminCategoriaView extends View
  {

    public function mostrarCategorias($categorias)
    {
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('templates/Admin/panelCategorias.tpl');
    }

    public function mostrarFormEditar($id_categoria)
    {
      $this->smarty->assign('id_categoria', $id_categoria);
      $this->smarty->display('templates/Admin/editarCategorias.tpl');
    }

  }

?>
