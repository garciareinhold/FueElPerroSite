<?php
class ProductoModel extends Model
{
  function getProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    $delantales= $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $productosImagenes= $this->asignarImagenes($delantales);
    return $productosImagenes;
  }
  private function asignarImagenes($delantales){
    $productosImagenes=[];
    foreach ($delantales as $delantal) {
      $sentencia_pic= $this->db->prepare( "select * from imagen where id_delantal=?");
      $sentencia_pic->execute([$delantal["id_delantal"]]);
      $imagenes = $sentencia_pic->fetchAll(PDO::FETCH_ASSOC);
      $delantal["imagenes"]=$imagenes;
      $productosImagenes[]=$delantal;
    }
    return $productosImagenes;
  }
  public function getProductosPorCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare( "SELECT * FROM delantal where id_categoria=?");
    $sentencia->execute(array($id_categoria));
    $delantales= $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $productosImagenes= $this->asignarImagenes($delantales);
    return $productosImagenes;
  }
  public function getProducto($id_delantal)
  {
    $sentencia = $this->db->prepare( "SELECT * FROM delantal where id_delantal=?");
    $sentencia->execute([$id_delantal]);
    $delantal= $sentencia->fetch();
    $sentencia_pic= $this->db->prepare( "select * from imagen where id_delantal=?");
    $sentencia_pic->execute([$delantal["id_delantal"]]);
    $imagenes = $sentencia_pic->fetchAll(PDO::FETCH_ASSOC);
    $delantal["imagenes"]=$imagenes;
    return $delantal;
  }
  private function uploadImages($images){
    $routes = [];
    foreach ($images as $image) {
      $final_path = 'images/' . uniqid() . '.jpg';
      move_uploaded_file($image, $final_path);
      $routes[]=$final_path;
    }
    return $routes;
  }
  public function guardarImagenes($imagenes,$id_delantal)
  {
    $rutas = $this->uploadImages($imagenes);
    $sentencia_pic = $this->db->prepare('INSERT INTO imagen(id_delantal, locacion) VALUES(?,?)');
    foreach ($rutas as $ruta) {
      $sentencia_pic->execute([$id_delantal,$ruta]);
    }
  }
  public function guardarProducto($talle, $categoria, $descripcion,$imagenes)
  {
    $sentencia = $this->db->prepare('INSERT INTO delantal(talle_disponible,descripcion,id_categoria) VALUES(?,?,?)');
    $sentencia->execute([$talle, $descripcion,$categoria]);
    $id_delantal = $this->db->lastInsertId();
    $this->guardarImagenes($imagenes,$id_delantal);
  }
  public function borrarProducto($value)
  {
    $sentencia = $this->db->prepare( "delete from delantal where id_delantal=?");
    $sentencia->execute([$value]);
  }
  public function editarProducto($id_delantal ,$talle, $descripcion, $id_categoria,$imagenes)
  {
    $sentencia = $this->db->prepare('UPDATE delantal SET talle_disponible=?, descripcion=?, id_categoria=?  WHERE id_delantal=?');
    $sentencia->execute(array($talle, $descripcion, $id_categoria, $id_delantal));
    $this->guardarImagenes($imagenes, $id_delantal);
  }
  public function borrarImagen($id_imagen){
    $sentencia = $this->db->prepare( "delete from imagen where id_imagen=?");
    $sentencia->execute($id_imagen);
  }
}
 ?>
