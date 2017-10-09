<?php

class dbAutoClass extends Controller
{
    private $_connection;
    private static $_instance;

    public static function getInstance(){
      if(!self::$_instance){
        self::$_instance = new self();
      }
      return self::$_instance;
    }

    function __construct(){
      try {
        $this->_connection = new PDO('mysql:host=localhost',"root","");
      }
      catch (Exception $e) {
        echo "ERROR CREANDO LA BASE DE DATOS ".$e;
      }
    }
    public function iniciar()
    {
      $db = dbAutoClass::getInstance();
      $db->buildDBfromFile("fueelperro_db");
      echo 'ok';
      /////////////////////////// ACOMODAR EL MODEL Y LA REDIRECCION A LA HOME O CON UN MENSAJE
      ///////////////////////// SE GENERERA LA BASE DE DATOS ACCEDIENDO A /db Y SALE EL MENSAJE OK
      //////////////////////// SI ES QUE NO EXISTE
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
