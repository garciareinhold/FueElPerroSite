<?php
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'Comentarios#GET'=> 'ComentariosApiController#getComentarios'
      // 'tareas#DELETE'=> 'TareasApiController#deleteTareas',
      // 'tareas#POST'=> 'TareasApiController#createTareas',
      // 'tareas#PUT'=> 'TareasApiController#editTarea'
    ];
}
?>
