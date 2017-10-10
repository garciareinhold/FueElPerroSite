<?php
include_once 'model/dbModel.php';

class Model
{
  protected $db;

  function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;'
      .'dbname=fueelperro_db;charset=utf8'
      , 'root', '');
    } catch (Exception $e) {
      $this->model = new dbModel();
      $this->db = dbModel::getInstance();
      $this->db->buildDBfromFile("fueelperro_db");
    }
  }
}
 ?>
