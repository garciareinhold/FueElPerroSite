<?php
class ProductoModel extends Model
{
  //traigo productos y les asigno las imagenes
  function getProductos(){
    $sentencia = $this->db->prepare( "select * from delantal");
    $sentencia->execute();
    $delantales= $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $productosImagenes= $this->asignarImagenes($delantales);
    return $productosImagenes;
  }
  //asignacion de imagenes
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
  //traigo productos por categoria y les asigno las imagenes
  public function getProductosPorCategoria($id_categoria)
  {
    $sentencia = $this->db->prepare( "SELECT * FROM delantal where id_categoria=?");
    $sentencia->execute(array($id_categoria));
    $delantales= $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $productosImagenes= $this->asignarImagenes($delantales);
    return $productosImagenes;
  }
  //traigo producto y le adhiero sus imagenes
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
  //funcion para subir imágenes
  private function uploadImages($images){
    $routes = [];
    foreach ($images as $image) {
      $final_path = 'images/' . uniqid() . '.jpg';
      move_uploaded_file($image, $final_path);
      $routes[]=$final_path;
    }
    return $routes;
  }
  //recibo las imagenes y el id al que pertenecen y lo inserto en la bbdd
  public function guardarImagenes($imagenes,$id_delantal)
  {
    $rutas = $this->uploadImages($imagenes);
    $sentencia_pic = $this->db->prepare('INSERT INTO imagen(id_delantal, locacion) VALUES(?,?)');
    foreach ($rutas as $ruta) {
      $sentencia_pic->execute([$id_delantal,$ruta]);
    }
  }
  //guardo producto y llamo a guardar imagenes
  public function guardarProducto($talle, $categoria, $descripcion,$imagenes)
  {
    $sentencia = $this->db->prepare('INSERT INTO delantal(talle_disponible,descripcion,id_categoria) VALUES(?,?,?)');
    $sentencia->execute([$talle, $descripcion,$categoria]);
    $id_delantal = $this->db->lastInsertId();
    $this->guardarImagenes($imagenes,$id_delantal);
  }
  //borro el producto segun el id que reciba
  public function borrarProducto($value)
  {
    $sentencia = $this->db->prepare( "delete from delantal where id_delantal=?");
    $sentencia->execute([$value]);
  }
  //edito el producto, llamo a guardar las nuevas imágenes si hay 
  public function editarProducto($id_delantal ,$talle, $descripcion, $id_categoria,$imagenes)
  {
    $sentencia = $this->db->prepare('UPDATE delantal SET talle_disponible=?, descripcion=?, id_categoria=?  WHERE id_delantal=?');
    $sentencia->execute(array($talle, $descripcion, $id_categoria, $id_delantal));
    if($imagenes){
      $this->guardarImagenes($imagenes, $id_delantal);
    }
  }
  //borro la imagen del producto segun el id que reciba
  public function borrarImagen($id_imagen){
    $sentencia = $this->db->prepare( "delete from imagen where id_imagen=?");
    $sentencia->execute($id_imagen);
  }
}
 ?>
