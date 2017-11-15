<?php

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(isset($_SESSION['USER'])&&!empty($_SESSION['USER'])){
      if ($_SESSION['ADMIN']==0) {
        header('Location: '.LOGIN);
        echo "Debes ser administrador para ingresar";
        die();
      }
    }
    else {
      header('Location: '.LOGIN);
      echo "Debes estar registrado y conseguir el permiso para ingresar";
      die();
    }
  }


}

 ?>
