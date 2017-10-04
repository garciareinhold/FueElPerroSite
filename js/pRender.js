$(document).ready(function(){

  $.ajax({
    url: "http://localhost/proyectos/tpE1/home",
      success: function(result){
        $("#js-pRender").html(result);
      }
  });

  $(".navegacion").on("click", function (event) {
    event.preventDefault();
    let seccion_pagina=$(this).attr("id");
    $.ajax({
      url: "http://localhost/proyectos/tpE1/"+seccion_pagina,
        success: function(result){
          $("#js-pRender").html(result);
        }
    });
  })

});
