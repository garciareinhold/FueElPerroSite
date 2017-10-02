      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="autenticacion" method="post">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="User" required>
            </div>
            <div class="form-group">
              <label for="contraseña">Password</label>
              <input type="password" class="form-control" id="contraseña" name ="contraseña" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="mail">Mail</label>
              <input type="mail" class="form-control" id="mail" name ="mail" placeholder="mail@ejemplo.com" required>
            </div>
            {if !empty($error) }
              <div class="alert alert-danger" role="alert">{$error}</div>
            {/if}
            <button type="submit" class="btn btn-default">Login</button>
          </form>
        </div>
      </div>
