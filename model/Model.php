<?php

class Model
{
  protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=fueelperro_db;charset=utf8'
    , 'root', '');
  }
}
 ?>
