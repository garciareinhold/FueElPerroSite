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
    $clave = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mail = $_POST['mail'];

    if (!empty($usuario)&&!empty($clave)&&(filter_var($mail,FILTER_VALIDATE_EMAIL))
    {
      $data= $this->model->guardarUsuario($usuario, $clave, $mail);
      $this->iniciarSesion($data);
    }
    else
    {
      $this->view->mostrarRegistro("Debe llenar todos los campos");
    }
  }

  public function login()
  {
    $this->view->mostrarLogin();
  }

  public function iniciarSesion($data)
  {
    session_start();
    $_SESSION['USER'] = $data[0]['username'];
    $_SESSION['LAST_ACTIVITY'] = time();
    $_SESSION['LOGGED'] = true;
    $_SESSION['ADMIN'] = $data[0]['is_admin'];
    $_SESSION['USERID'] = $data[0]['id_usuario'];
    header('Location: '.HOME);
  }

  public function autenticar()
  {
      $usuario = $_POST['usuario'];
      $clave = $_POST['password'];
      $mail = $_POST['mail'];

      if((!empty($usuario)) && (!empty($clave)) && (!empty($mail)))
      {
        $data = $this->model->getUser($usuario);
        if((!empty($data)) && (password_verify($clave, $data[0]['clave'])) && ($mail==$data[0]['mail']) &&($usuario == $data[0]["username"]))
        {
          $this->iniciarSesion($data);
        }
        else{
          $this->view->indexError(false,'Password, Usuario o Mail incorrectos');
        }
      }
      else
      {
        $this->view->indexError(false, "Debe llenar todos los campos");
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
