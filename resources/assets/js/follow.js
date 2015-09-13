var followPerfil = 'a';
$( document ).ready(function() {

  followPerfil = function(idPerfil) {
      var btnSeguir = $('button.btn_seguir_viajante[data-id="'+idPerfil+'"]');
      console.log(btnSeguir);
      btnSeguir.html('seguindo');
      btnSeguir.addClass('suave');
      btnSeguir.parent('form').get(0).setAttribute('action', 'ajax/unfollowperfil/'+idPerfil+);
  };


});
