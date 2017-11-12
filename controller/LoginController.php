<?php
include_once('model/UsuarioModel.php');
include_once('view/LoginView.php');

class LoginController extends Controller
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
  }
  public function registrarUsuario()
  {
    $this->view->mostrarRegistro();
  }
  public function createUser()
  {
    $usuario = $_POST['usuario'];
    $clave = $_POST['password'];
    $mail = $_POST['mail'];
    $data= $this->model->guardarUsuario($usuario, $clave, $mail);
    session_start();
    $_SESSION['USER'] = $usuario;
    $_SESSION['LAST_ACTIVITY'] = time();
    $_SESSION['LOGGED'] = true;
    $_SESSION['ADMIN'] = $data[0]['is_admin'];
    $_SESSION['USERID'] = $data[0]['id_usuario'];
    header('Location: '.HOME);
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
        if((!empty($data)) && (password_verify($clave, $data[0]['clave'])) && ($mail==$data[0]['mail']) &&($usuario == $data[0]["username"])){
            session_start();
            $_SESSION['USER'] = $usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
            $_SESSION['LOGGED'] = true;
            $_SESSION['ADMIN'] = $data[0]['is_admin'];
            var_dump($_SESSION['ADMIN'] );
            $_SESSION['USERID'] = $data[0]['id_usuario'];
            header('Location: '.HOME);
        }
        else{
          $this->view->indexError(false,'Password, Usuario o Mail incorrectos');
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
