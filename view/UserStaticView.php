<?php
class UserStaticView extends View
{
  function mostrarIndex(){
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
