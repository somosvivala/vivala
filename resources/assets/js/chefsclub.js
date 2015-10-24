'use strict';

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
});

var ajaxChefsClub = function() {
    var tipo     = $('#chefsclub-filtros select#tipo-cozinha option:selected').val(),
        desconto = $('#chefsclub-filtros select#porcentagem-desconto option:selected').val(),
        horario  = $('#chefsclub-filtros select#horaRestaurante option:selected').val(),
        qtd      = $('#chefsclub-filtros select#qtd-pessoas option:selected').val(),
        data     = $('input#dataRestaurante').val(),
        cidade   = $('#chefsclub-filtros select#cidade-restaurante option:selected').val();

    $.ajax({
        url: 'viajar/filtro',
        type: 'POST',
        dataType: 'html',
        data: {
            tipo: tipo,
            desconto: desconto,
            cidade: cidade,
            qtd: qtd,
            horario: horario,
            data: data
        },
    })
    .done(function(data) {
        $('.detalhes-lista').remove();
        $('div#restaurantes').append(data);
    });
    
};

jQuery(document).ready(function($) {
    var init = function() {
        $('#chefsclub-filtros select').on('change', ajaxChefsClub);
        $('input#dataRestaurante').on('changeDate', ajaxChefsClub);
    };
    init();
});