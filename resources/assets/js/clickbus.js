'use strict';

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
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