
$( document ).ready(function() {
console.log("sesion ready");
  $("#submit").click(function(e){
    e.preventDefault();
    var parametros = {
      "username" : $("#username").val(),
      "password" : $("#password").val()
  };
      $.ajax({
          url: "http://10.10.100.13/php/usuarios.php",
          type: "POST",
          data: parametros,
          success: function(respuesta){
          var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
          if (objetojs.estado != 0) {
            window.sessionStorage.setItem('id_usuario', objetojs.id);
            window.sessionStorage.setItem('password', objetojs.password);
            window.sessionStorage.setItem('usuario', objetojs.usuario);
            window.sessionStorage.setItem('nombre', objetojs.nombre);
            window.sessionStorage.setItem('apellidos', objetojs.apellidos);
            window.sessionStorage.setItem('descripcion', objetojs.descripcion);
            window.sessionStorage.setItem('fecha', objetojs.fecha);
            window.sessionStorage.setItem('email', objetojs.email);
            window.sessionStorage.setItem('imagen', objetojs.imagen);
            window.document.location.href = "index.html";
          }
          }
        })
    });
  });
