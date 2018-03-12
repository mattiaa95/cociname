$( document ).ready(function() {
  $("#pr-borrar").click(function(){

  window.sessionStorage.removeItem('id_usuario');
  window.sessionStorage.removeItem('password');
  window.sessionStorage.removeItem('usuario');
  window.sessionStorage.removeItem('nombre');
  window.sessionStorage.removeItem('apellidos');
  window.sessionStorage.removeItem('descripcion');
  window.sessionStorage.removeItem('fecha');
  window.sessionStorage.removeItem('email');
  window.document.location.href = "index.html";
  });
});
