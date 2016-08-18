//variavel para controlar o timeout
var tempoDigitando = null;

// Shorthand for $( document ).ready()
$(function() {
    bindaIconPickerFontAwesome('.icone-show');
    bindaMascaraValorExperiencia();
});

/**
 * Binda a mudanca do icone conforme o icone selecionado na modal iconpicker
 */
var bindaIconPickerFontAwesome = function(container, input) {
  var fontAwesomeIcon, classesIcone;

  if($('#modal-iconpicker-fontawesome')){
    $('.iconpicker-icone').click(function() {

      // Pegando o valor do data-icon do icone clicado
      //console.log($(this).parent().data('icon'));

      // Adicionando ele no hidden input
      $('#icone-categoria-experiencia').val('fa fa-' + $(this).parent().data('icon'));

      // Adicionando ele no modal, alterando visualmente
      fontAwesomeIcon = 'icone-show margin-t-1 fa-5x fa fa-' + $(this).parent().data('icon');
      classesIcone = $(container).attr('class').replace(/fa\s*/g, '').replace(/fa-\w*-*\w*-*\w*/g, '');
      $(container).attr('class', fontAwesomeIcon);

      // Dá toggle e fecha a modal de iconpicker de seleção do icone
      $('#modal-iconpicker-fontawesome').modal('toggle');
    });
  }
}

/**
* Funcao para adicionar uma nova linha de InformacaoExperiencia
* no formulario de create/edit de experiencias
*/
var adicionaInfoExperiencia = function(ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos inserir antes (<li> que contem o botao add)
    var parentLinha = $(ev.target).parents('.container-campos-fontawesome');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    $.ajax({
        url: '/experiencias/addinformacaoextra',
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

            //chamando funcao para bindar a mudanca de icone conforme o texto do botao
            bindaInputsFontAwesome();

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

    //pegando a linha da ul que devemos remover
    var parentLinha = $(ev.target).parents('.container-campos-fontawesome');

    $(ev.target).toggleClass('soft-hide');
    parentLinha.find('i.loading-icon').toggleClass('soft-hide');

    var data = {
        id : parentLinha.data('id')
    };

    $.ajax({
        url: '/experiencias/deleteinformacaoextra',
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

/**
* Funcao para aplicar a mascara no campo VALOR do
* formulario de create/edit de experiencias.
*/
var bindaMascaraValorExperiencia = function(){
  $('#experiencia-valor').maskMoney();
}

/*
* Funcao para atualizar o contador de caracteres
* @var maxlength = valor da maxlength da textarea
* @var textContainer = textarea (container) de onde contarei os caracteres
* @var msgContainer = container a onde vou reproduzir o texto de contagem,
* use geralmente um span abaixo da caixa de texto
*/
function atualizaContador(maxlength, textContainer, msgContainer) {
    var faltando = maxlength - jQuery(textContainer).val().length,
        cor = '#000',
        corpositiva = '#21A393',
        cormedia = '#FAA324',
        coralerta = '#CA161E';

    if(faltando > Math.trunc(maxlength/2)) cor = corpositiva;
    else if((faltando <= Math.trunc(maxlength/2)) && (faltando > Math.trunc(maxlength/4))) cor = cormedia;
    else if(faltando <= Math.trunc(maxlength/4)) cor = coralerta;

    jQuery(msgContainer).css('color', cor);
    jQuery(msgContainer).text('Falta(m) ' + faltando + ' caractere(s).');
}

/*
* Funcao para contar o limite de caracteres da Descrição na Listagem
* da Experiencia
*/
function contadorDescListagem(ev){
  ev.preventDefault();

  var textContainer = $('#experiencia-descricao-listagem'),
      maxlength = textContainer.attr('maxlength'),
      msgContainer = $('#experiencia-contador-descricao-listagem');

  atualizaContador(maxlength, textContainer, msgContainer);
}

/*
* Funcao para contar o limite de caracteres da Descrição Completa
* da Experiencia
*/
function contadorDescCheia(ev){
  ev.preventDefault();

  var textContainer = $('#experiencia-descricao-cheia'),
      maxlength = textContainer.attr('maxlength'),
      msgContainer = $('#experiencia-contador-descricao-cheia');

  atualizaContador(maxlength, textContainer, msgContainer);
}


/**
 * Funcao para bindar o campo tipo da experiencia no formulario
 */
var mostraCamposPorTipo = function(el) {
    var tipo = $(el).val();

    //escondendo as outras divs e dando disable nos inputs que podem estar lá por garantia
    $('.toggle-tipo-experiencia').hide();
    $('.toggle-tipo-experiencia input').attr('disabled','true');

    //mostrando a div do tipo certo e habilitando seus campos caso estejam desabilitados
    $('#campos_'+tipo+' input').removeAttr('disabled');
    $('#campos_'+tipo).show();
};

//Chamando a funcao para atualizar as divs conforme o tipo no ready
$(function () {
    var tipoExp = $("input[name='tipo']:checked");
    mostraCamposPorTipo(tipoExp);
});
