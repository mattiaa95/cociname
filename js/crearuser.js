$( document ).ready(function() {
    console.log( "ready!" );
  $("#submit").click(function(){
      var formData = new FormData();
      formData.append('file', $('#file')[0].files[0]);
      formData.append('usuario', $("#usuario").val());
      formData.append('nombre', $("#nombre").val());
      formData.append('apellido', $("#apellido").val());
      formData.append('fecha', $("#fecha").val());
      formData.append('descripcion', $("#descripcion").val());
      formData.append('email', $("#email").val());
      formData.append('password', $("#password").val());
      $.ajax({
          url: "../php/crearuser.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(respuesta)
          {
            console.log(respuesta);

          }
    });
  });
});
