<article class="container-fluid" >
  <section class="row container-fluid">
    {if empty($delantales)}
      <p class="bg-danger">Lo sentimos, no hay productos para mostrar ahora :( </p>
    {/if}
    {foreach from=$delantales item=delantal}
    <section class="col-md-4  col-xs-12">
      <figure>
        <img src="{$delantal['imagenes'][0]}" class="img-circle imagenes-disenio" alt="Modelo 1">
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
