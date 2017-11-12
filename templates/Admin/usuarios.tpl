<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Nombre Usuario</th>
      <th scope="col">Mail</th>
      <th scope="col">Agregar/Quitar Permisos</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$usuarios item=usuario}
    <tr>
      <th scope="row">{$usuario['id_usuario']}</th>
      <td>{$usuario['username']}</td>
      <td>{$usuario['mail']}</td>
      {if $usuario["is_admin"]==1}
      <td> <button class="editarUsuario" data-id="{$usuario['id_usuario']}" data-permiso="0" type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Quitar</button></td>
      {else}
      <td> <button class="editarUsuario" data-id="{$usuario['id_usuario']}" data-permiso="1" type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Agregar</button></td>
      {/if}
      <td> <button class="borrarUsuario" data-id="{$usuario['id_usuario']}" type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    </tr>
    {/foreach}
  </tbody>
</table>
