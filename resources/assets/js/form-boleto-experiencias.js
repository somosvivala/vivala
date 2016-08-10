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
                console.log('success');
                if (data.linkboleto) {
                    window.open(data.linkboleto, '_blank');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    });
});
