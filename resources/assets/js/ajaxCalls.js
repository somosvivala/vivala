$(function() {

  /**
   * Ajax para o botao de seguir viajante
   */
  $('.btn_seguir_viajante').click(function(event) {
    
    //esconde seguir mostra loading
    var btn_seguir = $(this);
    var loading = btn_seguir.next();
    
    btn_seguir.hide();    
    loading.toggleClass('hidden');

  	$.ajax({
  		url: '/ajax/followperfil/'+ $(this).attr('data-id')
  	})
  	.done(function(data) {
      loading.toggleClass('hidden');
      btn_seguir.addClass('suave')
        .text('seguindo')
        .show();
      // alert(data);
  	})
  	.fail(function(data) {
  	  alert('erro seguir perfil'); 
    })
  });

  /**
   * Ajax para o botao de seguir empresa
   */
  $('.btn_seguir_empresa').click(function(event) {
    
    //esconde seguir mostra loading
    var btn_seguir = $(this);
    var loading = btn_seguir.next();
    
    btn_seguir.hide();    
    loading.toggleClass('hidden');

    $.ajax({
      url: '/ajax/followempresa/'+ $(this).attr('data-id')
    })
    .done(function(data) {
      loading.toggleClass('hidden');
      btn_seguir.addClass('suave')
        .text('seguindo')
        .show();
      // alert(data);
    })
    .fail(function(data) {
      alert('erro seguir empresa'); 
    })
  });

  /**
   * Ajax para o botao de seguir ong
   */
  $('.btn_seguir_ong').click(function(event) {
    
    //esconde seguir mostra loading
    var btn_seguir = $(this);
    var loading = btn_seguir.next();
    
    btn_seguir.hide();    
    loading.toggleClass('hidden');

    $.ajax({
      url: '/ajax/followong/'+ $(this).attr('data-id')
    })
    .done(function(data) {
      loading.toggleClass('hidden');
      btn_seguir.addClass('suave')
        .text('seguindo')
        .show();
      // alert(data);
    })
    .fail(function(data) {
      alert('erro seguir perfil'); 
    })
  });




});