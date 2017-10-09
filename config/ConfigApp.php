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
      'listarCategoria' => 'AdminCategoriaController#mostrarCategoria',
      'agregarCategoria'=> 'AdminCategoriaController#createCat',
      'borrarCategoria'=> 'AdminCategoriaController#deleteCat',
      'mostrarEditarCategoria' => 'AdminCategoriaController#showEditCat',
      'editarCategoria' => 'AdminCategoriaController#editCat',
      //ADMIN ABM PRODUCTO
      'listarProducto' => 'AdminProductoController#mostrarProducto',
      'agregarProducto'=> 'AdminProductoController#createProd',
      'borrarProducto'=> 'AdminProductoController#deleteProd',
      'editarProducto' => 'AdminProductoController#editProd',
      'mostrarEditarProducto' => 'AdminProductoController#showEditProd',
      //Login/logout
      'login' => 'LoginController#login',
      'autenticacion' => 'LoginController#autenticar',
      'logout' => 'LoginController#cerrarSesion',
      //Admin Navegacion
      'admin' => 'AdminStaticController#index',


    ];

}

 ?>
