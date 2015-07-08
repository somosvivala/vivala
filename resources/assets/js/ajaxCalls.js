$(function() {

  /**
   * Ajax para o botao de seguir viajante
   */
  $('#btn_seguir').click(function(event) {
    
    //esconde seguir mostra loading
    var btn_seguir = $(this);
    var loading = btn_seguir.next();
    
    btn_seguir.hide();    
    loading.toggleClass('hidden');

  	$.ajax({
  		url: '/ajax/follow/'+ $(this).attr('data-id')
  	})
  	.done(function(data) {
      loading.toggleClass('hidden');
      btn_seguir.addClass('suave')
        .text('seguindo')
        .show();
      alert(data);
  	})
  	.fail(function(data) {
  	  alert('erro seguir perfil'); 
    })
  });



});