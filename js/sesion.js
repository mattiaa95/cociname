
$( document ).ready(function() {
  $("#submit").click(function(){
      $.ajax({
          url: "php/usuarios.php",
          cache: false,
          type: "POST",
          data: "username=" + $("#username").val() + "&password=" + $("#password").val(),
        }).done(function(respuesta){
            var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
            console.log(objetojs);
            if (objetojs.estado != 0) {
              sessionStorage.setItem('id_usuario', objetojs[0].id);
              sessionStorage.setItem('password', objetojs[0].password);
              sessionStorage.setItem('usuario', objetojs[0].usuario);
              sessionStorage.setItem('nombre', objetojs[0].nombre);
              sessionStorage.setItem('apellidos', objetojs[0].apellidos);
              sessionStorage.setItem('descripcion', objetojs[0].descripcion);
              sessionStorage.setItem('fecha', objetojs[0].fecha);
              sessionStorage.setItem('email', objetojs[0].email);
              document.location.href = "index.html";
            }
          })
    });
  });
