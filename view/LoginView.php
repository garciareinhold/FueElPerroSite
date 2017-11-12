<?php
class LoginView extends View
{
  function mostrarLogin($error = ''){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/Login/login.tpl');
  }
  public function indexError($false, $error= "")
  {
    $this->smarty->assign('session', $false);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/Login/indexError.tpl');
  }
  public function mostrarRegistro($error = '')
  {
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/Login/registro.tpl');
  }
}

 ?>
