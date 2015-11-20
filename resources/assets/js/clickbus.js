'use strict';

$.ajaxSetup({
    headers: { 
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajax;

// Procura Cidades que tem frota da clickbus
var ajaxPlace = function(query, target) {
    if (ajax != null && ajax.state() == 'pending') {
        ajax.abort();
    }

    var pos = [$(target).position().top + $(target).outerHeight(), $(target).position().left];

    // Mostra o icone de loading
    $(target).siblings('i.fa').show();
    ajax = $.ajax({
        url: 'clickbus/place',
        type: 'POST',
        dataType: 'html',
        data: {
            query: query
        },
    })
    .done(function(data) {
        // Remove as lista antiga de cidades
        $(target).siblings('.places-list').remove();
        // Cria o div da lista de cidades
        var element = document.createElement('div');
        $(element).addClass('list-group places-list')
            .attr('data-target', $(target).prop('id'))
            .css('top', pos[0])
            .css('left', pos[1])
            .html(data);

        // Adiciona a nova lista
        $(target).parent().append(element);
        
        // Esconde o loading
        $(target).siblings('i.fa').hide();


        bindAutocompleteRodoviario();
    });
};

var ajaxTrips = function(params) {
    var defaultParams = {
        from: '',
        to: '',
        departure: '',
        type: 'ida'
    };
    $.extend(defaultParams, params);

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner'></i></h1>");
    
    $.ajax({
        url: 'clickbus/trips',
        type: 'POST',
        dataType: 'html',
        data: defaultParams,
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        bindClickDetail();
    })
    .fail(function() {
        $('#clickbus-resultado-busca').html('Ops, algo saiu errado, faça a busca novamente');
    });
    
};

var ajaxTrip = function(id) {

    // Pega o valor das cidades escolhidas para exibir na escolha de poltrona
    var from      = $('#origem-rodoviario').val(),
        to        = $('#destino-rodoviario').val();

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner'></i></h1>");

    $.ajax({
        url: 'clickbus/trip',
        type: 'POST',
        dataType: 'html',
        data: {
            scheduleId: id,
            from: from,
            to: to
        }
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        bindaPoltronas();
        ajaxPoltronas();
    })
    .fail(function() {
        $('#clickbus-resultado-busca').html('Ops, algo saiu errado.');
    });
    
};

var ajaxPoltronas = function() {
    
    /** Funcões para Upload */
    $('#form-poltronas-clickbus').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this),
            dataForm = new FormData(this),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('input:submit').hide();
            $(this).find('#'+loading).show();
        }

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),    
            data: dataForm,
            contentType: false, //file
            processData: false,  //file
            success: function (data) {
                // Executa uma função de javascript
                console.log('sucess do ajax poltronas');
                console.log(data);
            },
            error: function (data) {
                console.log('erro do ajax poltronas');
                console.log(data);
                //Se tiver loading e tiver dado erro, voltar botao
                if (loading && loading != "") {
                    $('#form-poltronas-clickbus').find('input:submit').show();
                    $('#form-poltronas-clickbus').find('#'+loading).hide();
                }

            }
        });
    });



}

