<?php
class UserStaticView extends View
{
  function mostrarIndex($status){
    $this->smarty->assign('session',$status);
     $this->smarty->display('templates/index.tpl');
     }

  function mostrarHome(){
     $this->smarty->display('templates/home.tpl');
  }
  function mostrarContacto(){
    $this->smarty->display('templates/contacto.tpl');
  }
  function mostrarProductos(){
    $this->smarty->display('templates/productos.tpl');
  }
  function mostrarPanel(){
    $this->smarty->display('templates/panelAdmin.tpl');
  }

  }

 ?>
