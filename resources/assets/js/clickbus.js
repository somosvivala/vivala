'use strict';

//guardando instancia global do obj que gera o token do Mercado Pago
var clickBusPaymentObj = null;
var idCampoDocumentoMP = null;

//mapeando erros do mercado pago para serem usados na validação
var mercadoPagoErros = {
    "205" : "Digite o seu número de cartão.",
    "208" : "Escolha um mês.",
    "209" : "Escolha um ano.",
    "212" : "Insira o seu documento.",
    "213" : "Insira o seu documento.",
    "214" : "Insira o seu documento.",
    "220" : "Digite o seu banco emissor.",
    "221" : "Insira o nome e o sobrenome.",
    "224" : "Digite o código de segurança.",
    "E301" : "Há algo errado com este número. Volte a digitá-lo.",
    "E302" : "Revise o código de segurança.",
    "316" : "Insira um nome válido.",
    "322" : "Revise o seu documento.",
    "323" : "Revise o seu documento.",
    "324" : "Revise o seu documento.",
    "325" : "Revise a data.",
    "326" : "Revise a data."
};

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
    $(target).siblings('i.fa').toggleClass('soft-hide');
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
        $(target).siblings('i.fa').toggleClass('soft-hide');
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
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-pulse fa-spinner laranja'></i></h1>");


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
                html: "<br><p>"+json.errors2+"</p><p>"+json.errors+"</p>",
                type: 'error',
                confirmButtonColor: corVermelhoPrimario,
                confirmButtonText: 'OK',
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
        $('#clickbus-resultado-busca').html(lingua[28]);
    });

};

// Envia viagem de ida e volta
// e lista as poltronas
var ajaxTrip = function(viagens) {

    // Pega o valor das cidades escolhidas para exibir na escolha de poltrona
    var from      = $('#origem-rodoviario').val(),
        to        = $('#destino-rodoviario').val();

    // Mostra icone de loading
    $('#clickbus-resultado-busca').html("<h1 style='text-align:center'><i class='fa fa-spin fa-pulse fa-spinner laranja'></i></h1>");
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
                html: "<br><p>"+json.errors4+"</p><p>"+json.errors+"</p>",
                type: 'error',
                confirmButtonColor: corVermelhoPrimario,
                confirmButtonText: 'OK',
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
        $('#clickbus-resultado-busca').html(lingua[28]);
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
            //voltando a a class soft-hide para o icone que estiver ativo
            $('form.validacao-poltrona button:submit i:not(.soft-hide)').toggleClass('soft-hide');
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
            html: "<br><p>"+json.errors5+"</p><p>"+json.errors+"</p>",
            type: 'error',
            confirmButtonColor: corVermelhoPrimario,
            confirmButtonText: 'OK',
            closeOnConfirm: true,
        },
        function() {
        });
    })
    .done(function(json) {
        if(json.errors){
          swal({
              title: json.errors1,
              html: "<br><p>"+json.errors6+"</p><p>"+json.errors+"</p>",
              type: 'error',
              confirmButtonColor: corVermelhoPrimario,
              confirmButtonText: 'OK',
              closeOnConfirm: true,
          });
        //Se estiver tudo ok.
        } else {
            $('#clickbus-resultado-busca').html(json.html);
            setSessionId(json.session);
            bindaAbas();
            bindaBandeirasCartao();
            bindaChangePagamento();
            bindaFormPagamento();
            bindaCartaoAmex();
            atualizaValorParcelas();
            atualizaCamposDocumento();
            setupClickBusPayment();
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
            html: "<br><p>"+json.errors7+"</p><p>"+json.errors+"</p>",
            type: 'error',
            confirmButtonColor: corVermelhoPrimario,
            confirmButtonText: 'OK',
            closeOnConfirm: true,
        });
    })
    .done(function(data) {

        var json= {};
        try {
            json = JSON.parse(data);
        } catch(error) {}

        //se tiver dado erro
        if(json.errors){
          swal({
              title: json.errors1,
              html: "<br><p>"+json.errors7+"</p><p>"+json.errors+"</p>",
              type: 'error',
              confirmButtonColor: corVermelhoPrimario,
              confirmButtonText: 'OK',
              closeOnConfirm: true,
          });
        //Se estiver tudo ok..
        } else {

            //Se o pagamento foi feito por cartao de debito, entao tenho que
            //abrir uma nova aba para continuar o pagamento
            if (json.forma_pagamento == 'payment.debitcard') {
                setTimeout(function() {
                    window.open(json.redirectUrl,'_blank');
                }, 800);
            }

            //mostrando view de sucesso
            $('#clickbus-resultado-busca').html(json.view);

            //substituindo sweetalert de loading pela de sucesso com timer
            swal({
                html: '<h4>'+lingua[36]+'!</h4>',
                type: 'success',
                showCancelButton: false,
                width:240,
                confirmButtonClass: 'hide',
                timer: 1100,
            });

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
        "volta-company-id" : $('#volta-company-id').val(),
        "tipo_documento" : $('#valor-documento-type-mp').val(),
        "nome_fantasia" : $("input[name='nome-fantasia-pj']").val(),
        "razao_social" : $("input[name='razao-social-pj']").val()
    };
    return obj;
}

//instancia o obj da clickbus que ira gerar o token do mercado pago
var setupClickBusPayment = function() {
    console.log("============= INSIDE setupClickBusPayment() ");

    var docNumberID = $('#tabs-pagamento-cliente > div.tab-pane.active.in').find('input#documento-pf').attr('id');

    // Here you can find a list of mapped fields for each parameter.
    clickBusPaymentObj = new ClickBusPayments({
        paymentFormId: 'form-pagamento',
        creditcardFieldId: 'num-cartao-credito',
        securityCodeFieldId: 'cod-seguranca-credito',
        expirationMonthFieldId: 'mes-validade-credito',
        expirationYearFieldId: 'ano-validade-credito',
        holderNameFieldId: 'nome-titular-credito',
        docTypeFieldId: 'valor-documento-type-mp',
        docNumberFieldId: 'valor-documento-mp',
        amountFieldId: 'valor-total-pagamento-passagem',
        test: false
    });

    console.log('clickBusPaymentObj ->');
    console.log(clickBusPaymentObj);
}

//gera o token do mercado pago
var generateMercadoPagoToken = function(params) {
    console.log("============= INSIDE generateMercadoPagoToken() ");

    clickBusPaymentObj.generateToken().success(function(response) {
            console.log("============= INSIDE generateToken Callback");

            //apos gerar o token, inseri-lo na request e enviar para o /booking
            console.log('response:'); console.log(response);
            params.request.buyer.payment.meta.token = response.token;
            params.request.buyer.payment.installment = Number(params.request.buyer.payment.installment);

            params.request.buyer.payment.meta.card_brand = response.payment_method;
            tripBooking(params);

            //se falhar mostrar sweetalert
        }).fail(function(errors) {
            console.log("============== deu ruim no generateToken");
            console.log(errors);
            swal({
                title: lingua[26],
                html: "<br><p>"+getMensagemErroMercadoPago(errors[0].code)+"</p><br>",
                type: 'error',
                confirmButtonColor: corVermelhoPrimario,
                confirmButtonText: 'OK',
                closeOnConfirm: true,
            });

        }).call();
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

//Funcao para atualizar o valor do campo documento que ira
//conter o valor do documento para PF e PJ
var atualizaCamposDocumento = function(tipo_cliente = "pessoa-fisica") {

    //se for PJ entao pegar o valor do campo documento do form pj e settar tipo para CNPJ
    if (tipo_cliente === 'pessoa-juridica') {
       $('#valor-documento-mp').val($('input[name="cnpj-pj"]').val());
       $('#valor-documento-type-mp').val('CNPJ');

       //bindando futuras mudancas no campo cnpj para que sejam espelhadas no input hidden
       $('input[name="cnpj-pj"]').off('input');
       $('input[name="cnpj-pj"]').on('input', function() {
           $('#valor-documento-mp').val($(this).val());
       });

    //se for PF entao pegar o valor do doc do form de pf e pegar valor do select de tipoDocumento
    } else if (tipo_cliente === 'pessoa-fisica') {
       $('#valor-documento-mp').val($('#documento-pf').val());
       $('#valor-documento-type-mp').val($('#document-type').val());

       //bindando futuras mudancas no campo documento-pf para que sejam espelhadas no input hidden
       $('#documento-pf').off('input');
       $('#documento-pf').on('input', function() {
           $('#valor-documento-mp').val($(this).val());
       });
    }
};


//metodo para validar se a regex de cartoes amex que restringe mais de 1 parcela
//se aplica ao numeroCartao
var checaCartaoAmex = function(numeroCartao) {
    var regex = new RegExp($('#amex-regex').val().replace(/\//g,''), "g");

    if(numeroCartao.match(regex)) {
        console.log('amex card matched');
        //desabilitar parcelas
        $('#bandeira-amex').val(1);
        $('#bandeira-amex').attr('disabled', 'true');
    } else {

        console.log('no match');
        //caso parcelas ja bloqueadas e amex card valido, desbloquear parcelas
        if ($('#bandeira-amex').attr('disabled')) {
            $('#bandeira-amex').removeAttr('disabled');
        }

    }

}

//binda a checagem de cartoes amex
var bindaCartaoAmex = function() {

    $('#num-cartao-credito').on('blur', function(e) {
        checaCartaoAmex($(this).val());
    });

};


//Metodo para pegar a mensagem de erro do mercadoPago a partir do código
var getMensagemErroMercadoPago =  function(codigoErro) {
    return mercadoPagoErros[codigoErro]
        ? mercadoPagoErros[codigoErro]
        : "Revise os dados e tente novamente";
}
