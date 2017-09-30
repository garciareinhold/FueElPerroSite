<?php
class ProductoModel extends Model
{
  function getProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
