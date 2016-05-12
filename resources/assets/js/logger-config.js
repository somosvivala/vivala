
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
