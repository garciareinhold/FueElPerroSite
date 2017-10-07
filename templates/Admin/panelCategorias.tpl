<article class="container-fluid" >
  <section id="ajaxContent">
    {include file="Admin/categorias.tpl"}
  </section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Agregar Categoria</h1>
      <div class="alert alert-danger" role="alert">Aca va el error</div>
      <form  id="formularioCategoria" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  value="" placeholder="Nombre de la categoria">
        </div>
        <div class="form-group">
          <label for="number">Precio</label>
          <input type="number" name="precio" value="">
        </div>
        <div class="form-group">
          <label for="url">Ruta imagen</label>
          <input type="text" name="imagen" value="">
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
      </form>
    </div>
  </div>
</article>
