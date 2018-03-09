$( document ).ready(function() {
  $("#pr-nombre").text(sessionStorage.getItem('nombre'));
  $("#pr-nomap").text(sessionStorage.getItem('nombre')+" "+sessionStorage.getItem('apellidos'));
  $("#pr-fecha").text(sessionStorage.getItem('fecha'));
  $("#pr-descripcion").text(sessionStorage.getItem('descripcion'));
  $("#pr-email").text(sessionStorage.getItem('email'));
});
