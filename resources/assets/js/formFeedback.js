$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('#form-feedback').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect'),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('input:submit').hide();
            $(this).find('#'+loading).show();
        }

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),    
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            success: function (data) {
                // Executa uma função de javascript
                if(callbackFunction) {
                   swal('Muito obrigado', "Seu feedback foi enviado. Entraremos em contato assim que possivel. ", 'success');
                   $('#modal-feedback').modal('hide');
                }
                // Redireciona para outra pagina
                if(redirect) {
                    window.location = redirect;
                }
            },
            error: function (data) {
                
                //Se tiver loading e tiver dado erro, voltar botao
                if (loading && loading != "") {
                    $(this).find('input:submit').show();
                    $(this).find('#'+loading).hide();
                }

            }
        });
    });

});

