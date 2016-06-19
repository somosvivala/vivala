
/**
 * Metodo para mostrar a sweetAlert de DELETE de Experiencia
 */
var confirmaDeleteExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma categoria
    swal({
        title: "Atenção",
        text: "Essa Experiencia será removida. Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, deletar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxDeleteExperiencia(target);
            }
    });
};


/**
 * Metodo para disparar um Ajax de DELETE em uma Experiencia
 */
var ajaxDeleteExperiencia = function (target) {

    var parentLinha = $(target).parents('.experiencia-item');

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
        id : parentLinha.data('id'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/' + params.id,
        type: 'DELETE',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //deixando vermelho e removendo o elemento
            parentLinha.addClass('bg-danger').fadeOut(400, function() {
                $(this).remove()
            });

            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoDeleteExperiencia();
            location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroDeleteExperiencia();
        }
    });
};

/**
 * Funcao para mostrar uma sweetAlert de sucesso
 */
var sweetAlertSucessoDeleteExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Experiencia removida!</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};


/**
 * Funcao para mostrar uma sweetAlert de sucesso
 */
var sweetAlertErroDeleteExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel remover a experiencia. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

