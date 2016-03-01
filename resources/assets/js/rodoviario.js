'use strict';

jQuery(document).ready(function($) {

    $('a[aria-controls=rodoviario]').on('shown.bs.tab', function() {
        $('#origem-rodoviario').focus();
    });

    var bindUpDown = function(element, evt) {
        var keyCode = evt.keyCode,
            element = $(element).find('.placesList');

        if (keyCode === 40 || keyCode === 38) {
            var listItem = $('a.autocomplete-rodoviario.list-focus').attr('data-order'),
                lastItem = $('a.autocomplete-rodoviario:last').attr('data-order');
            if (listItem === undefined) {
                if (keyCode === 40)
                    $('a.autocomplete-rodoviario[data-order=0]').addClass('list-focus');
                else
                    $('a.autocomplete-rodoviario[data-order='+lastItem+']').addClass('list-focus');
            } else {
                $('a.autocomplete-rodoviario[data-order='+listItem+']').removeClass('list-focus');
                if (keyCode === 40) {
                    if (listItem == lastItem) {
                        $('a.autocomplete-rodoviario[data-order=0]').addClass('list-focus');
                    }
                    else {
                        $('a.autocomplete-rodoviario[data-order='+(parseInt(listItem)+1)+']').addClass('list-focus');
                    }
                } else {
                    if (listItem == 0)
                        $('a.autocomplete-rodoviario[data-order='+lastItem+']').addClass('list-focus');
                    else
                        $('a.autocomplete-rodoviario[data-order='+(listItem-1)+']').addClass('list-focus');
                }
            }

        } else {
            if (keyCode === 13) {
                // Pega o id do campo que vai ser modificado, origem ou destino
                var target = $('a.autocomplete-rodoviario.list-focus').parent('.places-list').attr('data-target');
                console.log(target);
                // Muda o valor do input para a string do resultado (friendly)
                $('#'+target).val($('a.autocomplete-rodoviario.list-focus').find('span').text());
                // Muda o valor do input hidden para a string da busca (non-friendly)
                $('#'+target+'-hidden').val( $('a.autocomplete-rodoviario.list-focus').attr('data-value'));

                if (target == 'origem-rodoviario')
                    $('#destino-rodoviario').focus();
                else if (target == 'destino-rodoviario')
                    $('#data-id-rodoviario').focus();
            }
        }
    };

    var ajax,
        autocompleteTimeout,
        origemVal = '',
        destinoVal = '';

    $('#rodoviario-filtros #origem-rodoviario').on('keyup focus', function(e) {
        if ($(this).val().length >= 3) {
            if ($(this).val() !== origemVal) {
                if (autocompleteTimeout!== undefined && autocompleteTimeout > 0) {
                    clearTimeout(autocompleteTimeout);
                }
                autocompleteTimeout = setTimeout(ajaxPlace, 500, origemVal, this);
            }
        } else {
            $('.places-list').remove();
        }
        origemVal = $(this).val();
    });
    $('#rodoviario-filtros #destino-rodoviario').on('keyup focus', function(e) {
        if ($(this).val().length >= 3) {
            if ($(this).val() !== destinoVal) {
                if (autocompleteTimeout!== undefined && autocompleteTimeout > 0) {
                    clearTimeout(autocompleteTimeout);
                }
                autocompleteTimeout = setTimeout(ajaxPlace, 500, destinoVal, this);
            }
        } else {
            $('.places-list').remove();
        }
        destinoVal = $(this).val();
    });
    $('#rodoviario-filtros').find('#origem-rodoviario, #destino-rodoviario').on('keydown', function(e) {
        if (e.keyCode === 40 || e.keyCode === 38 || e.keyCode === 13) {
            e.preventDefault();
            bindUpDown(this, e);
        }
    });

    $('#rodoviario-filtros #origem-rodoviario, #rodoviario-filtros #destino-rodoviario')
        .on('blur', function() {
            setTimeout(function() {
                $('.places-list').remove();
            }, 200);
    });

    $('#buscar-rodoviario .btn').on('click', function(e) {
        e.preventDefault();

        var from      = $('#origem-rodoviario-hidden').val(),
            to        = $('#destino-rodoviario-hidden').val(),
            departure = $('#data-id-rodoviario').val(),
            type      = 'ida';

        $('#clickbus-resultado-busca').html("<h1 style='text-align-center'><i class='fa fa-spin fa-spinner laranja'></i></h1>");

        ajaxTrips({
            from: from,
            to: to,
            departure: departure,
            type: type
        })
    });
});

// Binda o clique do resultado de autocomplete (quando escolhe a cidade)
var bindAutocompleteRodoviario = function() {
    $('.places-list a').on('mousedown', function(e) {
        e.preventDefault();

        // Pega o id do campo que vai ser modificado, origem ou destino
        var target = $(this).parent('.places-list').attr('data-target');

        // Muda o valor do input para a string do resultado (friendly)
        $('#'+target).val($(this).find('span').text());
        // Muda o valor do input hidden para a string da busca (non-friendly)
        $('#'+target+'-hidden').val( $(this).attr('data-value'));

        // Remove os resultados
        $('.places-list').remove();
    });
    $('.places-list a').on('mouseover', function() {
        $('.places-list a.list-focus').removeClass('list-focus');
    });
};

//funcao chamada no retorno de /trips
var bindClickDetail = function() {
    $('.search-by-date').on('click', function(e) {
        e.preventDefault();

        var from      = $(this).attr('data-from'),
            to        = $(this).attr('data-to'),
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
        var id = $(this).attr('data-id'),
            horario_ida = $(this).attr('data-horario'),
            diames_ida = $('#data-id-rodoviario').val(),
            horario_chegada_ida = $(this).attr('data-horario-chegada'),
            classe_ida = $(this).attr('data-classe'),
            from_ida  = $(this).attr('data-from'),
            to_ida = $(this).attr('data-to'),

            //corrigindo inversão do from e to
            from      = $('#origem-rodoviario-hidden').val(),
            to        = $('#destino-rodoviario-hidden').val();

        $('#departure-schedule-id').val(id);
        $('#horario-ida').val(horario_ida);
        $('#horario-chegada-ida').val(horario_chegada_ida);
        $('#classe-ida').val(classe_ida);
        $('#from-ida').val(from_ida);
        $('#to-ida').val(to_ida);

        //Se nao tiver passagem de volta, apenas chamar o /trip
        if ($('#data-volta-rodoviario').val().length <= 0) {
            ajaxTrip(JSON.stringify([{ 'id':id, 'horario':horario_ida ,'diames':diames_ida, 'from':from_ida, 'to':to_ida, 'horario_chegada': horario_chegada_ida, 'classe': classe_ida }]));
        }

        //Se tiver volta, entao inverter to x from e fazer nova busca
        else {
            var departure = $('#data-volta-rodoviario').val(),
                type      = 'volta';

            //Quando busco a volta, preciso inverter os parametros to e from
            ajaxTrips({
                from: to,
                to: from,
                departure: departure,
                type: type
            });
        }
    });

    $('.btn-choose-volta').on('click', function(e) {
        e.preventDefault();

        var id_ida = $('#departure-schedule-id').val(),
            horario_ida = $('#horario-ida').val(),
            diames_ida = $('#data-id-rodoviario').val(),
            horario_chegada_ida = $('#horario-chegada-ida').val(),
            classe_ida = $('#classe-ida').val(),
            from_ida  = $('#from-ida').val(),
            to_ida = $('#to-ida').val(),

            //Aqui os locais estao corretos, o from e o to da volta
            //sao o inverso da ida
            from      = $('#destino-rodoviario-hidden').val(),
            to        = $('#origem-rodoviario-hidden').val(),

            id_volta = $(this).attr('data-id'),
            horario_volta = $(this).attr('data-horario'),
            diames_volta = $('#data-volta-rodoviario').val(),
            horario_chegada_volta = $(this).attr('data-horario-chegada'),
            classe_volta = $(this).attr('data-classe'),
            from_volta  = $(this).attr('data-from'),
            to_volta = $(this).attr('data-to');

            var json_resposta = JSON.stringify([{ 'id':id_ida, 'horario':horario_ida, 'diames':diames_ida, 'from':from_ida, 'to':to_ida , 'horario_chegada': horario_chegada_ida, 'classe': classe_ida }, { 'id':id_volta, 'horario':horario_volta, 'diames':diames_volta , 'from':from_volta, 'to':to_volta , 'horario_chegada': horario_chegada_volta, 'classe': classe_volta }]);
            console.log(json_resposta);
        ajaxTrip(json_resposta);
    });


};

var bindaPoltronas = function(){

    // Binda o clique das poltronas para seleção
    $(".poltrona input").click(function(){

        // Pega o elemento da poltrona
        var poltrona = $(this).parents('.poltrona'),
            // Pega somente o valor numerico. Ex.: '12-ida' -> '12'
            numero_poltrona = poltrona.find('input').val().split('-')[0];

        // Testa se é ida ou volta
        var container = poltrona.parents('.container-onibus');
        var tipo_viagem = 'ida';

        if(container.hasClass('volta')){
            tipo_viagem = 'volta';
        }

        // Testa se a poltrona já está selecionada
        if(poltrona.hasClass('selecionada'))
        {
            removePoltrona({seat: numero_poltrona}, tipo_viagem, removePoltronaFront);
        }else{
            $("#modal-poltrona-"+tipo_viagem+" .num-poltrona").html(numero_poltrona);
            $("#modal-poltrona-"+tipo_viagem+" #seat").val(numero_poltrona);
            $("#modal-poltrona-"+tipo_viagem).modal();
        }


    });

    // Binda o submit do modal das poltronas para validacao de disponibilidade
    $('form.validacao-poltrona').submit(function(e){
        e.preventDefault();

        var frm = $(this),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('button:submit').attr('disabled','disabled');
            $(this).find('#'+loading).show();
        }

        console.log('form validacao poltrona:');
        console.log('from: ' + $(this).find('input#from').val());
        console.log('to: ' + $(this).find('input#to').val());

        var params = {
            "tipo": $(this).find('input#tipo').val(),
            "from": $(this).find('input#from').val(),
            "to":  $(this).find('input#to').val(),
            "seat":$(this).find('input#seat').val(),
            "name": $(this).find('input#name').val().toUpperCase(),
            "documentType": $(this).find('select#document-type option:selected').val(),
            "document": $(this).find('input#document').val(),
            "birthday": $(this).find('input#birthday').val(),
            "email": $(this).find('input#email').val().toLowerCase(),
            "id": $(this).find('input#trip-id').val(),
            "date": $(this).find('input#date').val(),
            "time": $(this).find('input#time').val(),
            "timezone": "America/Sao_Paulo",
            "sessionId": $(this).find('input#session-id').val(),
        } ;

        //Tradução
        var linguaAtiva = $("meta[name=language]").attr("content");
        var arrayLingua = [];

        switch(linguaAtiva){
            case 'en':
                arrayLingua[1] = 'Ops!';
                arrayLingua[2] = 'There was a problem during the booking of your seat!';
            break;
            case 'pt':
                arrayLingua[1] = 'Opa!';
                arrayLingua[2] = 'Ocorreu um problema durante a reserva da sua poltrona!';
            break;
            default:
                arrayLingua[1] = 'Opa!';
                arrayLingua[2] = 'Ocorreu um problema durante a reserva da sua poltrona!';
        }

        // Envia ajax de validaçao, caso seja bem sucedido marca como
         // selecionada a poltrona
        ajaxPoltronas(params, function(data_obj) {

            //se tiver dado erro
            if (data_obj.errors) {
                swal({
                    title: arrayLingua[1],
                    html: arrayLingua[2]+"<br/><br/>"+data_obj.errors,
                    type: "error",
                    confirmButtonColor: "#FF5B00",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                },
                function() {
                    console.log('clicou botao swal error data:');
                    console.log(data_obj);
                });
            //se estiver tudo ok.
            } else {
                adicionaPoltronaFront(data_obj.result.items[0],params.tipo,data_obj.data.request.passenger);

                //resetando campos da modal de passageiro
                var modal_ida = $('#validacao-poltrona-ida');
                if (modal_ida.length > 0) {
                    modal_ida[0].reset();
                }

                var modal_volta = $('#validacao-poltrona-volta');
                if (modal_volta.length > 0) {
                    modal_volta[0].reset();
                }

                console.log("retorno do ajaxPoltronas -> sessionId retornado: " + data_obj.data.request.sessionId);
                //garantindo que o input#session-clickbus tera o sessionId
                //Atualizado
                setSessionId(data_obj.data.request.sessionId);

            }
        });
    });


    // Binda o submit do form de todas as poltronas
    $('#form-poltronas-clickbus').submit(checaQuantidadePoltronas);
};

// Mostra a poltronacomo selecionada e adicona no
// formulario de sumissao de compra
var adicionaPoltronaFront = function(poltrona, tipo_viagem, viajante){
    // Tradução
    var linguaAtiva = $("meta[name=language]").attr("content");
    var arrayLingua = [];

    var numero_poltrona = poltrona.seat;
    var poltrona_elemento = $("input#"+numero_poltrona+"-"+tipo_viagem).parents('.poltrona');

    var seatReservation = poltrona.schedule.id;

    // marca o elemento da poltrona como selecionado (laranja)
    poltrona_elemento.addClass('selecionada');

    switch(linguaAtiva){
        case 'en':
            arrayLingua[1] = 'Name:';
            arrayLingua[2] = 'Documment:';
        break;
        case 'pt':
            arrayLingua[1] = 'Nome:';
            arrayLingua[2] = 'Documento:';
        break;
        default:
            arrayLingua[1] = 'Nome:';
            arrayLingua[2] = 'Documento:';
    }

    // Adiciona o html da poltrona no formulario de compra
    // CUIDADO: HTML DIRETO NO JS
    var html =
        '<div class="row poltrona-container" id="poltrona-'+numero_poltrona+'-'+tipo_viagem+'"><div class="col-sm-12 margin-b-1"><div class="poltrona-externa selecionada">'+numero_poltrona+'</div><div class="pull-right"><i class="fa fa-close exclui-poltrona" onclick="removePoltrona({\'seat\':'+numero_poltrona+'},\''+tipo_viagem+'\', removePoltronaFront)"></i></div><input type="hidden" name="'+tipo_viagem+'-numero_poltrona" value="'+numero_poltrona+'"></div><div class="col-sm-12"><label for="nome">'+arrayLingua[1]+'</label></div><div class="col-sm-12"><span>'+viajante.name.toUpperCase()+'</span></div><div class="col-sm-12"><label for="doc">'+arrayLingua[2]+'</label></div><div class="col-sm-4">'+viajante.documentType.toUpperCase()+'</div><div class="col-sm-8">'+viajante.document+'</div><input type="hidden" name="'+tipo_viagem+'-email" value="'+viajante.email+'"><input type="hidden" name="'+tipo_viagem+'-birthday" value="'+viajante.birthday+'"><input type="hidden" name="'+tipo_viagem+'-documento" value="'+viajante.document+'"><input name="'+tipo_viagem+'-documentType" type="hidden" value="'+viajante.documentType.toUpperCase()+'"><input name="'+tipo_viagem+'-nome" type="hidden" value="'+viajante.name.toUpperCase()+'"></div>';

    $('.poltronas-selecionadas-'+tipo_viagem).append(html);

    // Fecha a modal
    $('#modal-poltrona-'+tipo_viagem).modal('hide');
};

var removePoltronaFront = function(data,numero_poltrona,tipo_viagem){

    var icone_poltrona = $("input#"+numero_poltrona+'-'+tipo_viagem).parents('.poltrona');

    // Remove o div com os dados da lateral
    $('#poltrona-'+numero_poltrona+'-'+tipo_viagem).remove();
    // Muda a cor da poltrona
    icone_poltrona.removeClass('selecionada');

    setSessionId(data.content.setSessionId);
};

var bindaAbas = function() {
    $('#abas-pagamento a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if($(e.target).hasClass('tipo-cliente')){
            $("#tipo-cliente").val($(e.target).attr('aria-controls'));

        // se mudar a forma de pagamento, remova desconto e atualize
        }else if($(e.target).hasClass('forma-pagamento')){
            $("#forma-pagamento").val($(e.target).attr('aria-controls'));
            removeDesconto();
            atualizaValorParcelas();
        }
        // Remove os required do que foi deselecionado
        $($(e.target).attr("href")).parent(".tab-content").find(".required").prop("required",false);
        // Adiciona required no que ta selecionado
        $($(e.target).attr("href")).find(".required").prop("required",true);
    })
};

//Funcao para bindar quando o usuario selecionar a bandeira do creditcard,
//esconde todos os selects e mostra o atual;
//@TODO: bindar selects com update de precos?
var bindaBandeirasCartao = function() {
    $('input.seleciona-bandeira').change(function(evt) {
       evt.preventDefault();
       $('.select-parcelas').hide();
       $('#bandeira-'+$(this).val()).show();
    });
};
var bindaChangePagamento = function() {
    $('input.seleciona-bandeira[name="bandeira-cartao"]').change(function(){
        atualizaValorParcelas();
    });

    //bindando os select's de qnt de parcelas com as
    //funcoes para resetar o desconto e atualizar a UI
    $('.select-parcelas').change(function(){
        removeDesconto();
        atualizaValorParcelas();
    });

};

var atualizaValorParcelas = function(){

    var forma_pagamento = $("form#form-pagamento").find('input#forma-pagamento').val();
    // Calcula o desconto
    var desconto_valor = Number($("form#form-pagamento").find('input#desconto').val()),
        desconto_fixo = $("form#form-pagamento").find('input#desconto-fixo').val(),
        desconto_servico = Number($("form#form-pagamento").find('input#desconto-servico').val());

    if(forma_pagamento == 'cartao-credito'){
        var bandeira = $('input.seleciona-bandeira[name="bandeira-cartao"]:checked').val(),
            opcao_selecionada = $( "select#bandeira-"+bandeira+" option:selected"),
            qtd_parcelas = opcao_selecionada.val(),
            total_with_discount = opcao_selecionada.data('total_with_discount'),
            total = opcao_selecionada.data('total'),
            installment = opcao_selecionada.data('installment'),
            discount_value = opcao_selecionada.data('discount_value'),
            fee = opcao_selecionada.data('fee');
    } else if(forma_pagamento == 'paypal') {
        var opcao_selecionada = $("#paypal-datas"),
            qtd_parcelas = opcao_selecionada.val(),
            total_with_discount = opcao_selecionada.data('total_with_discount'),
            total = opcao_selecionada.data('total'),
            installment = opcao_selecionada.data('installment'),
            discount_value = opcao_selecionada.data('discount_value'),
            fee = opcao_selecionada.data('fee');
    } else if(forma_pagamento == 'cartao-debito'){
        var opcao_selecionada = $("#cartao-debito-datas"),
            qtd_parcelas = opcao_selecionada.val(),
            total_with_discount = opcao_selecionada.data('total_with_discount'),
            total = opcao_selecionada.data('total'),
            installment = opcao_selecionada.data('installment'),
            discount_value = opcao_selecionada.data('discount_value'),
            fee = opcao_selecionada.data('fee');
    }

    // Recalcula os valores caso haja desconto
    if(desconto_valor > 0) {
        // console.log("Valor desconto maior que zero e igual a "+desconto_valor);
        // Calcula o valor original
        var original_cost = Number(total) - Number(fee);

        // console.log("Original Cost: "+original_cost);
        // console.log("Valor discount antes:"+discount_value);
        // console.log("Desconto fixo"+desconto_fixo);
        // Calcula o desconto total e recalcula o total_with_discount
        if(desconto_fixo != "true") {
            // console.log("Desconto variavel (nao fixo)");
            discount_value = discount_value + desconto_valor*total;
            total_with_discount = total_with_discount - desconto_valor*total;
        }else{
            // console.log("Desconto fixo");
            discount_value = discount_value + desconto_valor;
            total_with_discount = total_with_discount - desconto_valor;
        }
        // console.log("Valor discount:"+discount_value);
        // console.log("Valor total:"+total_with_discount);

        // Recalcula o valor da parcela
        var installment = ((original_cost + Number(fee)) - discount_value) / Number(qtd_parcelas);
        // console.log("Valor parcela: "+installment);
    }

    if(discount_value > 0){
        $('.row-desconto').show();
        $('.valor-desconto').html(discount_value.toFixed(2).toString().replace(',','').replace('.',','));
    }else{
        $('.row-desconto').hide();
    }

    $('.num-vezes').html(qtd_parcelas);
    $('#qtd-parcelas').val(qtd_parcelas);
    $('.valor-fee').html(fee.toFixed(2).toString().replace(',','').replace('.',','));
    $('.valor-installment').html(installment.toFixed(2).toString().replace(',','').replace('.',','));

    $('#valor-total-pagamento-passagem').val(total_with_discount);
};

//Função para remover o valor dos inputs de desconto
//Nao atualiza a UI
var removeDesconto = function() {
    $("form#form-pagamento").find('input#desconto').val("");
    $("form#form-pagamento").find('input#desconto-fixo').val("");
    $("form#form-pagamento").find('input#desconto-servico').val("");
};

var bindaFormPagamento = function() {

    // Binda o submit da compra
    $('#form-pagamento').submit(function (ev) {
        ev.preventDefault();
        var frm = $(this);

        // Monta o payment de acordo com a forma de pagamento
        // (credito, debito, paypal)
        var forma_pagamento = frm.find('input#forma-pagamento').val(),
            total = Number(frm.find("input#valor-total-pagamento-passagem").val().replace('.','')),
            payment = {};

        if(forma_pagamento == 'cartao-credito'){
            payment = {
                "method": "creditcard",
                "currency": "BRL",
                "total": total,
                "installment": frm.find("input#qtd-parcelas").val(),
                "meta": {
                    "card": frm.find("input[name='num-cartao-credito']").val(),
                    "code": frm.find("input[name='cod-seguranca-credito']").val(),
                    "name": frm.find("input[name='nome-titular-credito']").val(),
                    "expiration": frm.find("select[name='ano-validade-credito'] option:selected").val()+'-'+frm.find("select[name='mes-validade-credito'] option:selected").val(),
                    "zipcode": frm.find("input[name='cep-titular-credito']").val()
                }
            }
        }else if(forma_pagamento == 'cartao-debito') {
            payment = {
                "method": "debitcard",
                "currency": "BRL",
                "total": total,
                "installment": "1",
                "meta": {
                    "card": frm.find("input[name='num-cartao-debito']").val(),
                    "code": frm.find("input[name='cod-seguranca-debito']").val(),
                    "name": frm.find("input[name='nome-titular-debito']").val(),
                    "expiration": frm.find("select[name='ano-validade-debito'] option:selected").val()+'-'+frm.find("select[name='mes-validade-debito'] option:selected").val(),
                    "zipcode": frm.find("input[name='cep-titular-debito']").val()
                }
            }

        }else if(forma_pagamento == 'paypal'){
            payment = {
                "method": "paypal_hpp",
                "currency": "BRL",
                "total": total,
                "installment": "1",
                "meta": {}
            }
        }

        // Monta o buyer de acordo com a documentacao
        var tipo_cliente = $('input#tipo-cliente').val();
        var buyer = {};
        if (tipo_cliente == 'pessoa-fisica') {
            var nomeArray = $('input[name="nome-pf"]').val().split(" ");
            var birthday = $('input[name="nascimento-pf"]').val().split("/").reverse().join("-");

            buyer = {
                "locale":"pt_BR",
                "firstName": nomeArray.shift(),
                "lastName": nomeArray.join(" "),
                "email": $('input[name="email-pf"]').val(),
                "phone": $('input[name="telefone-pf"]').val(),
                "document":$('input[name="documento-pf"]').val(),
                "gender":"M",
                "birthday": birthday,
                "payment": payment,
                "meta": {}
            }

            console.log('buyer pessoa fisica: ');
            console.log(buyer);

        }else if (tipo_cliente == 'pessoa-juridica') {
            var nomeArray = $('input[name="nome-pj"]').val().split(" ");
            var birthday = $('input[name="nascimento-pj"]').val().split("/").reverse().join("/");

            buyer = {
                "locale":"pt_BR",
                "firstName": nomeArray.shift(),
                "lastName": nomeArray.join(" "),
                "email": $('input[name="email-pj"]').val(),
                "phone": $('input[name="telefone-pj"]').val(),
                "document":$('input[name="cnpj-pj"]').val(),
                "gender":"M",
                "birthday": birthday,
                "payment": payment,
                "meta": {}
            }

            console.log('buyer pessoa juridica: ');
            console.log(buyer);

        }

        /** Comentado pois na existe mais forma de pagamento 'estrangeiro'
        else if (tipo_cliente == 'estrangeiro') {
            var nomeArray = $('input[name="nome-estrangeiro"]').val().split(" ");

            buyer = {
                "locale":"pt_BR",
                "firstName": nomeArray.shift(),
                "lastName": nomeArray.join(" "),
                "email": $('input[name="email-estrangeiro"]').val(),
                "phone": $('input[name="telefone-estrangeiro"]').val(),
                "document":$('input[name="cnpj-estrangeiro"]').val(),
                "gender":"M",
                "birthday":$('input[name="nascimento-estrangeiro"]').val(),
                "payment": payment,
                "meta": {}
            }

            console.log('buyer estrangeiro: ');
            console.log(buyer);
        }

       */

       // Monta o orderItems com as poltronas e dados de cada passageiro
        var numero_poltronas = $('input#quantidade-poltronas').val(),
            orderItems = [];

        for (var i = 0; i < numero_poltronas; i++) {
           var  seatReservation = $('#form-pagamento').find('input[name="passagens['+i+'][\'seatReservation\']"]').val();
            var passenger = {
               "firstName" : $('#form-pagamento').find('input[name="passagens['+i+'][\'firstName\']"]').val(),
               "lastName" : $('#form-pagamento').find('input[name="passagens['+i+'][\'lastName\']"]').val(),
               "email" : $('#form-pagamento').find('input[name="passagens['+i+'][\'email\']"]').val(),
               "document" : $('#form-pagamento').find('input[name="passagens['+i+'][\'document\']"]').val(),
               "gender" : "M",
               "birthday" : $('#form-pagamento').find('input[name="passagens['+i+'][\'birthday\']"]').val(),
               "seat" : $('#form-pagamento').find('input[name="passagens['+i+'][\'seat\']"]').val(),
               "meta" : {}
            };

            orderItems.push({
                "seatReservation" : seatReservation,
                "passenger" : passenger
            })
        }



        var params = {
             "meta": {
                 "model": "Retail",
                 "store": "Vivala",
                 "platform": "API",
                 "api_key": "$2y$05$32207918184a424e2c8ccujmuryCN3y0j28kj0io2anhvd50ryln6"
            },
             "request": {
                "sessionId": $('input#session-clickbus').val(),
                "voucher" : $('input#voucher-str').val().toUpperCase(),
                "ip": "",
                "buyer": buyer,
                "orderItems": orderItems
             }
        };

        var frm = $(this),
            loading = frm.data('loading');

        if (loading && loading != "") {
            $(this).find('input:submit').attr('disabled','disabled');
            $(this).find('#'+loading).show();
        }

        //sweetalert de loading :)
        swal({
            html : '<br><i class="fa fa-3x fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
            showCancelButton: false,
            width:240,
            confirmButtonClass: 'hide'
        });

        tripBooking(params);

    });

    // Binda botao de voucher para anexar voucher na compra
    $('#usar-voucher-desconto').click(function(){

        //TODO mostrar que email é necessario

        //Usando o .toUpperCase para evitar vouchers invalidos
        var voucherStr = $('#voucher-str').val().toUpperCase();

        $("#usar-voucher-desconto").html("<i class='fa fa-spin fa-spinner'></i>");

        //pegando id da aba de pagamento ativa
        var idTabPagamentoAtiva = $('ul#abas-cliente li.active a')[0].id;

        //pegando valor do email da aba ativa
        var emailStr = $('#tabs-pagamento-cliente > div.tab-pane[aria-labelledby="'+idTabPagamentoAtiva+'"]').find('input[type="email"]').val();

        var params = {
             "meta": {
                 "model": "Retail",
                 "store": "Vivala",
                 "platform": "API",
            },
             "request": {
                "sessionId": $('input#session-clickbus').val(),
                "voucher": voucherStr,
                "buyer": {
                    "email": emailStr
                }
             }
        };

        ajax = $.ajax({
            url: 'clickbus/voucher',
            type: 'POST',
            dataType: 'json',
            data: params
        })
        .done(function(data) {

            if (data.errors) {
                swal({
                    title: "Ooops!",
                    html: "Ocorreu um problema com seu voucher:<br>"+data.errors,
                    type: "error",
                    confirmButtonColor: "#F16F2B",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                });

                $("#usar-voucher-desconto").html("USAR CUPOM");
                atualizaValorParcelas();
            } else {

                if (data.session !== undefined) {
                    setSessionId(data.session);
                }

                var desconto = data.content.discountValue;
                var descontoFixo = data.content.isFixedValue;
                var descontoServico = data.content.serviceFeeDiscountPercentage;

                // Atualiza valores nos campos hidden
                $("#desconto").val(desconto);
                $("#desconto-fixo").val(descontoFixo);
                $("#desconto-servico").val(descontoServico);

                $("#usar-voucher-desconto").html("USAR CUPOM");
                atualizaValorParcelas();
            }

        }).error(function() {
            $("#usar-voucher-desconto").html("USAR CUPOM");
            atualizaValorParcelas();
        });

    });
};

//Metodo para checar as quantidade de poltronas
//exibindo algum alert se necessario
var checaQuantidadePoltronas =  function(ev) {
    ev.preventDefault();

    var qntIda = $('div.poltronas-selecionadas-ida .poltrona-container').length;
    var qntVolta = $('div.poltronas-selecionadas-volta .poltrona-container').length;

    if (qntIda > 0 && qntVolta > 0 && qntIda != qntVolta) {
        //caso qnts diferentes
        swal({
            title: "Atenção",
            text: "Voce selecionou um numero diferente de passagens de ida e volta. Deseja continuar mesmo assim?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, continuar!",
            cancelButtonText: "Não, corrigir!",
            closeOnConfirm: true,
            closeOnCancel: true
            },
            function(confirmed){
                if (confirmed) {
                   funcaoSubmitPoltronas(this);

                } else {
                    //nao fazer nada
                }
        });

    } else if (qntIda > 0 && qntVolta == 0) {
        var temVolta = $('#data-volta-rodoviario').val() != "";
        if (temVolta) {
            //caso sem volta
            swal({
                title: "Atenção",
                text: "Voce não selecionou uma passagem de volta. Deseja continuar assim mesmo?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, continuar!",
                cancelButtonText: "Não, corrigir!",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(confirmed){
                    if (confirmed) {
                        funcaoSubmitPoltronas(this);
                    } else {
                        //nao fazer nada
                    }
            });
        } else {
          funcaoSubmitPoltronas(this);
        }

    } else if (qntIda == 0) {
       //caso nao selecionou Ida
       swal({
            title: "Ops, ocorreu um problema",
            text: "Voce não selecionou uma passagem de ida!",
            type: "warning",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });

    } else {
        funcaoSubmitPoltronas(this);
    }
};

var funcaoSubmitPoltronas = function (ev) {

    var params = {
        "store": "Vivala",
        "model": "Retail",
        "platform": "API",
        "contents": []
    };

    var frm = $('#form-poltronas-clickbus'),
        loading = frm.data('loading');

    if ( loading && loading != "") {
        $(frm).find('input:submit').attr('disabled','disabled');
        $(frm).find('#'+loading).show();
    }

    tripPayment(params, frm);

};
