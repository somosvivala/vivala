/**
 * Funcao para pegar as Cidades que deem match com a query passada
 */
var ajaxCidades = function(query, target) {
    if (ajax != null && ajax.state() == 'pending') {
        ajax.abort();
    }

    var pos = [$(target).position().top + $(target).outerHeight(), $(target).position().left];

    // Mostra o icone de loading
    $(target).siblings('i.fa').toggleClass('soft-hide');
    ajax = $.ajax({
        url: '/busca/autocompletecidades',
        type: 'GET',
        dataType: 'html',
        data: {
            query: query
        },
    })
    .done(function(data) {
        // Remove as lista antiga de cidades
        $(target).siblings('.cidades-list').remove();
        // Cria o div da lista de cidades
        var element = document.createElement('div');
        $(element).addClass('list-group cidades-list')
            .attr('data-target', $(target).prop('id'))
            .css('top', pos[0])
            .css('left', pos[1])
            .html(data);

        // Adiciona a nova lista
        $(target).parent().append(element);

        // Esconde o loading
        $(target).siblings('i.fa').toggleClass('soft-hide');
        bindAutocompleteCidades();
    });
};

// Binda o clique do resultado de autocomplete (quando escolhe a cidade)
var bindAutocompleteCidades = function() {
    $('.cidades-list a').on('mousedown', function(e) {

        e.preventDefault();

        // Pega o id do campo que vai ser modificado, origem ou destino
        var target = $(this).parent('.cidades-list').attr('data-target');

        // Muda o valor do input para a string do resultado (friendly)
        $('#'+target).val($(this).find('span').text());
        // Muda o valor do input hidden para a string da busca (non-friendly)
        $('#'+target+'-hidden').val( $(this).attr('data-value'));

        // Remove os resultados
        $('.cidades-list').remove();
    });
    $('.cidades-list a').on('mouseover', function() {
        $('.cidades-list a.list-focus').removeClass('list-focus');
    });
};

// Shorthand for $( document ).ready()
$(function() {

    var ajax,
        cidadesAutocompleteTimeout,
        origemVal = '';

    $('.autocomplete-cidades-ativo').on('keyup focus', function(e) {
        console.log('pegou tecla');
        if ($(this).val().length >= 3) {
            if ($(this).val() !== origemVal) {
                if (cidadesAutocompleteTimeout!== undefined && cidadesAutocompleteTimeout > 0) {
                    clearTimeout(cidadesAutocompleteTimeout);
                }
                cidadesAutocompleteTimeout = setTimeout(ajaxCidades, 500, origemVal, this);
            }
        } else {
            $('.places-list').remove();
        }
        origemVal = $(this).val();
    });
});



