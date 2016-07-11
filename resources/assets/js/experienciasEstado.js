
/**
* Metodo para mostrar a sweetAlert de confirmacao de Publicar uma Experiencia
*/
var confirmaPublicarExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a publicacao de uma experiencia
    swal({
        title: "Atenção",
        text: "Essa Experiencia será será publicada, um email avisando a instituição responsavel será disparado e a experiencia estará disponivel na listagem. Deseja publicar essa experiencia?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, publicar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxPublicaExperiencia(target);
            }
    });
};


/**
* Metodo para disparar um POST para publicar uma experiencia
*/
var ajaxPublicaExperiencia = function (target) {
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
        url: '/experiencias/publicar',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoPublicaExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroPublicaExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoPublicaExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Experiencia publicada!</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroPublicaExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel publicar a experiencia. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

/**
* ------
*  Metodos para desativar a Experiencia
* ------
*/

/**
* Metodo para mostrar a sweetAlert de confirmacao de Desativar uma Experiencia
*/
var confirmaDesativarExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a publicacao de uma experiencia
    swal({
        title: "Atenção",
        text: "Essa Experiencia será desativada, e portanto removida da listagem. Deseja desativar essa experiencia?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, desativar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxDesativaExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um POST para publicar uma experiencia
*/
var ajaxDesativaExperiencia = function (target) {

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
        url: '/experiencias/desativar',
        type: 'POST',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoDesativaExperiencia();

            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroDesativaExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoDesativaExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Experiencia desativada!</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroDesativaExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel desativar a experiencia. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};
