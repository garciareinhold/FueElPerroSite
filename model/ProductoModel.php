<?php
class ProductoModel extends Model
{
  function getProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getProductosPorCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare( "SELECT * FROM delantal where id_categoria=?");
    $sentencia->execute(array($id_categoria));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getProducto($id_delantal)
  {
    $sentencia = $this->db->prepare( "SELECT * FROM delantal where id_delantal=?");
    $sentencia->execute([$id_delantal]);
    return $sentencia->fetch();
  }
}
 ?>
