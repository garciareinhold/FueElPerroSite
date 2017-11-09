<article class="container-fluid" >
  <section class="row container-fluid">
      <figure>
        <img src="{$producto['imagen']}" class="img-circle imagenes-disenio" alt="Modelo 1">
        <figcaption>
          <ul>{$producto['id_categoria']}
            <li>Talle disponible:{$producto['talle_disponible']}</li>
            <li>Descripcion: {$producto['descripcion']}</li>
          </ul>
        </figcaption>
      </figure>
      <div id="comentarios">
        <p>hola</p>
      </div>
      {include file="formComentarios.tpl"}
  </section>
</article>
