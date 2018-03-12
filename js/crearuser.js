$( document ).ready(function() {
    if (sessionStorage.getItem('usuario')) {
      window.document.location.href = "index.html";
    }
  $("#enviar").click(function(e){
      e.preventDefault();
      var formData = new FormData();
      formData.append('file', $('#file')[0].files[0]);
      formData.append('usuario', $("#usuario").val());
      formData.append('nombre', $("#nombre").val());
      formData.append('apellido', $("#apellido").val());
      formData.append('fecha', $("#fecha").val());
      formData.append('descripcion', $("#descripcion").val());
      formData.append('email', $("#email").val());
      formData.append('password', $("#cr-password").val());
      console.log(formData);
      $.ajax({
          url: "http://10.10.100.13/php/crearuser.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(respuesta){

            var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
              alert(objetojs.Error);
              window.document.location.href = "index.html";
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus); alert("Error: " + errorThrown);
          },
            async: false
    });
  });
});
