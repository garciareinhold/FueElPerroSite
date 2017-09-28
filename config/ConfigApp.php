<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'UsuarioController#index',
      'home'=> 'UsuarioController#home',
      'delantales' => 'UsuarioController#mostrarListaDel',
      'categorias' => 'UsuarioController#mostarListaCat',
      'delantalesCategoria' => 'UsuarioController#mostrarDelCat',
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
