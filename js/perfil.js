$( document ).ready(function() {
  $("#pr-imagen").attr("src","http://10.10.100.13/img/"+window.sessionStorage.getItem('imagen'));
  $("#pr-nombre").text(window.sessionStorage.getItem('nombre'));
  $("#pr-nomap").text(window.sessionStorage.getItem('nombre')+" "+sessionStorage.getItem('apellidos'));
  $("#pr-fecha").text(window.sessionStorage.getItem('fecha'));
  $("#pr-descripcion").text(window.sessionStorage.getItem('descripcion'));
  $("#pr-email").text(window.sessionStorage.getItem('email'));
});
