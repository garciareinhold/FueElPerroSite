$(document).ready(function(){

  //Rest comentarios
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
              $("#borrarComentario").on("click", function(event){
                console.log("entre en el binfing de load comments");
                event.preventDefault();
                let data= $(this).data("id");
                deleteComment(data);
              })
            })
            .fail(function() {
                $('#comentarios').html('<p>No se pudieron cargar los comentarios del producto</p>');
            });
  }
  function createComment(idDelantal) {
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
        })
  }
  function deleteComment(data){
    console.log("entre en delete comment"+data);
    $.ajax({
          method: "DELETE",
          url: "api/comentario/" + data
        })
      .done(function() {
         $("#"+data).remove();
      })
      .fail(function() {
          alert('Imposible borrar el comentario');
      });
  }

//ABM usuarios
  function deleteUser(id_usuario) {
    let data= {id: id_usuario};
    $.post("borrarUsuario",data,adminMostrarAjax);
  }
  function editUser(id_usuario, valorPermiso) {
    let data={
      id: id_usuario,
      permiso: valorPermiso
    };
    $.post("editarUsuario",data,adminMostrarAjax);
  }

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
  //ABM productos e imágenes
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
    let productoImagen={id_image: id_imagen, id_product: id_producto};
    $.post("deleteImages",productoImagen, function(data){
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
      $(".editarUsuario").on("click", function(event){
        event.preventDefault();
        let id_usuario= $(this).data("id");
        let permiso=$(this).data("permiso");
        editUser(id_usuario,permiso);
      })
      $(".borrarUsuario").on("click", function(event){
        event.preventDefault();
        let idUsuario=$(this).data("id");
        deleteUser(idUsuario);
      })
      $(".borrarImagen").on("click", function(event){
        event.preventDefault();
        let id_imagen= $(this).data("id");
        let id_producto= $(this).data("producto");
        deleteImage(id_imagen,id_producto);
      })
      $("#agregarComentario").on("click", function(event){
        event.preventDefault();
        let data = $(this).data("id");
        console.log("entre en el binding", data);
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
        let form_data= new FormData(this);
        $.ajax({
          url: "agregarProd",
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
