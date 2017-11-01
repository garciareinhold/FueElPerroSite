<?php
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'Comentarios#GET'=> 'ComentariosApiController#getComentarios',
      'Comentario#GET'=> 'ComentariosApiController#getComentario',
      'Comentario#DELETE'=> 'ComentariosApiController#deleteComentario'
      // 'tareas#POST'=> 'TareasApiController#createTareas',
      // 'tareas#PUT'=> 'TareasApiController#editTarea'
    ];
}
?>
