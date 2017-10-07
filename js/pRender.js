$(document).ready(function(){

  if(location.href=="http://localhost/proyectos/tpE1/"){
    $.ajax({
      url: "http://localhost/proyectos/tpE1/home",
        success: function(result){
          $("#js-pRender").html(result);
        }
    });
  }

  $(".navegacion").on("click", function (event) {
    event.preventDefault();
    let seccion_pagina=$(this).attr("id");
    if(seccion_pagina!="logout"){
      $.ajax({
        url: "http://localhost/proyectos/tpE1/"+seccion_pagina,
        success: function(result){
          $("#js-pRender").html(result);

          //A
          $("#formularioCategoria").on("submit",function(event){
            event.preventDefault();
            console.log("entre");
            var data = $(this).serialize();
            console.log(data);
            $.post("agregarCategoria",data,function(response) {
              $("#ajaxContent").html(response);

            });
          });
          
          //B
          $("#borrar").on("click",function(event){
            console.log("entre");
            event.preventDefault();
            let id_categoria=$(this).data("id");
            console.log(id_categoria);
            let data= {id: id_categoria};
            $.post("borrarCategoria",data,function(response) {
              $("#ajaxContent").html(response);
            });
          });
        }
      });
    }
  });


});
