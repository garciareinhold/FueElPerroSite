<?php
  class UsuarioModel extends Model
  {
    function getUser($userName)
    {
      $sentencia = $this->db->prepare( "select * from usuario where username = ? limit 1");
      $sentencia->execute([$userName]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUsuarios()
    {
      $sentencia = $this->db->prepare( "select * from usuario order by username");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarUsuario($usernave, $clave, $mail)
    {
      $isAdmin=0;
      $sentencia = $this->db->prepare('INSERT INTO usuario(username,clave,mail,is_admin) VALUES(?,?,?,?)');
      $sentencia->execute([$usernave,$clave,$mail,$isAdmin]);
      $id_user= $this->db->lastInsertId();
      return $this->getUser($id_user);
    }

    public function borrarUsuario($value)
    {
      $sentencia = $this->db->prepare( "delete from usuario where id_usuario=?");
      $sentencia->execute([$value]);
    }

    public function editarUsuario($id_usuario, $isAdmin)
    {
      $sentencia = $this->db->prepare('UPDATE usuario SET is_admin=? where id_usuario=?');
      $sentencia->execute([$isAdmin, $id_usuario]);
      return $this->getUsuarios();
    }
    
  }

 ?>
