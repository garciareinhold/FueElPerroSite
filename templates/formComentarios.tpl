<div class="container">
  <form>
    <h2>Déjenos su opinión</h2>
    <div class="form-group">
      <label for="nombre">Usuario:</label>
      <input type="text" class="form-control" id="usuario" ></input>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Puntuación:</label>
      <select class="form-control" id="puntaje">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="descripcion">Comentario:</label>
      <textarea class="form-control" id="descripcion" rows="3"></textarea>
    </div>
    <button type="submit" id="agregarComentario" data-id="{$producto['id_delantal']}" name="button">Comentar</button>
  </form>
</div>
