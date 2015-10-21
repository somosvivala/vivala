$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('.cropfoto-ajax').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            callbackFunction = frm.data('callback'),
            redirect = frm.data('redirect');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            success: function (data) {
                // Executa uma função de javascript
                console.log(data);

                $('#uploadedFoto').val(data.id);
                $('#preview').attr('src',data.path);
                swal(null, "Foto atualizada com sucesso", 'success');

            }
        });
    });

});
