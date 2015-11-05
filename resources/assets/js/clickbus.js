'use strict';

$.ajaxSetup({
    headers: { 
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajax;

var ajaxPlace = function(query, target) {
    if (ajax != null && ajax.state() == 'pending') {
        ajax.abort();
    }

    var pos = [$(target).position().top + $(target).outerHeight(), $(target).position().left];
    console.log(pos);

    ajax = $.ajax({
        url: 'clickbus/place',
        type: 'POST',
        dataType: 'html',
        data: {
            query: query
        },
    })
    .done(function(data) {
        var element = document.createElement('div');
        $(element).addClass('list-group places-list')
            .attr('data-target', $(target).prop('id'))
            .css('top', pos[0])
            .css('left', pos[1])
            .html(data);

        $(target).parents('.row').find('.places-list').remove();
        $(target).parents('.row').append(element);

        bindAutocompleteRodoviario();
    });
};

var ajaxTrips = function(params) {
    var defaultParams = {
        from: '',
        to: '',
        departure: ''
    };
    $.extend(defaultParams, params);

    $.ajax({
        url: 'clickbus/trips',
        type: 'POST',
        dataType: 'html',
        data: defaultParams,
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
    });
    
};

var ajaxTrip = function(id) {
    $.ajax({
        url: 'clickbus/trip',
        type: 'POST',
        dataType: 'json',
        data: {scheduleId: id},
    })
    .done(function(data) {
        console.log(data);
    });
    
};