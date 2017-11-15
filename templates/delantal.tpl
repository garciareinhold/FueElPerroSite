<article class="container-fluid" >
  <section class="row container-fluid">
      <figure>
        {foreach from=$producto['imagenes'] item=imagen}
          <img src="{$imagen['locacion']}" alt="Imagen del producto {$producto['id_delantal']}">
        {/foreach}
        <figcaption>
          <ul>{$producto['id_categoria']}
            <li>Talle disponible:{$producto['talle_disponible']}</li>
            <li>Descripcion: {$producto['descripcion']}</li>
          </ul>
        </figcaption>
      </figure>
      {include file="comentarios.tpl"}
      {if $puedeAgregar}
      <div id="addFormComentarios">

      {include file="formComentarios.tpl"}
      </div>
      {/if}
  </section>
</article>
