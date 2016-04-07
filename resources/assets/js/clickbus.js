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
    //console.log($('#data-id-rodoviario').datepicker('getDate'));
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
                //console.log('clicou botao swal error data:');
                //console.log(data);
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
    //console.log(viagens);

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
                //console.log('clicou botao swal error data:');
                //console.log(data);
            });
        //Se estiver tudo ok..
        } else {

            //pegando view retornada e settando o sessionId
            $('#clickbus-resultado-busca').html(json.view);

            //settando o valor do input hidden com o valor
            //do sessionID retornado pelo /trip
            $('input#session-clickbus').val(json.sessionId);
            bindaPoltronas();

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
            //console.log('erro do ajax poltronas');
            //console.log(data);
/*            //console.log(data.responseObject);
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
console.log("================== INSIDE tripBooking()");
console.log(request);

    var params = {
        "meta": {
            "store": "Vivala",
            "model": "Retail",
            "platform": "API",
            "api_key": ""
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
                //console.log(data);
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
                //console.log('clicou botao swal error data:');
                //console.log(data);
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
        "ida-slug" : $("#origem-rodoviario-hidden").val(),
        "ida-company-id" : $('#ida-company-id').val(),
        "volta-company-id" : $('#volta-company-id').val()
    };
    return obj;
}

var getObjetoClickBusPayment = function() {
    console.log("============= INSIDE getObjetoClickBusPayment() ");

    var clickbus = null;

    var docNumberID = $('#tabs-pagamento-cliente > div.tab-pane.active.in').find('input#documento-pf').attr('id');

    // Here you can find a list of mapped fields for each parameter.
    clickbus = new ClickBusPayments({
        paymentFormId: 'form-pagamento',
        creditcardFieldId: 'num-cartao-credito',
        securityCodeFieldId: 'cod-seguranca-credito',
        expirationMonthFieldId: 'mes-validade-credito',
        expirationYearFieldId: 'ano-validade-credito',
        holderNameFieldId: 'nome-titular-credito',
        docTypeFieldId: 'document-type-mp',
        docNumberFieldId: 'documento-pf',
        amountFieldId: 'valor-total-pagamento-passagem',
        test: true
    });
    console.log('clickbusPayment obj ->');
    console.log(clickbus);
    return clickbus;
}

var generateMercadoPagoToken = function(params) {

    console.log("============= INSIDE generateMercadoPagoToken() ");
    //pegando onjeto clickBusPayment já mapeado para os inputs
    var clickbus = getObjetoClickBusPayment();

    setTimeout(function() {
        clickbus.generateToken().success(function(response) {
                console.log("============= INSIDE generateToken Callback");
                //apos gerar o token, inseri-lo na request e enviar para o /booking
                $('#mp-token').val(response.token);
                console.log('response:'); console.log(response);
                params.request.buyer.payment.meta.token = response.token;
                tripBooking(params);

                //se falhar mostrar sweetalert
            }).fail(function(errors) {
                for (var error in errors) {
                    console.log(errors[error].code);
                    console.log(errors[error].description);
                }
            }).call();
    }, 2000);
}

//Monta o paymentObj seguindo o formato necessario
//para utilizar do MercadoPago
var getPaymentParaMercadoPago = function(frm, total, cardBrand) {
    var payment = {
        "method": "creditcard",
        "currency": "BRL",
        "total": Number(total),
        "installment": frm.find("input#qtd-parcelas").val(),
        "meta": {
            "token": '',
            "card_brand": cardBrand,
            "zipcode": frm.find("input[name='cep-titular-credito']").val()
        }
    };
    return payment;
};
