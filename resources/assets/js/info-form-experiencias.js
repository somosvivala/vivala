// Shorthand for $( document ).ready()
$(function() {

    bindaIconeInformacaoExperiencia();

});

/**
 * Binda a mudanca do icone conforme o texto dos input's de informacao experiencia
 */
var bindaIconeInformacaoExperiencia = function() {
        $('.bind-icone-ativo').on('keyup', function(event) {
            var icone = $(event.target).parents('.info-experiencia-item').find('i.icone-show');

            //pegando as possiveis classes que o icone tenha alem do font-awesome
            var classesIcone = icone.attr('class').replace(/fa-[a-z]*/g, '').replace(/fa /g, '');

            icone.attr('class', classesIcone + " " + $(event.target).val());
        });
};


/**
 * Funcao para adicionar uma nova linha de InformacaoExperiencia
 * no formulario de create/edit de experiencias
 */
var adicionaInfoExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.info-experiencia-item');

    //clonando a li hidden que serve de modelo
    var novaLinha = $('.info-experiencia-item.hidden.modelo-input').clone();

    //inserindo antes da linha do botao add
    novaLinha.insertBefore(parentLinha).toggleClass('hidden').toggleClass('modelo-input');

    //chamando funcao para bindar a mudanca de icone conforme o texto do botao
    bindaIconeInformacaoExperiencia();
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

