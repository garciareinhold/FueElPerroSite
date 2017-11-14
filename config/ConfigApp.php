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
      'delantal' => 'ProductoController#productoDetalle',
      'categorias' => 'CategoriaController#categoria',
      'delantalesCategoria' => 'ProductoController#productoPorCategoria',
      //ADMIN ABM USER
      'borrarUsuario'=>'AdminUserController#deleteUser',
      'editarUsuario'=>'AdminUserController#editUser',
      'listarUsuarios'=>'AdminUserController#getUsuarios',
      //ADMIN ABM CAT
      'mostrarEditarCategoria' => 'AdminCategoriaController#showEditCat',
      'listarCategoria' => 'AdminCategoriaController#mostrarCategoria',
      'agregarCategoria'=> 'AdminCategoriaController#createCat',
      'borrarCategoria'=> 'AdminCategoriaController#deleteCat',
      'editarCategoria' => 'AdminCategoriaController#editCat',
      //ADMIN ABM ITEM
      'agregarImagenes'=>'AdminProductoController#agregarImagenes',
      'deleteImages'=>'AdminProductoController#borrarImagenes',
      'mostrarEditarProducto' => 'AdminProductoController#showEditProd',
      'getProductos' => 'AdminProductoController#mostrarPanelDelantal',
      'agregarProd'=> 'AdminProductoController#createDel',
      'borrarProducto'=> 'AdminProductoController#deleteDel',
      'editarProducto' => 'AdminProductoController#editDel',
      //Login/logout
      'agregarUsuario'=>'LoginController#createUser',
      'registrarse'=>'LoginController#registrarUsuario',
      'login' => 'LoginController#login',
      'autenticacion' => 'LoginController#autenticar',
      'logout' => 'LoginController#cerrarSesion',
      //Admin Navegacion
      'admin' => 'AdminStaticController#index'
    ];

}

 ?>
