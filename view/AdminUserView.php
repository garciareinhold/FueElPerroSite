<?php
  class AdminUserView extends View
  {
    function mostrarUsuarios($usuarios){
      $this->smarty->assign('usuarios', $usuarios);
      $this->smarty->display('templates/Admin/usuarios.tpl');
    }
  }
 ?>
