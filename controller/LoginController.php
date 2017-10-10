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
    echo "entre en el login";
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
            session_start();
            $_SESSION['USER'] = $usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
            $_SESSION['LOGGED'] = true;
            header('Location: '.HOME);
        }
        else{
          $this->view->mostrarLogin('Password, Usuario o Mail incorrectos');
        }
      }
  }

  public function cerrarSesion()
  {
    session_start();
    session_destroy();
    header("Location: ".HOME);
  }
}

 ?>
