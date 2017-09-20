<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'ControllerUsuario#index',
      'home'=> 'ControllerUsuario#index',
      'delantales' => 'ControllerUsuario#mostrarListaDel',
      'categorias' => 'ControllerUsuario#mostarListaCat',
      'delantal' => 'ControllerUsuario#mostrarDel',
      'listaCat' => 'ControllerAdmin#mostarListaCat',
      'agregarCat'=> 'ControllerAdmin#createCat',
      'borrarCat'=> 'ControllerAdmin#deleteCat',
      'editarCat' => 'ControllerAdmin#editCat',
      'listaDel' => 'ControllerAdmin#mostarListaDel',
      'agregarDel'=> 'ControllerAdmin#createDel',
      'borrarDel'=> 'ControllerAdmin#deleteDel',
      'editarDel' => 'ControllerAdmin#editDel',
    ];

}

 ?>
