<article class="container-fluid" >
  <section class="row container-fluid">
    <div class="col-md-3 col-xs-3 col-sm-3">
      <h1 class="css-categorias">Categorias</h1>
      {foreach from=$categorias item=categoria}
      <br><button type="button" class="productosCategoria" data-id="{$categoria['id_categoria']}" name="button">{$categoria["nombre_categoria"]}</button>
      {/foreach}
    </div>
    <div class="col-md-9 col-xs-9 col-sm-9">
    {if empty($delantales)}
      <p class="bg-danger">Lo sentimos, no hay productos para mostrar ahora :( </p>
    {/if}
    {foreach from=$delantales item=delantal}
    <section class="col-md-4  col-xs-12">
      <figure>
        <img src="{$delantal['imagenes'][0]['locacion']}" class="img-circle imagenes-disenio" alt="Modelo 1">
        <figcaption>
          <ul>{$delantal['id_categoria']}
            <li>Talle disponible:{$delantal['talle_disponible']}</li>
            <li>Descripcion: {$delantal['descripcion']|truncate:25}</li>
            <li><a href="#" class="detalle" data-id="{$delantal['id_delantal']}">Ver mas</a></li>
          </ul>
        </figcaption>
      </figure>
    </section>
    {/foreach}
  </div>
  </section>
  </article>
