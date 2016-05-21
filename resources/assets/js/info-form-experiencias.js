//variavel para controlar o timeout
var tempoDigitando = null;

// Shorthand for $( document ).ready()
$(function() {

    bindaIconeInformacaoExperiencia();

});

/**
 * Binda a mudanca do icone conforme o texto dos input's de informacao experiencia
 */
var bindaIconeInformacaoExperiencia = function() {
    $('.bind-icone-ativo').on('keyup', function(event) {
        //limpando timeout para apenas testar quando o usuario tiver terminado de digitar
        clearTimeout(tempoDigitando);

        //console.log('inside bindaIcone: event : ');
        //console.log(event);
        tempoDigitando = setTimeout(function() {
            testaRegexTrocaClassesFontAwesome(event.target);
        }, 300);
    });
};


var testaRegexTrocaClassesFontAwesome = function(target) {

    //console.log('inside testaRegex: target : ');
    //console.log(target);
    //guardando matches da regex procurando por 'fa fa-*'
    var regMatches = [];
    regMatches[0] = $(target).val().match(/(fa\s*)fa/);
    regMatches[1] = $(target).val().match(/fa-\w*/g);

    //console.log(regMatches);

    //Se tiver encontrado os matches para 1 icone do font-awesome
    if (regMatches[0] && regMatches[1]) {
       // console.log(regMatches[0][1] + regMatches[1].join(' '));

        //pegando novas classes para o icone
        var novasClasses = regMatches[0][1] + regMatches[1].join(' ');
        //console.log('novas classes font-awesome: ' + novasClasses);

        //pegando as possiveis classes que o icone tenha alem do font-awesome (regex poderia ser melhorado)
        var icone = $(target).parents('.info-experiencia-item').find('i.icone-show');
        var classesIcone = icone.attr('class').replace(/fa\s*/g, '').replace(/fa-\w*/g, '');

        //console.log('classes do icone: ' + classesIcone);
        //settando as novas classes do icone
        icone.attr('class', classesIcone + " " + novasClasses);
    }

}



/**
 * Funcao para adicionar uma nova linha de InformacaoExperiencia
 * no formulario de create/edit de experiencias
 */
var adicionaInfoExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.info-experiencia-item');

    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    $.ajax({
        url: '/experiencias/addinformacaoextra',
        type: 'GET',
        complete: function (jqXHR, textStatus) {
            parentLinha.find('i.loading-icon').toggleClass('soft-hide');
            //console.log('ajax completed');
        },
        success: function (data, textStatus, jqXHR) {
            //console.log('ajax success');
            var novaLinha = $(data.html);

            //inserindo antes da linha do botao add
            novaLinha.insertBefore(parentLinha);

            //chamando funcao para bindar a mudanca de icone conforme o texto do botao
            bindaIconeInformacaoExperiencia();

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
var removeInfoExperiencia = function(ev) {

    ev.preventDefault();

    var linha = $(ev.target).parents('.info-experiencia-item');
    linha.addClass('bg-danger').fadeOut(400, function() {
        $(this).remove()
    });

};

