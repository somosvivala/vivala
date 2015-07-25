$(function() {

$.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

  /** Funcões para Upload so .shp */
  function progressUploadShape(e) {
    console.log(e);
  }

    $('.form-ajax').submit(function (ev) {
        console.log($('.form-ajax'));
        ev.preventDefault();
        var frm = $(this);
        var frmData = new FormData($('.ajax-form')[0]);
        console.log($(this));
        $.ajax({
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // se existir a propriedade upload
                    myXhr.upload.addEventListener('progress', progressUploadShape, false); // chama evento de progresso (progressbar)
                }
                return myXhr;
            },
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frmData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                alert('ok');
            }
        });
    });

function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded,max:e.total});
    }
}


  // /**
  //  * Ajax para o botao de seguir viajante
  //  */
  // $('.btn_seguir_viajante').click(function(event) {

  //   //esconde seguir mostra loading
  //   var btn_seguir = $(this);
  //   var loading = btn_seguir.next();

  //   btn_seguir.hide();
  //   loading.toggleClass('hidden');

  // 	$.ajax({
  // 		url: '/ajax/followperfil/'+ $(this).attr('data-id')
  // 	})
  // 	.done(function(data) {
  //     loading.toggleClass('hidden');
  //     btn_seguir.addClass('suave')
  //       .text('seguindo')
  //       .show();
  //     // alert(data);
  // 	})
  // 	.fail(function(data) {
  // 	  alert('erro seguir perfil');
  //   })
  // });

  /**
   * Ajax para o botao de seguir empresa
   */
  // $('.btn_seguir_empresa').click(function(event) {

  //   //esconde seguir mostra loading
  //   var btn_seguir = $(this);
  //   var loading = btn_seguir.next();

  //   btn_seguir.hide();
  //   loading.toggleClass('hidden');

  //   $.ajax({
  //     url: '/ajax/followempresa/'+ $(this).attr('data-id')
  //   })
  //   .done(function(data) {
  //     loading.toggleClass('hidden');
  //     btn_seguir.addClass('suave')
  //       .text('seguindo')
  //       .show();
  //     // alert(data);
  //   })
  //   .fail(function(data) {
  //     alert('erro seguir empresa');
  //   })
  // });

  /**
   * Ajax para o botao de seguir ong
   */
  // $('.btn_seguir_ong').click(function(event) {

  //   //esconde seguir mostra loading
  //   var btn_seguir = $(this);
  //   var loading = btn_seguir.next();

  //   btn_seguir.hide();
  //   loading.toggleClass('hidden');

  //   $.ajax({
  //     url: '/ajax/followong/'+ $(this).attr('data-id')
  //   })
  //   .done(function(data) {
  //     loading.toggleClass('hidden');
  //     btn_seguir.addClass('suave')
  //       .text('seguindo')
  //       .show();
  //     // alert(data);
  //   })
  //   .fail(function(data) {
  //     alert('erro seguir perfil');
  //   })
  // });




});
