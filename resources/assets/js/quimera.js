'use strict';
/**
 * Autocomplete para ser bindado no key up de inputs de viagens.
 * retorna um objeto "autocomplete" com nomes, tipos e códigos das localidades
 */
var autocomplete = function(query) {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {query}, 
            url: 'autocomplete',
            method: 'GET',
            process: true
        },
    })
    .done(function(data) {
        console.log(data);
    });
};

/**
 * Autocomplete para a pesquisa de hotéis
 */
var autocompleteHotels = function(query) {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        dataType: 'json',
        data: {
            params: {
                query: query,
                filtered: true
            }, 
            url: 'hotelscomplete',
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
 *  Busca de passagens
 */
var searchTrip = function(params) {
    var
        url = 'trip',
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

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
    });

    $.ajax({
        url: '/quimera',
        type: 'POST',
        /*dataType: 'html',*/
        data: {
            params: defaultParams,
            url: url,
            method: 'GET',
            process: true,
        },
    })
    .done(function(data) {
        $('.cria-post-container').html(data);
    }); 
};

testSearchTrip = function() {
    searchTrip({
        from: 'SAO',
        to: 'SYD',
        departureDate: '2016-01-29',
        returnDate: '2016-02-10',
        adults: 2
    });
};

/**
 * Select com todos os filtros de viagens
 */
var sortFilterTrip = function(select) {
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
            process: true,
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