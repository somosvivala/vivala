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

        var from      = $('#origem-rodoviario').attr('data-value'),
            to        = $('#destino-rodoviario').attr('data-value'),
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

var bindAutocompleteRodoviario = function() {
    $('.places-list a').on('click', function(e) {
        e.preventDefault();

        var target = $(this).parent('.places-list').attr('data-target');

        $('#'+target).val($(this).find('span').text());
        $('#'+target).attr('data-value', $(this).attr('data-value'));
        $('.places-list').remove();
    });
};

var bindClickDetail = function() {
    $('.search-by-date').on('click', function(e) {
        e.preventDefault();

        var from      = $('#destino-rodoviario').attr('data-value'),
            to        = $('#origem-rodoviario').attr('data-value'),
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
            var from      = $('#destino-rodoviario').attr('data-value'),
                to        = $('#origem-rodoviario').attr('data-value'),
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
