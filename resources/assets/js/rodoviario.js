'use strict';

jQuery(document).ready(function($) {
    var ajax;

    $('#rodoviario-filtros #origem-rodoviario').on('keydown focus', function() {
        if ($(this).val().length >= 2) {
            // vale a pena fazer o timeout aqui? (copiado do viajar.js)
            // autocompleteTimeout = setTimeout(autocompleteFlights, 500, value, '#origem-voo', container, lista); 
            ajaxPlace($(this).val(), this);
        }
    });
    $('#rodoviario-filtros #destino-rodoviario').on('keydown focus', function() {
        if ($(this).val().length >= 2) {
            ajaxPlace($(this).val(), this);
        }
    });

    $('#rodoviario-filtros #origem-rodoviario, #rodoviario-filtros #destino-rodoviario')
        .on('blur', function() {
            setTimeout(function() {
                $('.places-list').remove();
            }, 100);
    });

    $('#buscar-rodoviario .btn').on('click', function(e) {
        e.preventDefault();

        var from      = $('#origem-rodoviario-hidden').val(),
            to        = $('#destino-rodoviario-hidden').val(),
            departure = $('#data-id-rodoviario').val(),
            type      = 'ida';

        $('#clickbus-resultado-busca').html("<h1 style='text-align-center'><i class='fa fa-spin fa-spinner'></i></h1>");

        ajaxTrips({
            from: from,
            to: to,
            departure: departure,
            type: type
        })
    });
});

// Binda o clique do resultado de autocomplete (quando escolhe a cidade)
var bindAutocompleteRodoviario = function() {
    $('.places-list a').on('click', function(e) {
        e.preventDefault();

        // Pega o id do campo que vai ser modificado, origem ou destino
        var target = $(this).parent('.places-list').attr('data-target');

        // Muda o valor do input para a string do resultado (friendly)
        $('#'+target).val($(this).find('span').text());
        // Muda o valor do input hidden para a string da busca (non-friendly)
        $('#'+target+'-hidden').val( $(this).attr('data-value'));

        // Remove os resultados
        $('.places-list').remove();
    });
};

var bindClickDetail = function() {
    $('.search-by-date').on('click', function(e) {
        e.preventDefault();

        var from      = $('#destino-rodoviario-hidden').val(),
            to        = $('#origem-rodoviario-hidden').val(),
            departure = $(this).attr('data-date'),
            type      = $(this).attr('data-type');

        ajaxTrips({
            from: from,
            to: to,
            departure: departure,
            type: type
        });
    });

    $('.btn-choose-ida').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        $('#departure-schedule-id').val(id);

        if ($('#data-volta-rodoviario').val().length <= 0) {
            ajaxTrip([id]);
        } else {
            var from      = $('#destino-rodoviario-hidden').val(),
                to        = $('#origem-rodoviario-hidden').val(),
                departure = $('#data-volta-rodoviario').val(),
                type      = 'volta';

            ajaxTrips({
                from: from,
                to: to,
                departure: departure,
                type: type
            });
        }
    });

    $('.btn-choose-volta').on('click', function(e) {
        e.preventDefault();

        var ida = $('#departure-schedule-id').val(),
            id = $(this).attr('data-id');

        ajaxTrip([ida, id]);
    });
};
