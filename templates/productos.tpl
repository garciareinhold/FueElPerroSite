<article class="container-fluid" >
  <section class="row container-fluid">
    {foreach from=$delantales item=delantal}
    <section class="col-md-4  col-xs-12">
      <figure>
        <img src="{$delantal['imagen']}" class="img-circle imagenes-disenio" alt="Modelo 1">
        <figcaption>
          <ul>{$delantal['id_categoria']}
            <li>Talle disponible:{$delantal['talle_disponible']}</li>
            <li>Descripcion: {$delantal['descripcion']|truncate:20}</li>
            <li><a href="#" class="detalle" data-id="{$delantal['id_delantal']}">Ver mas</a></li>
          </ul>
        </figcaption>
      </figure>
    </section>
      {/foreach}
  </section>
</article>
