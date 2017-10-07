<section class="row container-fluid">
  {foreach from=$categorias item=categoria}
  <section class="col-md-4  col-xs-12">
    <figure>
      <img src="{$categoria['imagen']}" class="img-circle imagenes-disenio" alt="Modelo 1">
      <figcaption>
        <ul>
          <li>{$categoria['nombre_categoria']}</li>
          <li>{$categoria['precio_categoria']}</li>
          <a href="#" id="borrar" data-id="{$categoria['id_categoria']}"><span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span></a>
          <a href="#" id="editar" data-id="{$categoria['id_categoria']}"><span class="glyphicon glyphicon-ok" aria-hidden="true">Editar</span></a>
        </ul>
      </figcaption>
    </figure>
  </section>
    {/foreach}
</section>
