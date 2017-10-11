<section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1>Editar Categoria</h1>
      <form  class="editarCategorias"  method="post">
        <div class="form-group">
          <label for="id">idCategoria</label>
          <input type="text" class="form-control" id="categoria" name="categoria"  value="{{$id_categoria}}" readonly>
        </div>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  value="" placeholder="Nombre de la categoria" required>
        </div>
        <div class="form-group">
          <label for="number">Precio</label>
          <input type="number" name="precio" value="" required>
        </div>
        <div class="form-group">
          <label for="url">Ruta imagen</label>
          <input type="text" name="imagen" value="" required>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
      </form>
    </div>
  </div>
</section>
