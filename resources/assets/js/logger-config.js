
/**
 * Funcao para disparar um ajax para loggar as informacoes
 * de uma interacao com a plataforma
 *
 * @param strTipo - string, tipo mapeado em config/logger.php
 * @param strDesc - string, descricao mapeada em config/logger.php
 * @param strUrl - (opcional) - url relacionada a interacao
 * @param strExtra - (opcional) - string/obj com qualquer informacao extra (persistido como JSON)
 *
 */
var logaAcao = function(strTipo, strDesc, strUrl="", strExtra="") {
    var data = {
        tipo : strTipo,
        descricao : strDesc,
        url : strUrl,
        extra : strExtra
    };

    $.ajax({
        url: '/logger/logaction',
        type: 'POST',
        data: data
    });
};

// Shorthand for $( document ).ready()
$(function() {

    /**
     * Binda o click dos elementos com .logger-ativo,
     * pegando as informacoes data-x e chamando o logaAcao
     */
    var checaInteracaoPlataforma = function() {
         $('.logger-ativo').on('click', function(event) {
             //pegando as informacoes data-x do elemento
             var data = $(this).data();

             //disparando ajax para salvar as informacoes
             logaAcao(data.tipo, data.desc, data.loggerurl, data.extra);
        });
    }(); //fazendo a funcao auto-executar
});

var getUltimosLogs = function() {
    //mostrando loading
    $('#gestao-ultimos-logs').html("<h1 style='text-align:center'><i class='fa fa-spin fa-pulse fa-spinner laranja'></i></h1>");

    $.ajax({
        url: '/logger/ultimoslogs',
        type: 'GET',
        success: function (data, textStatus, jqXHR) {
            $('#gestao-ultimos-logs').html(data.html);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal("Oops...", 
                 "Aconteceu algum problema com a requisicao dos logs, erro: " + errorThrown,
                 "error");
            $('#gestao-ultimos-logs').html("");
        }
    });

}


