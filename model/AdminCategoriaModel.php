<?php
class AdminCategoriaModel extends Model
{
  function listarCategorias(){
    $sentencia = $this->db->prepare( "select * from categoria");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  public function guardarCategoria($nombre, $precio, $imagen)
  {
    $sentencia = $this->db->prepare('INSERT INTO categoria(nombre_categoria,precio_categoria,imagen) VALUES(?,?,?)');
    $sentencia->execute([$nombre,$precio,$imagen]);
  }
  public function borrarCategoria($value)
  {
    $sentencia = $this->db->prepare( "delete from categoria where id_categoria=?");
    $sentencia->execute([$value]);
  }
}

 ?>
