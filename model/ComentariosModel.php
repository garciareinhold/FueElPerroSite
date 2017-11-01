<?php
class ComentariosModel extends Model
{
  function getComentarios($id_producto){
    $sentencia = $this->db->prepare( "select * from comentario where producto = ?");
    $sentencia->execute([$id_producto]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
