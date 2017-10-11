<?php

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(!isset($_SESSION['USER'])){
      header('Location: '.LOGIN);
      die();
    }
  }


}

 ?>
