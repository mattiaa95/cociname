function consulta() {
	$.ajax({
		url: "php/recetas.php",
		type: "POST"
				}).done(function(respuesta){
          var obj = jQuery.parseJSON(JSON.stringify(respuesta));
          $(".respuesta").text(obj[0].nombre +", "+ obj[1].nombre);
				});
		};
