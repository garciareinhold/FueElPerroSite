<?php
class ComentariosModel extends Model
{
  function getComentarios($id_delantal)
  {
    $sentencia = $this->db->prepare( "select * from comentario where id_delantal=?");
    $sentencia->execute([$id_delantal]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getComentario($id_comentario)
  {
    $sentencia = $this->db->prepare( "select * from comentario where id_comentario = ?");
    $sentencia->execute([$id_comentario]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  public function deleteComentario($id_comentario)
  {
    $sentencia = $this->db->prepare( "delete from comentario where id_comentario=?");
    $sentencia->execute([$id_comentario]);
  }
  public function getUserByID($id_usuario)
  {
    $sentencia = $this->db->prepare( "select username from usuario where id_usuario=? limit 1");
    $sentencia->execute([$id_usuario]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
 public function guardarComentario($usuario, $descripcion, $puntaje, $id_delantal)
  {
    $sentencia = $this->db->prepare('INSERT INTO comentario(usuario,descripcion,puntaje,id_delantal) VALUES(?,?,?,?)');
    $sentencia->execute([$usuario,$descripcion,$puntaje,$id_delantal]);
    $id_comentario = $this->db->lastInsertId();
    return $this->getComentario($id_comentario);
  }
}

 ?>
