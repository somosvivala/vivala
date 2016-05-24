
/**
 * Metodo para mostrar a sweetAlert de DELETE de CategoriaExperiencia
 */
var confirmaDeleteCategoriaExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma categoria
    swal({
        title: "Atenção",
        text: "Esse processo é irreversivel, e essa categoria sera removida de todas as Experiencias que estiver associada",
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
                ajaxDeleteCategoriaExperiencia(target);
            }
    });
};


/**
 * Metodo para disparar um Ajax de DELETE em uma CategoriaExperiencia
 */
var ajaxDeleteCategoriaExperiencia = function (target) {

    var parentLinha = $(target).parents('.categoria-experiencia-item');

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
        id : $(target).data('id'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/categorias/experiencias/' + params.id,
        type: 'DELETE',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //deixando vermelho e removendo o elemento
            parentLinha.addClass('bg-danger').fadeOut(400, function() {
                $(this).remove()
            });

            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoDeleteCategoriaExperiencia();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroDeleteCategoriaExperiencia();
        }
    });
};

/**
 * Funcao para mostrar uma sweetAlert de sucesso
 */
var sweetAlertSucessoDeleteCategoriaExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Categoria removida!</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 1100,
    });
};


/**
 * Funcao para mostrar uma sweetAlert de sucesso
 */
var sweetAlertErroDeleteCategoriaExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel remover a categoria. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

