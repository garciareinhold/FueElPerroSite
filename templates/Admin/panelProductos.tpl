<article class="container-fluid" >
  <section>
    {include file="Admin/productos.tpl"}
  </section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Agregar Producto</h1>
      {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
      {/if}
      <form  id="agregarProd"  method="post">
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
          <textarea class="form-control" name="descripcion" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group">
          <label for="imagen">Imagen</label>
          <input type="file" name="imagenes[]" multiple required>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
      </form>
    </div>
  </div>
</article>
