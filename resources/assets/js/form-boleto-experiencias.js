$(function () {
    $('form.gerar-boleto-experiencia').submit(function(e) {
        e.preventDefault();

        var frm = $(this),
            loading = frm.data('loading');

        var params = frm.serialize();

        $.ajax({
            url: '/experiencias/gerarboleto/',
            type: 'POST',
            data: $.param(frm.serializeArray()),
            complete: function (jqXHR, textStatus) {
                // callback
            },
            success: function (data, textStatus, jqXHR) {
                if (data.linkboleto) {
                    window.open(data.linkboleto, '_blank');
                    frm.parents('.modal').modal('hide');

                    swal({
                        type: "success",
                        html: '<h4>Boleto gerado com sucesso</h4> <br><p>Se o download nao começar automaticamente, acesse o <a href="'+data.linkboleto+'" target="_blank" class="laranja laranja-hover texto-negrito"> link para 2º via </a></p><br><br>',
                        showCancelButton: false,
                        confirmButtonText: "VER MAIS EXPERIÊNCIAS",
                        confirmButtonClass: "texto-negrito",
                        confirmButtonColor: "#27a493"
                    },
                    function() {
                        window.location.href = "/experiencias";
                    }
                        );
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    });

    //disparando funcao para checar os inputs disabled
    checaDisabledFormBoletoExperiencia();

});

/**
 * Funcao para remover o disabled do form se o user ja tiver fornecido esses dados em outra vez
 */
var checaDisabledFormBoletoExperiencia = function() {
    //iterando sob os inputs, se tiverem valor retiro o disabled
    $.each($('form.gerar-boleto-experiencia input'), function(key,value) {
        if ($(value).val()) {
            $(value).removeAttr('disabled');
        }
    });
}
