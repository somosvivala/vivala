/**
 * Autocomplete para ser bindado no key up de inputs de viagens.
 * retorna um objeto "autocomplete" com nomes, tipos e códigos das localidades
 */
var autocomplete = function(query) {
    $.ajaxSetup({
        headers: { 
            'Access-Control-Allow-Origin': '*'
        }
    });

    $.ajax({
        url: 'https://www.e-agencias.com.br/jano-flights/api/autocomplete/cities_airports',
        type: 'GET',
        dataType: 'json',
        data: {query: query},
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
        base_url      = 'https://www.e-agencias.com.br/vivala/search/flight',
        defaultParams = {
            currency: 'BRL',
            site: 'BR',
            agency: 'vivala',
            from: '',                /* 3 uppercased characters */
            to: '',                  /* 3 uppercased characters */
            departureDate: '',       /* YYYY-mm-dd */
            returnDate: null,        /* YYYY-mm-dd */
            adults: 0,               /* Quantidade de adultos */
            infant: 0,               /* Quantidade de crianças até 11 anos */
            children: 0,             /* Quantidade de crianças até 24 meses viajando no colo */
            sortBy: null,            /* ['personal_ascending'|'duration_ascending'|'stopscount_ascending'|'stopscount_descending'|'total_price_ascending'|'total_price_descending'] */
            facet: {
                stops: null,
                airlines: null,
                inboundTime: null,
            }
        };

    $.extend(defaultParams, params);

    $.ajaxSetup({
        headers: { 
            'Access-Control-Allow-Origin': '*'
        }
    });

    $.ajax({
        url: base_url,
        type: 'GET',
        dataType: 'json',
        data: defaultParams,
    })
    .done(function(data) {
        console.log(data);
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
        $(select).append(option);
    }
    return select;
};