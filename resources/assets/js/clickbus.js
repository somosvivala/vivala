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

// Lista as viagens (de ida ou volta)
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

// Envia viagem de ida e volta
// e lista as poltronas
var ajaxTrip = function(viagens) {

    // Pega o valor das cidades escolhidas para exibir na escolha de poltrona
    var from      = $('#origem-rodoviario').val(),
        to        = $('#destino-rodoviario').val();

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner'></i></h1>");

    $.ajax({
        url: 'clickbus/trip',
        type: 'POST',
        deataType: 'html',
         data: {
            schedule: viagens,
            from: from,
            to: to
        }
    })
    .done(function(data) {
        $('#clickbus-resultado-busca').html(data);
        bindaPoltronas();
    })
    .fail(function() {
        $('#clickbus-resultado-busca').html('Ops, algo saiu errado.');
    });
    
};

var ajaxPoltronas = function(request) {
    var params = {
        "from": "",
        "to": "",
        "seat": "",
        "name": "",
        "document": "",
        "documentType": "",
        "gender": "",
        "id": "",
        "date": "",
        "time": "",
        "timezone": "America/Sao_Paulo",
        "sessionId": ""
    };

    $.extend(params, request);

    $.ajax({
        type: 'post',
        url: '/clickbus/selecionarpoltronas',    
        data: {
            params: {
                "meta": {},
                "request": {
                    "from": params.from,
                    "to": params.to,
                    "seat": params.seat,
                    "passenger": {
                        "name": params.name,
                        "document": params.document,
                        "documentType": params.documentType, /*[rg|cpf|passaporte]*/
                        "gender": params.gender              /*[M|F]*/
                    },
                    "schedule": {
                        "id": params.id,
                        "date": params.date,
                        "time": params.time,
                        "timezone": params.timezone
                    },
                    "sessionId": params.sessionId
                }
            }
        },
        success: function (data) {
            // Executa uma função de javascript
            console.log('sucess do ajax poltronas');
            $('#clickbus-resultado-busca').html(data);

            // marca o elemento da poltrona como selecionado (laranja)
            $("input#"+params.seat+"-"+params.tipo).parents('poltrona').addClass("selecionada");

        },
        error: function (data) {
            console.log('erro do ajax poltronas');
            console.log(data);
/*            console.log(data.responseObject);
            //Aqui mostro o sweetAlert com as mensagens retornadas da
            //validação 
            //TODO formatar texto corretamente

            var responseObject = data.responseJSON,
                responseText = "";

                //Iterando sob o objeto de resposta para montar a mensagem de erro 
                for (var i in responseObject)
                    {
                        responseText += "<p>" + responseObject[i] + "</p>";
                    }

                    //removendo o .n  da mensagem de erro
                    responseText = responseText.replace(/.\d /g," ");

                    swal({
                        title: 'Ocorreu um erro', 
                        text: responseText, 
                        type: 'error',
                        html: true
                    });

                    //Se tiver loading e tiver dado erro, voltar botao
                    if (loading && loading != "") {
                        $('#form-poltronas-clickbus').find('input:submit').show();
                        $('#form-poltronas-clickbus').find('#'+loading).hide();
                    }

                    */
        }
    });


};

var removePoltrona = function(request) {
    $params = {
        "seat": "",
        "id": "",
        "sessionId": ""
    }
    $.extend(params, request);

    $.ajax({
        url: 'clickbus/removerpoltronas',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {
                "meta": {},
                "request": {
                    "seat": params.seat,
                    "schedule": {
                        "id": params.id
                    },
                    "sessionId": params.sessionId
                }
            }
        }
    })
    .done(function(data) {
        console.log(data);
    });
};

var tripPayment = function(request) {
    $params = {
        "store": "clickbus",
        "model": "retail",
        "platform": "web",
        "contents": []
    }
    $.extend(params, request);

    $.ajax({
        url: 'clickbus/payment',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {
                "meta": {
                    "store": params.store,
                    "model": params.model,
                    "platform": params.platform
                },
            },
            "contents": params.contents
        },
    })
    .done(function(data) {
        console.log(data);
    });
    
};
