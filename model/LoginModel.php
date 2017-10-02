<?php
class LoginModel extends Model
{
  function getUsuario($administrador){
    $sentencia = $this->db->prepare( "select * from admin where admin = ? limit 1");
    $sentencia->execute([$administrador]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
