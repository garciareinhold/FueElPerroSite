<?php
include_once 'model/dbModel.php';
<<<<<<< HEAD
=======

>>>>>>> 5a00f88bd2bce01a750e7457ab3b35646aa18f1a
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
