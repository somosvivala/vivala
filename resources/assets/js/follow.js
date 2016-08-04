var followPerfil = 'a';
var followOng = 'a';

$( document ).ready(function() {

  followPerfil = function(idPerfil) {
      var btnSeguir = $('button.btn_seguir_viajante[data-id="'+idPerfil+'"]');

      //dando unfollow
      if (btnSeguir.hasClass('suave')) {
          btnSeguir.html('seguir');
          btnSeguir.removeClass('suave');
          btnSeguir.parent('form').get(0).setAttribute('action', 'ajax/followperfil/'+idPerfil);
      } else {
          btnSeguir.html('seguindo');
          btnSeguir.addClass('suave');
          btnSeguir.parent('form').get(0).setAttribute('action', 'ajax/unfollowperfil/'+idPerfil);
      }
  };

  followOng = function(idOng) {
      var btnSeguir = $('button.btn_seguir_ong[data-id="'+idOng+'"]');

      //dando unfollow
      if (btnSeguir.hasClass('suave')) {
          btnSeguir.html('seguir');
          btnSeguir.removeClass('suave');
          btnSeguir.parent('form').get(0).setAttribute('action', 'ajax/followong/'+idOng);
      } else {
          btnSeguir.html('seguindo');
          btnSeguir.addClass('suave');
          btnSeguir.parent('form').get(0).setAttribute('action', 'ajax/unfollowong/'+idOng);
      }
  };


});
