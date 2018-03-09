$( document ).ready(function() {
  $("#pr-borrar").click(function(){
  sessionStorage.removeItem('id_usuario');
  sessionStorage.removeItem('password');
  sessionStorage.removeItem('usuario');
  sessionStorage.removeItem('nombre');
  sessionStorage.removeItem('apellidos');
  sessionStorage.removeItem('descripcion');
  sessionStorage.removeItem('fecha');
  sessionStorage.removeItem('email');
  document.location.href = "index.html";
  });
});
