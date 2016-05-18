'use strict';

jQuery(document).ready(function($) {
    var init = function() {
        $('.header-mobile a').on('click', function() {
            $('#conheca-vivala').addClass('ativo');
        });

        $('.desativa-parent').on('click', function(e) {
            console.log($(e.target.parentNode));
            $(e.target.parentNode).removeClass('ativo');
        });
    };
    init();
});
