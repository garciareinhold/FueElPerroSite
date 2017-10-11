<section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Editar Producto</h1>
      <form  class="editarDelantales"  method="post">
        <div class="form-group">
          <label for="talle">Id delantal a editar</label>
          <input type="text" class="form-control" id="id" name="id_delantal"  value="{{$id_producto}}" placeholder="Talle Disponible" readonly>
        </div>
        <div class="form-group">
          <label for="talle">Talle Disponible</label>
          <input type="text" class="form-control" id="talle" name="talle"  value="" placeholder="Talle Disponible" required>
        </div>
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <select class="form-control" name="categoria">
            {foreach from=$categorias item=categoria}
              <option value="{$categoria['id_categoria']}" >{$categoria['nombre_categoria']}</option>
            {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <textarea name="descripcion" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group">
          <label for="url">Ruta imagen</label>
          <input type="text" name="imagen" value="" required>
        </div>
        <button type="submit" class="btn btn-default">Actualizar</button>
      </form>
    </div>
  </div>
</section>
