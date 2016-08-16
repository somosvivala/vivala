$(function () {
    $('a.btn-inscrevase-experiencia').click(function(e) {
        e.preventDefault();

        var tipoExperiencia = $('input[name=experiencia_tipo]').val();

        //se a experiencia nao for de evento unico precisamos obter a data de inscricao
        if (tipoExperiencia != 'evento_unico') {
            var dataInscricao = $('.clndr-picker').val();

            if (!dataInscricao) {
                mostrarSweetAlertDataInscricaoNecessaria();
                return;
            }
        }

       var idExperiencia = $('input[name=experiencia_id]').val();
       var params = {
            _token: $('input[name="_token"]').val(),
            data_inscricao: dataInscricao,
            tipo_experiencia: tipoExperiencia,
            id_experiencia: idExperiencia
       };

       //fazendo ajax para criacao de uma inscricao de experiencia
        $.ajax({
            url: '/experiencias/createinscricaoexperiencia',
            type: 'POST',
            data: params,
            complete: function (jqXHR, textStatus) {
                // callback
            },
            success: function (data, textStatus, jqXHR) {
                console.log('succeso create inscricao');
                if (data.success) {
                    window.location.href = "/experiencias/checkout/" + idExperiencia;
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    });
});

/**
* Funcao para mostrar uma sweetAlert de erro
*/
var mostrarSweetAlertDataInscricaoNecessaria = function() {
    swal({
        type: "warning",
        html: '<h4>Opa..</h4> <br> <p> É necessario selecionar uma data para se inscrever.</p><br>',
        confirmButtonColor: "#F9A325",
        showCancelButton: false
    },
    function() {
        $('.clndr-picker').trigger('click');
    }
    );
};

