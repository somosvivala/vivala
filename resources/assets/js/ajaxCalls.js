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
        var frmData = new FormData($('.form-ajax')[0]);
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
});
