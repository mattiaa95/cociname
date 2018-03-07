$( document ).ready(function() {
    console.log( "ready!" );
  $("#submit").click(function(){
      $.ajax({
          url: "../php/crearuser.php",
          cache: false,
          type: "POST",
          data: "password=" + $("#password").val() + "&usuario=" + $("#usuario").val()
          + "&nombre=" + $("#nombre").val() + "&apellido=" + $("#apellido").val() + "&fecha="
          + $("#fecha").val() + "&descripcion=" + $("#descripcion").val()
        }).done(function(respuesta){
            var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
            if (objetojs.creado != 0) {
              $("#texto").text("Creado correctamente");
              $("#form").hide();
            }else {
              $("#texto").text("Error al crear el usuario");
              $("#form").hide();
            }
          })
  });
});
