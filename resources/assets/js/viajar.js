'use strict';

// Coloca intervalo nas datas de busca de voo
$('#idavolta-hotel.input-daterange input').datepicker({
    format: "dd/mm/yyyy",
    todayBtn: true,
    language: "pt-BR",
    multidateSeparator: "to",
    todayHighlight: true
});

$(".mostraCriancasVoos").change(function() {
    var qtdCriancas = this.value;
    $(".idade-criancas").hide();
    for(var i=0;i<=qtdCriancas;i++) {
        $('.idade-criancas[data-child-id="'+i+'"]').show();
    }
});

$("form#buscaVoos").submit(function(e) {
    e.preventDefault();

    var form = $(this),
        origem = form.find("#origem-voo-id").val(),
        destino = form.find("#destino-voo-id").val(),
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
    searchFlight(opcoes);

});

$("form#busca-hoteis").submit(function(e){
    e.preventDefault();

    var form = $(this),
        destino = form.find("#destino-hotel-id").val(),
        dataPartida = form.find("#data-partida-hotel").val(),
        dataRetorno = form.find("#data-retorno-hotel").val();
       /* qtdAdultos = form.find("#qtdAdultosVoos").val(),
        qtdCriancas = form.find("#qtdCriancasVoos").val(),
        qtdAdultosTotal = qtdAdultos;
*/

    // Formata a data
    dataPartida = dataPartida.split('/').reverse().join('-');  
    dataRetorno = dataRetorno.split('/').reverse().join('-');  
    // Conta quantas tarifas de crianças jovens e adultos serão cobradas
/*    for(var i=0;i<=qtdCriancas;i++) {
        var tipoTarifa = form.find('.idade-criancas[data-child-id="'+i+'"]').val();
        if(tipoTarifa == "b")
          qtdBebesTotal++;
        else if(tipoTarifa == "j")
          qtdJovensTotal++;
        else if (tipoTarifa == "a")
          qtdAdultosTotal++;
    }
*/
    var opcoes = {
        destination:    destino,
        checkin:        dataPartida,
        checkout:       dataRetorno,
        distribution:   '1'
    };

    console.log(opcoes);
    searchHotels(opcoes);

});

// Atualiza o iframe do checkout com a url recebida por parametro
var chamaCheckout = function(url) {
    $('.modal').on('shown.bs.modal',function(){      //correct here use 'shown.bs.modal' event which comes in bootstrap3
      $(this).find('iframe').attr('src', url)
    });
    $('.modal').modal({show:true});
};

// Atualiza o iframe do checkout com a url recebida por parametro
$('.ativa-modal-quimera').on('click', function() {
    var url = $(this).data('url');
    $('#modal-quimera.modal').on('shown.bs.modal',function(){      //correct here use 'shown.bs.modal' event which comes in bootstrap3
      $(this).find('iframe').attr('src', url)
    });
    $('#modal-quimera.modal').modal({show:true});
});

// Mostra as quantidades de adulto e criança para cada quarto
$("#qtd-quartos-hotel").change(function() {
  var qtdQuartos = this.value;
  $('.qtd-quartos').hide();
  for(var i=0; i<=qtdQuartos; i++) {
      $('.qtd-quartos[data-room-id="'+i+'"]').show();
      console.log($('.qtd-quartos[data-room-id="'+i+'"]'));
      // Gambizinha pra esconder o quarto 1 quando abre o form
      $('.qtd-quartos[data-room-id="'+i+'"] label').show();
  }
});


$(document).ready(function($) {

    /*
     * VOOS
     */

    // Binda keydown da origem pra procurar aeroportos 
    // e cidades quando entrar mais que 3 chars
    var autocompleteTimeout = null;
    $('input#origem-voo').on('keyup', function() {
        var value = $(this).val(),
            lista = $('#lista-origem-voo .flight-list'),
            container = $('#lista-origem-voo');  

        container.show();
        //Insere icone de loading
        $(this).siblings('i.fa').show();

        if (autocompleteTimeout > 0) {
            clearTimeout(autocompleteTimeout);
        }
        if (value.length >= 3) {
            autocompleteTimeout = setTimeout(autocompleteFlights, 500, value, '#origem-voo', container, lista); 
        } else {
            lista.remove();
            container.hide();
            $(this).siblings('i.fa').hide();
        }
    });

    // Binda keydown do destino pra procurar aeroportos 
    // e cidades quando entrar mais que 3 chars
    $('input#destino-voo').on('keyup', function() {
        var value = $(this).val(),
            lista = $('#lista-destino-voo .flight-list'),
            container = $('#lista-destino-voo');

        container.show();
        //Ativa icone de loading
        $(this).siblings('i.fa').show();

        if (autocompleteTimeout > 0) {
            clearTimeout(autocompleteTimeout);
        }
        if (value.length >= 3) {
            autocompleteTimeout = setTimeout(autocompleteFlights, 500, value, '#destino-voo', container, lista);
        } else {
            lista.remove();
            container.hide();
            $(this).siblings('i.fa').hide();
        }
    });


    /*
     * Hotéis
     */

    // Binda keydown da origem pra procurar hoteis 
    // e cidades quando entrar mais que 3 chars
    $('input#destino-hotel').on('keyup', function() {
        var value = $(this).val(),
            lista = $('#lista-destino-hotel .hotel-list'),
            container = $('#lista-destino-hotel');

        container.show();
        //Insere icone de loading
        $(this).siblings('i.fa').show();

        if (autocompleteTimeout > 0) {
            clearTimeout(autocompleteTimeout);
        }
        if (value.length >= 3) {
            autocompleteTimeout = setTimeout(autocompleteHotels, 500, value, '#destino-hotel', container, lista);
        } else {
            lista.remove();
            $(this).siblings('i.fa').hide();
            container.hide();
        }
    });
});
