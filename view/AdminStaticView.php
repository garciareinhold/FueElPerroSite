<?php
  class AdminStaticView extends View
  {
    public function mostrarIndex()
    {
       $this->smarty->display('templates/Admin/bienvenida.tpl');
    }

  }

?>
