'use strict';

$.ajaxSetup({
    headers: { 
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajaxPlace = function(query) {
    $.ajax({
        url: 'clickbus/place',
        type: 'POST',
        dataType: 'json',
        data: {query: query},
    })
    .done(function(data) {
        console.log(data);
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
        dataType: 'json',
        data: defaultParams,
    })
    .done(function(data) {
        console.log(data);
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