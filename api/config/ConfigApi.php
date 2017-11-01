<?php
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'Comentarios#GET'=> 'ComentariosApiController#getComentarios',
      'Comentario#GET'=> 'ComentariosApiController#getComentario',
      'Comentario#DELETE'=> 'ComentariosApiController#deleteComentario',
      'Comentario#POST'=> 'ComentariosApiController#createComentario',
    
      // 'tareas#PUT'=> 'TareasApiController#editTarea'
    ];
}
?>
