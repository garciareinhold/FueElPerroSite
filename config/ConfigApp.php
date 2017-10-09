<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      //Usuario Navegacion
      ''=> 'UserStaticController#index',
      'home'=> 'UserStaticController#home',
      'contacto' => 'UserStaticController#contacto',
      'delantales' => 'ProductoController#productos',
      'delantal' => 'Producto#detalle',
      'categorias' => 'CategoriaController#categoria',
      'delantalesCategoria' => 'Producto#productoPorCategoria',
      //ADMIN ABM CAT
      'mostrarEditarCategoria' => 'AdminCategoriaController#showEditCat',
      'listarCategoria' => 'AdminCategoriaController#mostrarCategoria',
      'agregarCategoria'=> 'AdminCategoriaController#createCat',
      'borrarCategoria'=> 'AdminCategoriaController#deleteCat',
      'editarCategoria' => 'AdminCategoriaController#editCat',
      //ADMIN ABM ITEM
      'listarDelantal' => 'ProductoController#mostrarPanelDelantal',
      'agregarDelantal'=> 'ProductoController#createDel',
      'borrarDelantal'=> 'ProductoController#deleteDel',
      'editarDelantal' => 'ProductoController#editDel',
      //Login/logout
      'login' => 'LoginController#login',
      'autenticacion' => 'LoginController#autenticar',
      'logout' => 'LoginController#cerrarSesion',
      //Admin Navegacion
      'admin' => 'AdminStaticController#index',
      'db'=>'dbAutoClass#iniciar'
    ];

}

 ?>
