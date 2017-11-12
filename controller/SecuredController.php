<?php

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(isset($_SESSION['USER'])){
      if ($_SESSION['ADMIN']==0) {
        header('Location: '.HOME);
        die();
      }
    }
    else {
      header('Location: '.LOGIN);
      die();
    }
  }


}

 ?>
