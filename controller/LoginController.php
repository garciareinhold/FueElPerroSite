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

  public function autenticar()
  {
      $usuario = $_POST['usuario'];
      $clave = $_POST['password'];
      $mail = $_POST['mail'];

      if((!empty($usuario)) && (!empty($clave)) && (!empty($mail))){
       $data = $this->model->getUser($usuario);
        if((!empty($data)) && (password_verify($clave, $data[0]['clave']))){
            $_SESSION['USER'] = $data;
            $_SESSION['LAST_ACTIVITY'] = time();
            header('Location: '.ADMIN);
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
