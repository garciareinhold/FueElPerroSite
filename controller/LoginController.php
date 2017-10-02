<?php
include_once('model/LoginModel.php');
include_once('view/LoginView.php');

class LoginController extends Controller
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new LoginModel();
  }

  public function login()
  {
    $this->view->mostrarLogin();
  }

  public function auntenticar()
  {
      $usuario = $_POST['usuario'];
      $contraseña = $_POST['contraseña'];
      $mail = $_POST['mail'];
      echo ($usuario);
      echo ($contraseña);
      echo ($mail);

      if((!empty($usuario)||!empty($mail)) && !empty($contraseña)){

        $admin = $this->model->getUsuario($usuario);

        if((!empty($admin)) && (password_verify($contraseña, $admin[0]['contraseña']))&& (password_verify($mail, $admin[0]['mail']))) {
            session_start();
            $_SESSION['USER'] = $usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
            header('Location: '.HOME);
        }
        else{
            $this->view->mostrarLogin('Los datos ingresados son incorrectos');
        }
      }
  }

  public function cerrarSesion()
  {
    session_start();
    session_destroy();
    header('Location: '.LOGIN);
  }
}

 ?>
