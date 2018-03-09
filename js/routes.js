$( document ).ready(function() {
  console.log( "ready!" );
  if (sessionStorage.getItem('usuario')) {
    $("#navbar").append('<div class="navbar-form navbar-right" role="form" id="auth">' +
           '<a class="btn btn-success" href="perfil.html"> Perfil </a>' +
           '</div>');
    $("#login").hide();
  }else {
    $("#auth").hide();
    $("#login").show();
  }
});
