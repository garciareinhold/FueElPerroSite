<?php

class dbModel
{

private $_connection;
private static $_instance;

public static function getInstance(){
  if(!self::$_instance){
    self::$_instance = new self();
  }
  return (self::$_instance);
}

function __construct(){
  try {
    $this->_connection = new PDO('mysql: host=localhost;port:'.$_SERVER["SERVER_PORT"],"root","");
  }
  catch (Exception $e) {
    echo "ERROR CREANDO LA BASE DE DATOS ".$e;
  }
}
public function buildDBfromFile($dbName){
  try {
      $this->_connection = new PDO('mysql: host=localhost;port:'.$_SERVER["SERVER_PORT"],"root","");
      $this->_connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbName );
      $this->_connection->exec('USE '.$dbName);
      $queries = $this->loadSQLSchema(dirname(__FILE__).'\..\db\fueelperro_db.sql');
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

function loadSQLSchema($nombre){
  $querys = fopen($nombre, "r+");
  $sql = "";
  while (!feof($querys)) {
    $linea = fgets($querys);
    $linea = str_replace("'", '"', $linea);
    if(!preg_match('/--/', $linea)){
       $sql .= $linea;
     }
  }
  fclose($querys);
  $querys = explode(";", $sql);
  unset($querys[count($querys)-1]);
  return $querys;
}
}
 ?>
