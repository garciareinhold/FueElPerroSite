<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'StaticController#index',
      'home'=> 'StaticController#home',
      'contacto' => 'StaticController#contacto',
      'login' => 'LoginController#login',
      'delantales' => 'ProductoController#productos',
      'delantal' => 'Producto#detalle',
      'categorias' => 'CategoriaController#categoria',
      'delantalesCategoria' => 'Producto#productoPorCategoria',
      'listaCat' => 'AdminController#mostarListaCat',
      'agregarCat'=> 'AdminController#createCat',
      'borrarCat'=> 'AdminController#deleteCat',
      'editarCat' => 'AdminController#editCat',
      'listaDel' => 'AdminController#mostarListaDel',
      'agregarDel'=> 'AdminController#createDel',
      'borrarDel'=> 'AdminController#deleteDel',
      'editarDel' => 'AdminController#editDel',
    ];

}

 ?>
