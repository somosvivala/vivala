$(function() {

    //token do laravel para ajax
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    /** Funcões para Upload */
    $('.form-ajax').submit(function (ev) {
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
                console.log("Formulário submetido com sucesso:");
                console.log(data);
                // Executa uma função de javascript
                if(callbackFunction) {
                    eval(callbackFunction);
                }
                // Redireciona para outra pagina
                if(redirect) {
                    window.location = redirect;
                }
            }
        });
    });

    // Muda o ícone de javascript ativo
    $('#javascript-ativo').css("color", "#6a6");
});
