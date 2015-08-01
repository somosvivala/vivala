$(function() {

$.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

  /** Funcões para Upload */
    $('.form-ajax').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = frm.serialize(),
            callbackFunction = frm.data('callback');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: dataForm,
            success: function (data) {
                console.log("Formulário submetido com sucesso:");
                console.log(data);
                if(callbackFunction) {
                    eval(callbackFunction+"()");
                }
            }
        });
    });
});
