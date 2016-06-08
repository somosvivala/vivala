'use strict';

jQuery(document).ready(function($) {
    var init = function() {
        $('.conheca-popup').on('click', function() {
            $('#conheca-vivala').addClass('ativo');
        });

        $('.link-voltar').on('click', function() {
            window.history.back();
        });

        $('.desativa-conheca').on('click', function(e) {
            $('#conheca-vivala').removeClass('ativo');
        });
    };
    init();
});
