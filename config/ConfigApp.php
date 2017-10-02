<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'StaticController#index',
      'home'=> 'StaticController#home',
      'contacto' => 'StaticController#contacto',
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
      'autenticacion' => 'LoginController#auntenticar',
      'logout' => 'LoginController#cerrarSesion'
    ];

}

 ?>
