$(document).ready(function(){

  //Rest
  let templateComentarios;
  var interval = null;
  $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentarios = template);

  function loadComments(idDelantal) {
        $.ajax("api/comentarios/"+idDelantal)
            .done(function(data) {
              //aca sacar el valor de un hidden puesto en el template de editarProductos
              data.admin=$("#spanInvisible").data("id");
              let rendered = Mustache.render(templateComentarios , data);
              $('#comentarios').html(rendered);
            })
            .fail(function() {
                $('#comentarios').html('<p>No se pudieron cargar los comentarios del producto</p>');
            });
  }
  function createComment(idDelantal) {
      console.log("entre en create comment");
      let comentario ={
        "puntaje":$('#puntaje').val(),
        "usuario": $('#usuario').val(),
        "descripcion": $('#descripcion').val(),
        "id_delantal":String(idDelantal)
      };
      console.log(comentario);
      $.ajax({
            method: "POST",
            url: "api/comentario",
            data: JSON.stringify(comentario),
            contentType: "application/json;charset=UTF-8",
            dataType: "json"
          })
        .done(function(data) {
          let rendered = Mustache.render(templateComentarios , data);
          $('#comentarios').before(rendered);
        })
        .fail(function(data) {
            alert("Imposible crear el comentario");
            console.log(data);
        })
  }

  function borrarTarea(idComentario) {
    $.ajax({
          method: "DELETE",
          url: "api/comentarios/" + idComentario
        })
      .done(function() {
         $('#comentario'+idComentario).remove();
      })
      .fail(function() {
          alert('Imposible borrar el comentario');
      });
  }
  //function delete va a tener que llamar a mostrar imagenes

//ABM categorias
  function editarCat(data) {
    $.post("editarCategoria",data,adminMostrarAjax);
  }
  function mostrarEditarCat(data) {
    let id_categoria= {id: data};
    $.post("mostrarEditarCategoria",id_categoria,adminMostrarAjax);
  }
  function agregarCat(data) {
    $.post("agregarCategoria",data,adminMostrarAjax);
  }
  function borrarCat(data) {
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
    //binding delete
    setTimeout(function(){loadComments(data);}, 650);
    clearInterval(interval);
    interval = setInterval(function(){loadComments(data);},2000);
  }
  function borrarProd(data) {
    let id_producto= {id: data};
    $.post("borrarProducto",id_producto,adminMostrarAjax);
  }
  function listarProductosCategoria(data){
    let id_categoria={id: data};
    $.post("delantalesCategoria",id_categoria,adminMostrarAjax);
  }
  function mostrarDetalle(data) {
    let id_delantal={id: data};
    $.post("delantal",id_delantal,adminMostrarAjax);
    setTimeout(function(){loadComments(data);}, 650);
    clearInterval(interval);
    interval = setInterval(function(){loadComments(data);},2000);
  }
  function deleteImage(id_imagen,id_producto) {
    console.log("entre en delete image");
    let productoImagen={id_image: id_imagen, id_product: id_producto};
    console.log(productoImagen);
    $.post("deleteImages",productoImagen, function(data){
      console.log(data);
      $("#contenedorImagenes").html(data);
      $(".borrarImagen").on("click", function(event){
        event.preventDefault();
        let id_imagen= $(this).data("id");
        let id_producto= $(this).data("producto");

        deleteImage(id_imagen,id_producto);
      })
    })//insertar en el contenedor lo traido y bindear de vuelta);
  }

// Function para mostar Contenido de ajax y bindear funciones
  function adminMostrarAjax(result) {
      $("#js-pRender").html(result);

      $(".borrarImagen").on("click", function(event){
        console.log("entre en borrar imagen");
        event.preventDefault();
        let id_imagen= $(this).data("id");
        let id_producto= $(this).data("producto");
        console.log(id_imagen);
        console.log(id_producto);
        deleteImage(id_imagen,id_producto);
      })

      $("#agregarComentario").on("click", function(event){
        event.preventDefault();
        console.log("entre en el binding de create comment");
        let data = $(this).data("id");
        console.log(data);
        createComment(data);
      })
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
        mostrarEditarProd(data);
      });
      $( ".borrarProd" ).on( "click", function( event ) {
        event.preventDefault();
        let data = $(this).data("id");
        borrarProd(data);
      });
      $("#agregarProd").on("submit", function(event){
        event.preventDefault();
        console.log("entre a agregar producto");
        let form_data= new FormData(this);
        $.ajax({
          url: "agregarProd",
          contentType:false,
          processData:false,
          data: form_data,
          type:"post",
          success: function(data){
            console.log(data);
            adminMostrarAjax(data);
          }
        });
        return false;
      });
      $( ".editarDelantales" ).on( "submit", function( event ) {
        event.preventDefault();
        let form_data= new FormData(this);
        $.ajax({
          url: "editarProducto",
          contentType:false,
          processData:false,
          data: form_data,
          type:"post",
          success: function(data){
            adminMostrarAjax(data);
          }
        });
        return false;
      });
      $(".productosCategoria").on("click", function(event){
        event.preventDefault();
        let data= $(this).data("id");
        listarProductosCategoria(data);
      })
      $(".detalle").on("click", function(event){
        event.preventDefault();
        let data= $(this).data("id");
        mostrarDetalle(data);
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
