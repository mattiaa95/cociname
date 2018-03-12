$( document ).ready(function() {
  if (!window.sessionStorage.getItem('usuario')) {
    window.document.location.href = "index.html";
  }

  $.ajax({
      url: "http://10.10.100.13/php/tipos.php",
      type: "POST",
      success: function(respuesta)
      {
        var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
        objetojs.forEach(function(element) {
          $("#tipo").append('<option value="' + element.id + '">' + element.nombre + '</option>');
        });
      }
  });


		$( "#enviar" ).click(function(e) {
        e.preventDefault();
          console.log($("#tipo").val());
      if (window.sessionStorage.getItem('usuario')) {
					var formData = new FormData();
					formData.append('file', $('#file')[0].files[0]);
					formData.append('nombre', $("#nombre").val());
					formData.append('id_user', sessionStorage.getItem('id_usuario'));
					formData.append('receta_descripcion', $("#descr").val());
					formData.append('precio', $("#precio").val());
					formData.append('porcion', $("#porcion").val());
					formData.append('id_tipo', $("#tipo").val());

					$.ajax({
							url: "http://10.10.100.13/php/recetas_crear.php",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
							success: function(respuesta)
							{
								var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
                  alert(objetojs.Error);
								  window.document.location.href = "index.html";
							},
                async: false
					});
        }

			});


   });
