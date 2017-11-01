<?php
class ComentariosModel extends Model
{
  function getComentarios($id_producto)
  {
    $sentencia = $this->db->prepare( "select * from comentario where producto = ?");
    $sentencia->execute([$id_producto]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getComentario($id_comentario)
  {
    $sentencia = $this->db->prepare( "select * from comentario where id_comentario = ?");
    $sentencia->execute([$id_comentario]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function deleteComentario($id)
  {
    $sentencia = $this->db->prepare( "delete from comentario where id_comentario=?");
    $sentencia->execute([$id]);
  }
}

 ?>
