$( document ).ready(function() {
		$( "#enviar" ).click(function() {
		  alert( "click en enviar" );
					var formData = new FormData();
					formData.append('file', $('#file')[0].files[0]);
					formData.append('nombre', $("#nombre").val());
					formData.append('id_user', sessionStorage.getItem('id_usuario'));
					formData.append('receta_descripcion', $("#descr").val());
					formData.append('precio', $("#precio").val());
					formData.append('porcion', $("#porcion").val());
					formData.append('id_tipo', $("#id_tipo").val());

console.log($('#file'));
					$.ajax({
							url: "php/recetas_crear.php",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
							success: function(respuesta)
							{
								console.log(respuesta);
								console.log(JSON.stringify(respuesta));
								var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
								console.log(objetojs);
							}
					});
			});
	 });
