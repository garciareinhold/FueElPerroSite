<article class="container-fluid" >
  <section class="row container-fluid">
    {foreach from=$categorias item=categoria}
    <section class="col-md-4  col-xs-12">
      <figure>
        <img src="{$categoria['imagen']}" class="img-circle imagenes-disenio" alt="Modelo 1">
        <figcaption>
          <ul>
            <li>{$categoria['nombre_categoria']}</li>
            <li>{$categoria['precio_categoria']}</li>
            <li><button type="button" class="productosCategoria" data-id="{$categoria['id_categoria']}">Ver Productos</button></li>
          </ul>
        </figcaption>
      </figure>
    </section>
      {/foreach}
  </section>
</article>
