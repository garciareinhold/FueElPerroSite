<div class="row">
  <h1>Llene los datos</h1>
  <div class="col-md-6 col-md-offset-3">
    <form id="crearUsuario" action="agregarUsuario" method="post">
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="User" required>
      </div>
      <div class="form-group">
        <label for="clave">Password</label>
        <input type="password" class="form-control" id="clave" name ="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="mail">Mail</label>
        <input type="mail" class="form-control" id="mail" name ="mail" placeholder="mail@ejemplo.com" required>
      </div>
      {if !empty($error) }
        <div class="alert alert-danger" role="alert">{$error}</div>
      {/if}
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
</div>
