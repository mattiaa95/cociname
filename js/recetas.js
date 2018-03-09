$( document ).ready(function() {
    console.log( "ready!" );

	$.ajax({
		url: "php/recetas.php",
		type: "POST"
				}).done(function(respuesta){
          var obj = jQuery.parseJSON(JSON.stringify(respuesta));

          obj.forEach(function(element) {
            $("#cuerpo").append(
                $('<div>', {
                    'class': 'col-md-6'
                }).append(
                  $('<h2>').append($('<a>',{'href':'#','text':element.nombre})),
                  $('<p>',{'text':element.receta_descripcion}),
                  $('<img />', { src: 'img/'+element.src ,alt: element.nombre,height: '300px',width:'300px'}),
                  $('<p>').append($('<a>',{'class': 'btn btn-default', 'href':'#','role':'button' ,'text': 'Reserva'}))
                )
              )
          });


				});
		});
