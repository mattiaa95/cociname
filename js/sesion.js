
$( document ).ready(function() {
    console.log( "ready!" );

$("#submit").click(function(){
    $.ajax({
        url: "../php/usuarios.php",
        cache: false,
        type: "POST",
        data: "username=" + $("#username").val() + "&password=" + $("#password").val(),
      }).done(function(respuesta){
          console.log("aaaaa");
          var objetojs = jQuery.parseJSON(JSON.stringify(respuesta));
          console.log(objetojs[0].id);
          if (objetojs != 0) {
            sessionStorage.setItem('id_usuario', objetojs[0].id);
            sessionStorage.setItem('password', objetojs[0].password);
            $("#login").hide();
            $("#auth").hide();
          }
        })
});
});
