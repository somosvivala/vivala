'use strict';

jQuery(document).ready(function($) {
    var ajax;

    $('#rodoviario-filtros #origem-rodoviario').on('keydown focus', function() {
        if ($(this).val().length >= 2) {
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
            departure = $('#data-id-rodoviario').val();

        ajaxTrips({
            from: from,
            to: to,
            departure: departure
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