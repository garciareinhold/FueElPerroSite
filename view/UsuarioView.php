<?php
class UsuarioView extends View
{
  function mostrarIndex(){
     $this->smarty->display('templates/index.tpl');
     }
  
  function mostrarHome(){
     $this->smarty->display('templates/home.tpl');
     }
  }

 ?>
