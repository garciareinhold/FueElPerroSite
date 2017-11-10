{foreach from=$producto['imagenes'] item=imagen}
<figure>
  <img src="images/{$imagen['locacion']}" alt="Imagen del producto {$producto['id_delantal']}">
  <figcaption>
    <button type="button" class="borrarImagen" data-id="{$imagen['id_imagen']}" data-producto="{{$id_producto}}">Delete</button>
  </figcaption>
</figure>
{/foreach}
