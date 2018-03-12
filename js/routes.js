$( document ).ready(function() {
  console.log( "ready routes" );
  if (window.sessionStorage.getItem('usuario')) {
    $("#navbar").append('<div class="navbar-form navbar-right" role="form" id="auth">' +
           '<a class="btn btn-success" href="perfil.html"> Perfil </a>' +
           '</div>');
     $("#navbar").append('<div class="navbar-form navbar-right" role="form" id="auth">' +
            '<a class="btn btn-default" href="crearreceta.html"> CrearReceta </a>' +
              '</div>');
    $("#login").hide();
  }else {
    $("#auth").hide();
    $("#login").show();
  }
});
