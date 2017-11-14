<?php
  define('HOME', 'http://'.$_SERVER['SERVER_NAME'] .':'.$_SERVER["SERVER_PORT"]. dirname($_SERVER['PHP_SELF']).'/');
  define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] .':'.$_SERVER["SERVER_PORT"]. dirname($_SERVER['PHP_SELF']).'/login');
  define('LOGOUT', 'http://'.$_SERVER['SERVER_NAME'] .':'.$_SERVER["SERVER_PORT"]. dirname($_SERVER['PHP_SELF']).'/logout');
  define('ADMIN', 'http://'.$_SERVER['SERVER_NAME'] .':'.$_SERVER["SERVER_PORT"]. dirname($_SERVER['PHP_SELF']).'/admin');

  class Controller
  {
    protected $view;
    protected $model;
  }

?>
