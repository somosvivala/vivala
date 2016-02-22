var buscaPerfil = (function() {
    'use strict';

    var ajaxCall,

        ajaxBusca = function(target, container) {

            var url  = $(target).data('url')+'/perfilcontroller/query-list',
                rect = $(target)[0].getBoundingClientRect(),
                pos  = [rect.top + rect.height, rect.left];

            console.log(pos);

            if (ajaxCall != null && ajaxCall.state() == 'pending') {
                ajaxCall.abort();
            }

            ajaxCall = $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                data: {query: $(target).val()},
            })
            .done(function(data) {
                var element = document.createElement('div');
                $(element).addClass('list-group perfil-list')
                    .css('top', pos[0])
                    .css('left', pos[1])
                    .html(data);

                $(target).append(element);
                $(container).find('div.perfil-list').remove();
                $(container).append(element);
            });
            
        },

        autocompleteTimeout,

        init = function() {
            var input = $('.busca-geral-menu');

            $(input).on('keypress', function() {
                ajaxBusca(this);
            });

            $(input).on('keyup', function() {
                var value = $(this).val(),
                    lista = $('div.perfil-list'),
                    container = $('div.menu-principal');

                if (autocompleteTimeout!= null && autocompleteTimeout > 0) {
                    clearTimeout(autocompleteTimeout);
                }
                if (value.length >= 3) {
                    autocompleteTimeout = setTimeout(ajaxBusca, 500, this, container);
                } else {
                    lista.remove();
                }
            });
        };
        init();

}());