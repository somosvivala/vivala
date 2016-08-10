// Shorthand for $( document ).ready()
$(function() {
    bindaInputsFontAwesome();
});

var adicionaDataEventoUnicoExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.container-datas-ocorrencia');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    $.ajax({
        url: '/experiencias/adddataocorrencia',
        type: 'GET',
        complete: function (jqXHR, textStatus) {
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
            $(ev.target).toggleClass('soft-hide');
            //console.log('ajax completed');
        },
        success: function (data, textStatus, jqXHR) {
            //console.log('ajax success');
            var novaLinha = $(data.html);

            //inserindo antes da linha do botao add
            novaLinha.insertBefore(parentLinha);

            //removendo o icone de adicionar e o de remover a data 
            parentLinha.remove();
            $('#campos_evento_unico a.remover-data-ocorrencia').remove();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log('ajax error');
        }
    });

};




/**
 * Funcao para adicionar uma nova linha de InformacaoExperiencia
 * no formulario de create/edit de experiencias
 */
var adicionaDataOcorrenciaExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.container-datas-ocorrencia');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    $.ajax({
        url: '/experiencias/adddataocorrencia',
        type: 'GET',
        complete: function (jqXHR, textStatus) {
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
            $(ev.target).toggleClass('soft-hide');
            //console.log('ajax completed');
        },
        success: function (data, textStatus, jqXHR) {
            //console.log('ajax success');
            var novaLinha = $(data.html);

            //inserindo antes da linha do botao add
            novaLinha.insertBefore(parentLinha);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log('ajax error');
        }
    });

};


/**
 * Funcao para remover uma linha de InformacaoExperiencia
 * no formulario de create/edit de experiencias.
 */
var removeDataOcorrenciaExperiencia = function(ev) {

    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var parentLinha = $(ev.target).parents('.container-datas-ocorrencia');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    //pegando o id da dataOcorrencia a ser deletada
    var data = {
        id : parentLinha.data('id')
    };

    $.ajax({
        url: '/experiencias/deletedataocorrencia',
        type: 'PUT',
        dataType: 'json',
        data: data,
        complete: function (jqXHR, textStatus) {
            $(ev.target).toggleClass('soft-hide');
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
        },
        success: function (data, textStatus, jqXHR) {
            //deixando vermelho e removendo o elemento
            parentLinha.addClass('bg-danger').fadeOut(400, function() {
                $(this).remove()
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });



};

