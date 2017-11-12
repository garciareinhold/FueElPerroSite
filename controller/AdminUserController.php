<?php
  include_once('view/AdminUserView.php');
  include_once('model/UsuarioModel.php');

  class AdminUserController extends SecuredController
  {
    function __construct(){
        parent::__construct();
        $this->model = new UsuarioModel();
        $this->view = new AdminUserView();
    }

    public function deleteUser()
    {
      $id_user = $_POST['id'] ;
      $this->model->borrarUsuario($id_user);
      $usuarios=$this->model->getUsuarios();
      $this->view->mostrarUsuarios($usuarios);
    }
    public function editUser(){
      $permiso= $_POST["permiso"];
      $id_usuario=$_POST["id"];
      $this->model->editarUsuario($id_usuario, $permiso);
      $usuarios=$this->model->editarUsuario($id_usuario, $permiso);
      $this->view->mostrarUsuarios($usuarios);
    }
    public function getUsuarios()
    {
      $usuarios=$this->model->getUsuarios();
      $this->view->mostrarUsuarios($usuarios);
    }


}
 ?>
