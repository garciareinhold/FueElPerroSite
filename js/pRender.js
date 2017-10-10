$(document).ready(function(){

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
      let id_delantal= {id: data};
      $.post("mostrarEditarProducto",id_delantal,adminMostrarAjax);
    }

    function agregarProducto(data) {
      console.log("entre en la funcion");
      $.post("agregarProd",data,adminMostrarAjax);
    }

    function borrarProd(data) {
      let id_producto= {id: data};
      $.post("borrarProducto",id_producto,adminMostrarAjax);
    }
    /*function autenticar(data) {
      console.log(data);
      $.post("autenticacion",data,adminMostrarAjax);
      console.log("entre en autenticar");
    }*/

// Partial Render
  function adminMostrarAjax(result)
    {
      console.log("entre en el mostrarAjax");
      console.log(result);
      $("#js-pRender").html(result);
        $( ".editarCat" ).on( "click", function( event ) {
          event.preventDefault();
          let data = $(this).data("id");
          mostrarEditarCat(data);
        });
        /*$( ".loginForm" ).on( "submit", function( event ) {
          event.preventDefault();
          console.log("entre en el binding");
          let data = $(this).serialize();
          console.log(data);
          autenticar(data);
        });*/
        $( ".elegirCategoria" ).on( "click", function( event ) {
          event.preventDefault();
          let data = $(this).val();
          $("#categoria").val(data);
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
              mostrarEditarProd(data);
            });
            $( ".borrarProd" ).on( "click", function( event ) {
              event.preventDefault();
              let data = $(this).data("id");
              borrarProd(data);
            });
            $( "#agregarProd" ).on( "submit", function( event ) {
              event.preventDefault();
              let data = $(this).serialize();
              console.log("entre en el binding");
              agregarProducto(data);
            });
            $( ".editarDelantales" ).on( "submit", function( event ) {
                event.preventDefault();
                let data = $(this).serialize();
                editarProd(data);
              });
  }
  $(".navegacion").on("click", function (event) {
    event.preventDefault();
    let seccion_pagina=$(this).attr("id");
      $.ajax({
        url: seccion_pagina,
        success: adminMostrarAjax
      })
      });

});
