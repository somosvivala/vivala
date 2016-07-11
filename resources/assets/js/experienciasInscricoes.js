/**
* Metodo para mostrar a sweetAlert de DELETE de InscricaoExperiencia
*/
var confirmaInscricaoExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Essa Inscricao será confirmada e emails serão disparados para o candidato e para a institição. <br> Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, confirmar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxConfirmaInscricaoExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxConfirmaInscricaoExperiencia = function (target) {

    var parentLinha = $(target).parents('.inscricao-experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id_inscricao : parentLinha.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/confirmainscricao',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoConfirmaInscricaoExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroConfirmaInscricaoExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoConfirmaInscricaoExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Inscricao confirmada! Recarregando...</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroConfirmaInscricaoExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel confirmar a inscricao. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

/**
* METODOS PARA DELETE
*/

/**
 * Metodo para mostrar a sweetAlert de DELETE de InscricaoExperiencia
 */
var confirmaCancelaInscricaoExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma inscricao
    swal({
        title: "Atenção",
        html: "Essa Inscricao será cancelada e emails serão disparados para o candidato e para a institição. <br> Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, cancelar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxCancelaInscricaoExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de POST para confirmar uma InscricaoExperiencia
*/
var ajaxCancelaInscricaoExperiencia = function (target) {

    var parentLinha = $(target).parents('.inscricao-experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id_inscricao : parentLinha.data('id-inscricao'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/cancelainscricao',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoCancelaInscricaoExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroCancelaInscricaoExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoCancelaInscricaoExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Inscricao cancelada! Recarregando...</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroCancelaInscricaoExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel cancelar a inscricao. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};
