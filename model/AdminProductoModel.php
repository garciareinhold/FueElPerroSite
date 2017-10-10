<?php
class AdminProductoModel extends Model
{
  function listarProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function guardarProducto($talle, $categoria, $descripcion,$imagen)
  {
    $sentencia = $this->db->prepare('INSERT INTO delantal(talle_disponible,descripcion,id_categoria,imagen) VALUES(?,?,?,?)');
    $sentencia->execute([$talle, $descripcion,$categoria, $imagen]);
  }
  public function borrarProducto($value)
  {
    $sentencia = $this->db->prepare( "delete from delantal where id_delantal=?");
    $sentencia->execute([$value]);
  }
  public function editarProducto($id_delantal ,$talle, $descripcion, $imagen, $id_categoria)
  {
    $sentencia = $this->db->prepare('UPDATE delantal SET talle_disponible=?, descripcion=?, imagen=?, id_categoria=?  WHERE id_delantal=?');
    $sentencia->execute(array($talle, $descripcion, $imagen, $id_categoria, $id_delantal));
  }

}

 ?>
