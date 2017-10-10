<?php
<<<<<<< HEAD
class dbModel
{
private $_connection;
private static $_instance;
=======

class dbModel
{

private $_connection;
private static $_instance;

>>>>>>> 5a00f88bd2bce01a750e7457ab3b35646aa18f1a
public static function getInstance(){
  if(!self::$_instance){
    self::$_instance = new self();
  }
  return (self::$_instance);
}
<<<<<<< HEAD
=======

>>>>>>> 5a00f88bd2bce01a750e7457ab3b35646aa18f1a
function __construct(){
  try {
    $this->_connection = new PDO('mysql:host=localhost',"root","");
  }
  catch (Exception $e) {
    echo "ERROR CREANDO LA BASE DE DATOS ".$e;
  }
}
public function buildDBfromFile($dbName){
  try {
      $this->_connection = new PDO('mysql:host=localhost;',"root","");
      $this->_connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbName );
      $this->_connection->exec('USE '.$dbName);
      $queries = $this->loadSQLSchema('fueelperro_db.sql');
      $i=0;
      while($i<count($queries)&&strlen($this->_connection->errorInfo()[2] == 0)){
        $this->_connection->exec($queries[$i]);
        $i++;
      }
  }
  catch (Exception $e) {
    echo $e;
  }
}
<<<<<<< HEAD
=======

>>>>>>> 5a00f88bd2bce01a750e7457ab3b35646aa18f1a
function loadSQLSchema($nombre){
  $querys = fopen($nombre, "r+");
  $sql = "";
  while (!feof($querys)) {
    $linea = fgets($querys);
    $linea = str_replace("'", '"', $linea);
    if(!preg_match('/--/', $linea))   $sql .= $linea;
  }
  fclose($querys);
  $querys = explode(";", $sql);
  unset($querys[count($querys)-1]);
  return $querys;
}
}
 ?>
