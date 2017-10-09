<?php
class AdminProductoModel extends Model
{
  function listarProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function guardarProducto($talle, $descripcion,$categoria, $imagen)
  {
    $sentencia = $this->db->prepare('INSERT INTO delantal(talle_disponible,descripcion,id_categoria,imagen) VALUES(?,?,?,?)');
    $sentencia->execute([$talle, $descripcion,$categoria, $imagen]);
  }
  public function borrarProducto($value)
  {
    $sentencia = $this->db->prepare( "delete from delantal where id_delantal=?");
    $sentencia->execute([$value]);
  }
  public function editarProducto($id,$talle, $descripcion,$categoria, $imagen)
  {
    $sentencia = $this->db->prepare('UPDATE delantal SET imagen=?, id_categoria=?, descripcion=?, talle_disponible=? where id_categoria=?');
    $sentencia->execute(array($nombre,$precio,$imagen,$id));
  }
}

 ?>
