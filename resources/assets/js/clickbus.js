'use strict';
// Pegando a lingua ativa no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];
switch(linguaAtiva){
  case 'en':
    lingua[0] = 'Ops, something went wrong, do the search again please.',
    lingua[1] = 'Purchase successfully completed. Your travel from ',
    lingua[2] = ' to ',
    lingua[3] = 'is guaranteed. For more questions please contact us by email ',
    lingua[4] = 'Payment data successfully confirmed.',
    lingua[5] = 'Your travel from ',
    lingua[6] = 'We will redirect you to finalize your purchase, if that doesn\'t happen click ',
    lingua[7] = 'here',
    lingua[8] = 'Success'
  break;
  case 'pt':
    lingua[0] = 'Ops, algo saiu errado, por favor faça a busca novamente.',
    lingua[1] = 'Compra realizada com sucesso. Sua viagem de ',
    lingua[2] = ' para ',
    lingua[3] = 'está garantida. Em caso de dúvidas entre em contato pelo email '
    lingua[4] = 'Confirmaço de dados realizada com sucesso.',
    lingua[5] = 'Sua viagem de ',
    lingua[6] = 'Iremos redirecioná-lo para finalizar sua compra, se isso nao acontecer clique ',
    lingua[7] = 'aqui',
    lingua[8] = 'Successo'
  break;
  default:
    lingua[0] = 'Ops, algo saiu errado, por favor faça a busca novamente.',
    lingua[1] = 'Compra realizada com sucesso. Sua viagem de ',
    lingua[2] = ' para ',
    lingua[3] = 'está garantida. Em caso de dúvidas entre em contato pelo email ',
    lingua[4] = 'Confirmaço de dados realizada com sucesso.',
    lingua[5] = 'Sua viagem de ',
    lingua[6] = 'Iremos redirecioná-lo para finalizar sua compra, se isso nao acontecer clique em ',
    lingua[7] = 'aqui',
    lingua[8] = 'Successo'
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
    }
});

var ajax;

// Trata evento de seleção da passagem de ida para alterar o passagem de volta
$('#data-id-rodoviario').datepicker().on('changeDate', function() {
    console.log($('#data-id-rodoviario').datepicker('getDate'));
    $('#data-volta-rodoviario').datepicker('setStartDate',$('#data-id-rodoviario').datepicker('getDate'));
});

// Colore dias anteriores do datepicker na abertura do mesmo
$("#data-id-rodoviario").datepicker().on('focus', function(){
    $('.datepicker table tr td.disabled').addClass('datepicker-dia-anterior');
});
$("#data-volta-rodoviario").datepicker().on('focus', function(){
    $('.datepicker table tr td.disabled').addClass('datepicker-dia-anterior');
});

//aplicando mascara nos campos de date para funcionar melhor com o calendário
$('.mascara-data').mask("00/00/0000");

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

// ClickBus Busca: lista as Viagens (de ida ou volta)
var ajaxTrips = function(params) {
    var defaultParams = {
        from: '',
        to: '',
        departure: '',
        type: 'ida'
    };
    $.extend(defaultParams, params);

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner laranja'></i></h1>");


    $.ajax({
        url: 'clickbus/trips',
        type: 'POST',
        dataType: 'html',
        data: defaultParams,
    })
    .done(function(data) {

        // Try/Catch com o data, json do erroXhtml data dos ônibus
        var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}

        //se tiver dado erro
        if (json.errors) {
            $('#clickbus-resultado-busca').html("");
            swal({
                title: json.errors1,
                html: json.errors2+"<br/><br/>"+json.errors,
                type: "error",
                confirmButtonColor: "#FF5B00",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            },
            function() {
                console.log('clicou botao swal error data:');
                console.log(data);
            });
        //Se estiver tudo ok..
        } else {
            $('#clickbus-resultado-busca').html(data);
            bindClickDetail();
        }
    })
    .fail(function() {
        // [TODO] Ver como tratar esta mensagem para multilinguagem
        $('#clickbus-resultado-busca').html(lingua[0]);
    });

};

// Envia viagem de ida e volta
// e lista as poltronas
var ajaxTrip = function(viagens) {

    // Pega o valor das cidades escolhidas para exibir na escolha de poltrona
    var from      = $('#origem-rodoviario').val(),
        to        = $('#destino-rodoviario').val();

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-spinner laranja'></i></h1>");
    console.log(viagens);

    $.ajax({
        url: 'clickbus/trip',
        type: 'POST',
        dataType: 'html',
         data: {
            schedule: viagens,
            from: from,
            to: to
        }
    })
    .done(function(data) {

        var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}

        //se tiver dado erro
        if (json.errors) {
            $('#clickbus-resultado-busca').html("");
            swal({
                title: json.errors1,
                html: json.errors4+"<br/><br/>"+json.errors,
                type: "error",
                confirmButtonColor: "#FF5B00",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            },
            function() {
                console.log('clicou botao swal error data:');
                console.log(data);
            });
        //Se estiver tudo ok..
        } else {

            //pegando view retornada e settando o sessionId
            $('#clickbus-resultado-busca').html(json.view);

            //settando o valor do input hidden com o valor
            //do sessionID retornado pelo /trip
            $('input#session-clickbus').val(json.sessionId);
            bindaPoltronas();

           //// TODO: conseguir recuperar o mesmo sessionId retornado pelo /trip
           //console.log('disparando trigger de refresh de sessionId');
           ////startando o tratamento de refresh da sessao
           //setTimeout(function() {
           //    console.log('15 minutos passaram, renovando sessionId...');
           //    console.log('current value: ' + $('input#session-clickbus').val());
           //    sessionManutencao();
           //}, 60000);

        }
    })
    .fail(function() {
        // [TODO] Ver como tratar esta mensagem para multilinguagem
        $('#clickbus-resultado-busca').html(lingua[0]);
    });

};

var ajaxPoltronas = function(request, callback) {
    var params = {
        "from": "",
        "to": "",
        "seat": "",
        "name": "",
        "document": "",
        "documentType": "",
        "birthday": "",
        "email": "",
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
                        "gender": params.gender,              /*[M|F]*/
                        "birthday": params.birthday,
                        "email": params.email
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
           callback(data);
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
        },
        complete: function(data, status) {
            $('form.validacao-poltrona').find('button:submit').removeAttr('disabled');
            $('form.validacao-poltrona button:submit i').hide();

        }
    });


};

var removePoltrona = function(request, tipo, callback) {
    var params = {
        "seat": "",
        "id": $("input#"+tipo+"-id").val(),
        "sessionId": $("input#"+tipo+"-session-id").val()
    }

    $.extend(params, request);

    // Loading no x da poltrona
    var icone_remover = $("#poltrona-"+request.seat+"-"+tipo+" i.exclui-poltrona");
    icone_remover.removeClass("fa-close").addClass("fa-spinner fa-spin laranja");

    $.ajax({
        url: 'clickbus/removerpoltronas',
        type: 'post',
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
        callback(data, params.seat, tipo);
    });
};

//Funcao chamada no submit do formulario de poltronas
var tripPayment = function(request, frm) {
    var params = {
        "store": "Vivala",
        "model": "Retail",
        "platform": "API"
    };

    //pegando objeto pelo form
    var frmObj = {};
    $.each(frm.serializeArray(), function() {
        if (frmObj[this.name] !== undefined) {
            if (!frmObj[this.name].push) {
                frmObj[this.name] = [frmObj[this.name]];
            }
            frmObj[this.name].push(this.value || '');
        } else {
            frmObj[this.name] = this.value || '';
        }
    });

    $.extend(params, request);

    $.ajax({
        url: 'clickbus/payment',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {
                "frm" : frmObj,
                "meta": {
                    "store": params.store,
                    "model": params.model,
                    "platform": params.platform
                },
            },
            "contents": params.contents
        }
    })
    .error(function(json) {

        /*var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}*/

        swal({
            title: json.errors1,
            html: json.errors5+"<br/><br/>"+json.errors,
            type: "error",
            confirmButtonColor: "#FF5B00",
            confirmButtonText: "OK",
            closeOnConfirm: true,
        },
        function() {
        });
    })
    .done(function(json) {
        // Try/Catch com o data, json do erroXhtml data dos ônibus
        /*var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}*/

        //se tiver dado erro
        if (json.errors) {
            swal({
                title: json.errors1,
                html: json.errors6+"<br/<br/>"+json.errors,
                type: "error",
                confirmButtonColor: "#FF5B00",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            },
            function() {
            });
        //Se estiver tudo ok.
        } else {
            $('#clickbus-resultado-busca').html(json.html);
            setSessionId(json.session);
            bindaAbas();
            bindaBandeirasCartao();
            bindaChangePagamento();
            bindaFormPagamento();
            atualizaValorParcelas();
        }
    });

};

var tripBooking = function(request) {

    var params = {
        "meta": {
            "store": "Vivala",
            "model": "Retail",
            "platform": "API",
            "api_key": "$2y$05$32207918184a424e2c8ccujmuryCN3y0j28kj0io2anhvd50ryln6"
        },
        "request": {
            "sessionId": getSessionId(),
            "ip": "",
            "buyer": {
                "locale": "pt_BR",
                "gender": "M",
                "meta": {},
                "payment": {
                }
            },
            "orderItems": [
            ]
        }
    };

    $.extend(params, request);

    $.ajax({
        url: 'clickbus/booking',
        type: 'POST',
        dataType: 'html',
        data: {
            params: params
        }
    })
    .error(function(data) {

        var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}

        swal({
            title: json.errors1,
            html: json.errors7+"<br/><br/>"+json.errors,
            type: "error",
            confirmButtonColor: "#F16F2B",
            confirmButtonText: "OK",
            closeOnConfirm: true,
            },
            function() {
                console.log(data);
            });
    })
    .done(function(data) {

        var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}

        //se tiver dado erro
        if (json.errors) {
            swal({
                title: json.errors1,
                html: json.errors7+"<br/><br/>"+json.errors,
                type: "error",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            },
            function() {
                console.log('clicou botao swal error data:');
                console.log(data);
            });

        //Se estiver tudo ok..
        } else {

            if (json.forma_pagamento == 'payment.creditcard') {

                var htmlMsg = lingua[1]+'<h4>'+ json.ida_departure + '</h4>'+lingua[2]+'<h4>'+json.ida_arrival+'</h4><br/>'+lingua[3]+'<a href="mailto:sac@vivalabrasil.com.br">sac@vivalabrasil.com.br</a>';

                swal({
                    title: lingua[8],
                    html: htmlMsg,
                    type: "success",
                    confirmButtonColor: "#14CC5B",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                },
                 function() {
                   //window.location.href="/viajar";
                }
                );
                $('#clickbus-resultado-busca').html(json.view);

            //Se nao for creditcard, entao possui um redirectUrl
            } else {

                setTimeout(function() {
                    window.open(json.redirectUrl,'_blank');
                }, 2200);

                //Caso a forma de pagamento requira redirecionamento
                var htmlMsg = lingua[4]+'<br>'+lingua[5]+'<h4>'+ json.ida_departure + '</h4>'+lingua[2]+'<h4>'+json.ida_arrival+'</h4><br/>'+lingua[6]+'<a href="'+json.redirectUrl+'" target="_blank">'+lingua[7]+'</a>.';

                swal({
                    title: lingua[8],
                    html: htmlMsg,
                    type: "success",
                    confirmButtonColor: "#14CC5B",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                },
                function() {
                  //window.location.href="/viajar";
                }
                );
               $('#clickbus-resultado-busca').html(json.view);
            }
        }

    });
}

//Funcao para recuperar a sessionId do lado do cliente.
//Executa uma XMLHttpRequest para o /session resource na clickbus.
//@TODO usando o sessionID retornado nao é possivel continuar uma compra
var sessionManutencao = function() {

    var currentSessionId = $('input#session-clickbus');

    //so disparar essa request se estiver atualmente mexendo na clickbus
    if (currentSessionId.length) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://api-evaluation.clickbus.com.br/api/v1/session");
        xhr.setRequestHeader("Content-Type", "application/json");

        //Acho que isso nao funciona porque CORS nao esta permitido pelo server.
        //xhr.setRequestHeader("Cookie", "PHPSESSID="+currentSessionId);

        //Com só essa flag ativada, o PHPSESSID é enviado, mas aparentemente ele
        //sempre abre uma nova sessao. perdendo os dados da sessao atual.
        //xhr.withCredentials =  true;
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 201) {
                var data = JSON.parse(xhr.responseText);
                setSession(data);
            }
        };

        xhr.send('');
    }
}

var setSession = function(data) {

    var currentSessionId = getSessionId();
    console.log('============ chegou setSession new value:' + data.content);
    console.log('currentSessionId: ' + currentSessionId);

    //settando o novo sessionId
    setSessionId(data.content);

    setTimeout(function() {
        console.log('1 minuto passou, renovando sessionId...');
        console.log('current value: ' + $('input#session-clickbus').val());
        sessionManutencao();
    }, 60000);


}

var getSessionId = function() {
    return $('input#session-clickbus').val();

}

var setSessionId = function(sessionID) {
    $('input#session-clickbus').val(sessionID);
}

var getExtraInfoParaCheckout = function() {
    var obj = {
        "total" : Number($('.valor-total').html().replace('.', '').replace(',','.')),
        "desconto" : Number($('.valor-desconto').html().replace('.', '').replace(',','.')),
        "taxas" : Number($('.valor-fee').html().replace('.', '').replace(',','.')),
        "ida-from" : $("#ida-from").val(),
        "ida-company-id" : $('#ida-company-id').val(),
        "volta-company-id" : $('#volta-company-id').val()
    };
    return obj;
}
