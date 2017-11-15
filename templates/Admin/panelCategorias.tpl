<article class="container-fluid" >
  <section>
    {include file="Admin/categorias.tpl"}
  </section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Agregar Categoria</h1>
      {if !empty($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
      {/if}
      <form  id="agregarCat" data-id="agregarCategoria" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  value="" placeholder="Nombre de la categoria" required>
        </div>
        <div class="form-group">
          <label for="number">Precio</label>
          <input type="number" class="form-control" name="precio" value="" required>
        </div>
        <div class="form-group">
          <label for="url">Ruta imagen</label>
          <input type="text" class="form-control" name="imagen" value="" required>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
      </form>
    </div>
  </div>
</article>
