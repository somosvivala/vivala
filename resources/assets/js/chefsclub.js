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
        page     = $('.detalhes-lista').attr('data-page'),
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
            data: data,
            page: page
        },
    })
    .done(function(data) {
        $('.detalhes-lista').remove();
        $('div#restaurantes').append(data);

        $('button.prev-restaurantes').on('click', function(){
            $(this).parents('.detalhes-lista').attr('data-page', parseInt($(this).parents('.detalhes-lista').attr('data-page'))-1);
            ajaxChefsClub();
        });
        $('button.next-restaurantes').on('click', function(){
            $(this).parents('.detalhes-lista').attr('data-page', parseInt($(this).parents('.detalhes-lista').attr('data-page'))+1);
            ajaxChefsClub();
        });
    });

};

jQuery(document).ready(function($) {
    var init = function() {
        $('#chefsclub-filtros select').on('change', function() {
            $('div.detalhes-lista').attr('data-page', 1);
            ajaxChefsClub();
        });
        $('input#dataRestaurante').on('changeDate', function() {
            $('div.detalhes-lista').attr('data-page', 1);
            ajaxChefsClub();
        });

        $('button.prev-restaurantes').on('click', function(){
            $(this).parents('.detalhes-lista').attr('data-page', parseInt($(this).parents('.detalhes-lista').attr('data-page'))-1);
            ajaxChefsClub();
        });
        $('button.next-restaurantes').on('click', function(){
            $(this).parents('.detalhes-lista').attr('data-page', parseInt($(this).parents('.detalhes-lista').attr('data-page'))+1);
            ajaxChefsClub();
        });
    };
    init();
});
