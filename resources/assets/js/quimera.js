'use strict';
/**
 * Autocomplete para ser bindado no key up de inputs de viagens.
 * retorna um objeto "autocomplete" com nomes, tipos e códigos das localidades
 */
var ajaxCall = null;
var autocompleteFlights = function(query, inputId, container, lista) {
    query = escape(query);
    //Insere icone de loading
    lista.html("<i class='fa-spin fa-spinner fa'></i>");
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    if (ajaxCall != null && ajaxCall.state() == 'pending') {
        ajaxCall.abort();
    }
    // Procura o que foi inserido
    ajaxCall = $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'html',
        data: {
            params: {query},
            url: 'autocomplete',
            method: 'GET',
            process: true
        },
    })
    .done(function(data) {
        lista.remove(); 
        container.append(data);

        // nao consegui bindar o clique certo :(
        console.log(inputId);
        lista.attr('data-input', inputId);
        
        bindAutoCompleteFlights();
    });
};

/**
 * Autocomplete para a pesquisa de hotéis
 */
var autocompleteHotels = function(query, inputId) {
    query = escape(query);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'html',
        data: {
            params: {
                query: query,
                filtered: true
            },
            url: 'hotelscomplete',
            method: 'GET',
            process: true,
            headers: {
                "agency-domain": 'vivala',
                "Accept-Language": 'pt-BR'
            }
        },
    })
    .done(function(data) {
        $('div.hotel-list').remove();
        $('.cria-post-container').append(data);
        $('div.hotel-list').attr('data-input', inputId);
        bindAutoCompleteHotels();
    });
};

var autocompleteCars = function(query) {
    var base_url = 'https://www.e-agencias.com.br/vivala/autocomplete/',
        suffix   = '/cars/airports,cities/filtered=true';
    query = escape(query);
    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'html',
        data: {
            url: base_url+query+suffix,
            type: 'autocompleteCars',
            method: 'GET',
            process: true
        },
    })
    .done(function(data) {
        $('#buscaVoos').append(data);
    });
    
};

/**
 *  Busca de passagens
 */
var searchFlight = function(params, type) {
    var
        base_url      = 'https://www.e-agencias.com.br/vivala/flights/search/',
        url           = 'trip',
        defaultParams = {
            currency: 'BRL',
            site: 'BR',
            agency: 'vivala',
            from: '',                        /* 3 uppercased characters */
            to: '',                          /* 3 uppercased characters */
            departureDate: '',               /* YYYY-mm-dd */
            returnDate: null,                /* YYYY-mm-dd */
            adults: 0,                       /* Quantidade de adultos */
            infant: 0,                       /* Quantidade de crianças até 11 anos */
            children: 0,                     /* Quantidade de crianças até 24 meses viajando no colo */
            sortBy: 'total_price_ascending', /* ['personal_ascending'|'duration_ascending'|'stopscount_ascending'|'stopscount_descending'|'total_price_ascending'|'total_price_descending'] */
            facet: {
                stops: null,
                airlines: null,
                inboundTime: null,
                total_price_range: null      /*{(int)preço minimo}-{(int)preço maximo}*/
            }
        };

    $.extend(defaultParams, params);

    if (defaultParams.returnDate) {
        base_url += 'RoundTrip/'+defaultParams.from+'/'+defaultParams.to+'/'+defaultParams.departureDate+'/'+defaultParams.returnDate+'/'+defaultParams.adults+'/'+defaultParams.infant+'/'+defaultParams.children+'/NA/NA';
    } else {
        base_url += 'OneWay/'+defaultParams.from+'/'+defaultParams.to+'/'+defaultParams.departureDate+'/'+defaultParams.adults+'/'+defaultParams.infant+'/'+defaultParams.children+'/NA/NA';
    }

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $('.resultados-busca-voos').html("<i class='fa fa-spin fa-spinner'></i>")
    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'html',
        data: {
            params: defaultParams,
            url: url,
            method: 'GET',
            process: true,
        },
    })
    .done(function(data) {
        $('#flight-url').val(base_url);
        $('.resultados-busca-voos').html(data);
        bindFlight();
    }).fail(function(){
        $('resultados-busca-voos').html("Nenhum vôo foi encontrado");
    });
};

/**
 * Select com todos os filtros de viagens
 */
var sortFilterFlight = function(select) {
    var filters = [
        ['personal_ascending',     'Mais vendidos'],
        ['duration_ascending',     'Duração'],
        ['stopscount_ascending',   'Paradas: baixa à alta'],
        ['stopscount_descending',  'Paradas: alto para baixo'],
        ['total_price_ascending',  'Preço: baixa à alta'],
        ['total_price_descending', 'Preço: alto para baixo']
    ];
    if (!select) {
        var select = document.createElement("select");
        $(select).addClass('quimera-flights-filters');
    }
    for (var i = 0; i < filters.length; i++) {
        var option = document.createElement("option");
        $(option).val(filters[i][0]).html(filters[i][1]);
        if (filters[i][0] == 'total_price_ascending') {
            $(option).prop('selected', true);
        }
        $(select).append(option);
    }
    return select;
};

/**
 * Pesquisa de hotéis
 */
var searchHotels = function(params) {
    var
        url = 'hotel',
        defaultParams = {
            destination: null,
            checkin: null,
            checkout: null,
            distribution: null,
            sortBy: 'best_selling_descending', // [stars_descending|stars_ascending|subtotal_price_descending|subtotal_price_ascending|best_selling_descending]
            facets: {
                subtotalPriceRange: null
            }
        };

    $.extend(defaultParams, params);

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'html',
        data: {
            params: defaultParams,
            url: url,
            method: 'GET',
            process: false,
            headers: {
                "agency-domain": 'vivala',
                "Accept-Language": 'pt-BR'
            }
        },
    })
    .done(function(data) {
        $('.cria-post-container').html(data);
    });
};

/**
 * Procurar por informações detalhadas de um hotel pelo seu ID
 */
var hotelDetail = function(id) {
    var
        url = 'hotelDetail';

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {id: id},
            url: url,
            method: 'GET',
            process: false,
            headers: {
                "agency-domain": 'vivala',
                "Accept-Language": 'pt-BR'
            }
        },
    })
    .done(function(data) {
        console.log(data);
    });
};

/**
 * Verificar disponibilidade de vagas no hotel
 */
var hotelAvaiability = function(params) {
    var
        url = 'hotelAvaiability',
        defaultParams = {
            id: null,
            checkin: null,
            checkout: null,
            distribution: null,
            currency: 'BRL'
        };

    $.extend(defaultParams, params);

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'json',
        data: {
            params: defaultParams,
            url: url,
            method: 'GET',
            process: true,
            headers: {
                "agency-domain": 'vivala',
                "Accept-Language": 'pt-BR'
            }
        },
    })
    .done(function(data) {
        console.log(data);
    });
};

var searchCars = function(params) {
    var
        base_url = 'https://www.e-agencias.com.br/vivala/search/carList/',
        defaultParams = {
            pickup: {
                type: null,    // [city|airport]
                code: null,    // [A-Z]{3}
                date: null,    // [YYY-mm-dd]
                time: null     // [0-9]{1,2}:[0-9]{2}
            },
            dropoff: {
                type: null,    // [city|airport]
                code: null,    // [A-Z]{3}
                date: null,    // [YYY-mm-dd]
                time: null     // [0-9]{1,2}:[0-9]{2}
            }
        };

    $.extend(defaultParams, params);
    params = defaultParams;

    base_url += params.pickup.type+'/'+params.pickup.code+'/'+params.pickup.date+'T'+params.pickup.time+'/'+params.dropoff.type+'/'+params.dropoff.code+'/'+params.dropoff.date+'T'+params.dropoff.time+'/ARS';

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'json',
        data: {
            url: base_url,
            method: 'GET',
            proccess: false
        },
    })
    .done(function(data) {
        console.logdi(data);
    });
    
};

var flightCheckout = function(params) {
    var
        base_url = 'https://www.e-agencias.com.br/vivala/flights/checkout/',
        output   = 'Parâmetros Inválidos',
        defaultParams = {
            id: null,
            type: null, //[RoundTrip|OneWay]
            currency: 'BRL',
            url: null,
            radioDeparture: null,
            radioArrival: null
        };

    $.extend(defaultParams, params);

    defaultParams.url = btoa(defaultParams.url);

    if (defaultParams.type == 'RoundTrip') {
        output = base_url+defaultParams.type+'/'+defaultParams.id+'/'+defaultParams.radioDeparture+'/'+defaultParams.radioArrival+'/'+defaultParams.currency+'/'+defaultParams.url;
    } else if (defaultParams.type == 'OneWay'){
        output = base_url+defaultParams.type+'/'+defaultParams.id+'/'+defaultParams.radioDeparture+'/'+defaultParams.currency+'/'+defaultParams.url;
    }

    return output;
};

var hotelCheckout = function(params) {
    var
        base_url = 'https://www.e-agencias.com.br/vivala/hotels/checkout/start/',
        output   = 'Parâmetros Inválidos',
        defaultParams = {
            key: null,
            arriveDate: null,
            checkin: null,
            checkout: null,
            hotelId: null,
            roomId: null,
            currency: 'BRL',
            orderType: 'DOMESTIC'
        };
    return base_url+key+'/'+defaultParams.checkin+'/'+defaultParams.checkout+'/'+defaultParams.distribution+'/'+defaultParams.hotelId+'/'+defaultParams.roomId+'/'+defaultParams.orderType+'/'+defaultParams.currency;
};

var testHotelAvaiability = function () {
    hotelAvaiability({
        id: '331030',
        checkin: '2015-10-14',
        checkout: '2015-10-20',
        distribution: '1!1'
    });
};

var testSearchFlight = function() {
    searchFlight({
        from: 'SAO',
        to: 'RIO',
        departureDate: '2015-09-29',
        returnDate: '2015-10-07',
        adults: 2
    });
};

var testSearchHotels = function () {
    searchHotels({
        destination: '6574',
        checkin: '2016-01-20',
        checkout: '2016-01-25',
        distribution: '1'
    });
};

var testSearchCars = function () {
    searchCars({
        pickup: {
            type: 'airport',   
            code: 'GRU',   
            date: '2015-11-17',   
            time: '13:00'    
        },
        dropoff: {
            type: 'city',   
            code: 'SAO',   
            date: '2015-12-02',   
            time: '15:00'    
        }
    });
};

$(".mostraCriancasVoos").change(function() {
  var qtdCriancas = this.value;
  $(".idade-criancas").hide();
  for(var i=0;i<=qtdCriancas;i++) {
      $('.idade-criancas[data-child-id="'+i+'"]').show();
  }
});

$("form#buscaVoos").submit(function(e){
    e.preventDefault();

    var form = $(this),
        origem = form.find("#origenID").val(),
        destino = form.find("#destinoID").val(),
        dataPartida = form.find("#dataPartidaVoos").val(),
        dataRetorno = form.find("#dataRetornoVoos").val(),
        qtdAdultos = form.find("#qtdAdultosVoos").val(),
        qtdCriancas = form.find("#qtdCriancasVoos").val(),
        qtdJovensTotal = 0,
        qtdBebesTotal = 0,
        qtdAdultosTotal = qtdAdultos;

    // Formata a data
    dataPartida = dataPartida.split('/').reverse().join('-');  
    dataRetorno = dataRetorno.split('/').reverse().join('-');  
    // Conta quantas tarifas de crianças jovens e adultos serão cobradas
    for(var i=0;i<=qtdCriancas;i++) {
        var tipoTarifa = form.find('.idade-criancas[data-child-id="'+i+'"]').val();
        if(tipoTarifa == "b")
          qtdBebesTotal++;
        else if(tipoTarifa == "j")
          qtdJovensTotal++;
        else if (tipoTarifa == "a")
          qtdAdultosTotal++;
    }

    var opcoes = {
        from:           origem,
        to:             destino,
        adults:         parseInt(qtdAdultosTotal),
        infant:         parseInt(qtdJovensTotal),                       /* Quantidade de crianças até 11 anos */
        children:       parseInt(qtdCriancas),                     /* Quantidade de crianças até 24 meses viajando no colo */
        departureDate:  dataPartida,               /* YYYY-mm-dd */
        returnDate:     dataRetorno,                /* YYYY-mm-dd */
        sortBy: 'total_price_ascending', /* ['personal_ascending'|'duration_ascending'|'stopscount_ascending'|'stopscount_descending'|'total_price_ascending'|'total_price_descending'] */
        facet: {
            stops: null,
            airlines: null,
            inboundTime: null,
            total_price_range: null      /*{(int)preço minimo}-{(int)preço maximo}*/
        }
    };
    console.log(opcoes);
    console.log(origem);
    console.log(destino);
    searchFlight(opcoes);

});

var chamaCheckout = function(url) {
    $('.modal').on('shown.bs.modal',function(){      //correct here use 'shown.bs.modal' event which comes in bootstrap3
      $(this).find('iframe').attr('src', url)
    });
    $('.modal').modal({show:true});
}

var bindFlight = function() {
    $('button.flight-checkout').on('click', function() {
        var count         = $(this).val(),
            id            = $(this).parent('.flight-pricing').find('input.flight-id').val(),
            radioOutbound = $('input[name=outbound-'+count+']:checked').val(),
            radioInbound  = $('input[name=inbound-'+count+']:checked').val(),
            url           = $('#flight-url').val();

        chamaCheckout(flightCheckout({
            id: id,
            type: 'RoundTrip',
            url: url,
            radioDeparture: radioOutbound,
            radioArrival: radioInbound
        }));
    });
};

$(".mostraQuartosHotel").change(function() {
  var qtdQuartos = this.value;
  $('.qtd-quartos').hide();
  for(var i=0; i<=qtdQuartos; i++) {
      $('.qtd-quartos[data-room-id="'+i+'"]').show();
  }
});

var bindAutoCompleteFlights = function() {
    $('a.autocomplete-flight').on('click', function(e) {
        e.preventDefault();
        var 
            input = $(this).parent('.flight-list').attr('data-input'),
            value = $(this).text();

        console.log("Input e valor:");
        console.log(input);
        console.log(value);

        $(input).val(value);
    });
};

var bindAutoCompleteHotels = function() {
    $('a.autocomplete-hotel').on('click', function(e) {
        e.preventDefault();
    });
};

$(document).ready(function($) {
    // Binda keydown da origem pra procurar aeroportos 
    // e cidades quando entrar mais que 3 chars
    var autocompleteTimeout = null;
    $('input#origem-voo').on('keyup', function() {
        var value = $(this).val(),
            lista = $('#lista-origem .flight-list'),
            container = $('#lista-origem');

        if (autocompleteTimeout > 0) {
            clearTimeout(autocompleteTimeout);
        }
        if (value.length >= 3) {
            autocompleteTimeout = setTimeout(autocompleteFlights, 800, value, '#origem-voo-id', container, lista); 
        } else {
            lista.remove();
        }
    });

    $('input#destino-voo').on('keyup', function() {
        var value = $(this).val(),
            lista = $('#lista-destino .flight-list'),
            container = $('#lista-destino');

        if (autocompleteTimeout > 0) {
            clearTimeout(autocompleteTimeout);
        }
        if (value.length >= 3) {
            autocompleteTimeout = setTimeout(autocompleteFlights, 800, value, '#destino-voo-id', container, lista);
        } else {
            lista.remove();
        }
    });
});
