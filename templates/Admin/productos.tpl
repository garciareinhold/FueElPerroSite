<article class="container-fluid" >
  <section class="row container-fluid">
      {foreach from=$delantales item=delantal}
      <div class="col-md-4  col-xs-12">
        <figure>
          <img src="{$delantal['imagenes'][0]['locacion']}" class="img-circle imagenes-disenio" alt="Modelo 1">
          <figcaption>
            <ul>Categoria("id"): {$delantal['id_categoria']}
              <li>Talle disponible: {$delantal['talle_disponible']}</li>
              <li>Descripcion: {$delantal['descripcion']|truncate:20}</li>
              <a href="#" class="borrarProd"  data-id="{$delantal['id_delantal']}"><span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span></a>
              <a href="#" class="editarProd"  data-id="{$delantal['id_delantal']}"><span class="glyphicon glyphicon-ok" aria-hidden="true">Editar</span></a>
            </ul>
          </figcaption>
        </figure>
      </div>
      {/foreach}
  </section>
</article>
