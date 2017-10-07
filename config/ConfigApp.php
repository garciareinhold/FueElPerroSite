<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'UserStaticController#index',
      'home'=> 'UserStaticController#home',
      'contacto' => 'UserStaticController#contacto',
      'delantales' => 'ProductoController#productos',
      'delantal' => 'Producto#detalle',
      'categorias' => 'CategoriaController#categoria',
      'delantalesCategoria' => 'Producto#productoPorCategoria',
      'listarCategorias' => 'CategoriaController#mostarListaCat',
      'agregarCategoria'=> 'CategoriaController#createCat',
      'borrarCategoria'=> 'CategoriaController#deleteCat',
      'editarCategoria' => 'CategoriaController#editCat',
      'listaDelantales' => 'ProductoController#mostarListaDel',
      'agregarDelantal'=> 'ProductoController#createDel',
      'borrarDelantal'=> 'ProductoController#deleteDel',
      'editarDelantal' => 'ProductoController#editDel',
      'login' => 'LoginController#login',
      'autenticacion' => 'LoginController#autenticar',
      'admin' => 'AdminStaticController#index',
      'adminCategoria'=>'AdminCategoriaController#editCategoria',
      'adminDelantal'=>'AdminProducotController#editProducto',
      'logout' => 'LoginController#cerrarSesion'


    ];

}

 ?>
