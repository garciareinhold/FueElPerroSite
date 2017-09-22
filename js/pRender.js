$(document).ready(function(){

  "use strict";

  $(".anchor-nav").on("click", function (event) {
    event.preventDefault();
    let seccion=$(this).attr("id");
    $.ajax({
      "url": seccion+".php",
      "method": "GET",
      "dataType": "HTML",
      "success": mostrarAjax,
      "error": manejarError
    });
  });

  function mostrarAjax (data){
    $("#js-insertar-html").html(data);
  }
  function manejarError(data){
      alert("error");
    }
}
