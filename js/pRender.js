$(document).ready(function(){

// Partial Render Usuario
  $(".userNavegacion").on("click", function (event) {
    event.preventDefault();
    let seccion_pagina=$(this).attr("id");
      $.ajax({
        url: location.href + seccion_pagina,
        success: function(result){
          $("#js-pRender").html(result);
        }
      });
  });

//ABM categorias
  function editarCat(data) {
    $.post("editarCategoria",data,adminMostrarAjax);
  }
  function mostrarEditarCat(data) {
    console.log("entre en editar");
    let id_categoria= {id: data};
    $.post("mostrarEditarCategoria",id_categoria,adminMostrarAjax);
  }

  function agregarCat(data) {
    console.log("entre en agregar");
    $.post("agregarCategoria",data,adminMostrarAjax);
  }

  function borrarCat(data) {
    console.log("entre en borrar");
    let id_categoria= {id: data};
    $.post("borrarCategoria",id_categoria,adminMostrarAjax);
  }
  //ABM productos
    function editarProd(data) {
      $.post("editarProducto",data,adminMostrarAjax);
    }
    function mostrarEditarProd(data) {
      let id_categoria= {id: data};
      $.post("mostrarEditarProducto",id_categoria,adminMostrarAjax);
    }

    function agregarProd(data) {
      console.log("entre a agregar producto");
      $.post("agregarProducto",data,adminMostrarAjax);
    }

    function borrarProd(data) {
      let id_categoria= {id: data};
      $.post("borrarProducto",id_categoria,adminMostrarAjax);
    }

// Partial Render Admin
  function adminMostrarAjax(result)
    {
      console.log("entre en el .html");
      $("#js-adminPrender").html(result);
        $( ".editarCat" ).on( "click", function( event ) {
          event.preventDefault();
          let data = $(this).data("id");
          mostrarEditarCat(data);
        });
        $( ".borrarCat" ).on( "click", function( event ) {
          event.preventDefault();
          let data = $(this).data("id");
          borrarCat(data);
        });
        $( "#agregarCat" ).on( "submit", function( event ) {
          event.preventDefault();
          let data = $(this).serialize();
          agregarCat(data);
        });
        $( ".editarCategorias" ).on( "submit", function( event ) {
            event.preventDefault();
            let data = $(this).serialize();
            editarCat(data);
          });
            $( ".editarProd" ).on( "click", function( event ) {
              event.preventDefault();
              let data = $(this).data("id");
              mostrarEditar(data);
            });
            $( ".borrarProd" ).on( "click", function( event ) {
              event.preventDefault();
              let data = $(this).data("id");
              borrarProd(data);
            });
            $( "#agregarProd" ).on( "submit", function( event ) {
              event.preventDefault();
              let data = $(this).serialize();
              console.log(data);
              agregarProd(data);
            });
            $( ".editarProductos" ).on( "submit", function( event ) {
                event.preventDefault();
                let data = $(this).serialize();
                editarProd(data);
              });
  }
  $(".adminNavegacion").on("click", function (event) {
    event.preventDefault();
    console.log("entre en el p Render");
    let seccion_pagina=$(this).attr("id");
      $.ajax({
        url: seccion_pagina,
        success: adminMostrarAjax
      })
      });

});
