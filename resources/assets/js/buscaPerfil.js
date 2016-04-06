'use strict';

jQuery(document).ready(function($) {

  var bindUpDown = function(element, evt) {

      var keyCode = evt.keyCode,
          element = $(element).find('.perfil-list');

      if (keyCode === 40 || keyCode === 38) {
          var listItem = $('a.autocomplete-buscaperfil.list-focus').attr('data-order'),
              lastItem = $('a.autocomplete-buscaperfil:last').attr('data-order');

          if (listItem === undefined) {
              if (keyCode === 40)
                  $('a.autocomplete-buscaperfil[data-order=0]').addClass('list-focus');
              else
                  $('a.autocomplete-buscaperfil[data-order='+lastItem+']').addClass('list-focus');
          } else {
              $('a.autocomplete-buscaperfil[data-order='+listItem+']').removeClass('list-focus');
              if (keyCode === 40) {
                  if (listItem == lastItem) {
                      $('a.autocomplete-buscaperfil[data-order=0]').addClass('list-focus');
                  }
                  else {
                      $('a.autocomplete-buscaperfil[data-order='+(parseInt(listItem)+1)+']').addClass('list-focus');
                  }
              } else {
                  if (listItem == 0)
                      $('a.autocomplete-buscaperfil[data-order='+lastItem+']').addClass('list-focus');
                  else
                      $('a.autocomplete-buscaperfil[data-order='+(listItem-1)+']').addClass('list-focus');
              }
          }

      } else {
          if (keyCode === 13) {
            // Precisa ser continuado após implementação da buscaTodosPerfis
            $('#busca-geral-menu').focus();
          }
      }
  };
  
  var buscaPerfil = (function() {
      var ajaxCall,

          ajaxBusca = function(target, container) {

              var url  = $(target).data('url')+'/perfilcontroller/query-list',
                  rect = $(target)[0].getBoundingClientRect(),
                  pos  = [rect.top + rect.height, rect.left];

              if (ajaxCall != null && ajaxCall.state() == 'pending') {
                  ajaxCall.abort();
              }

              $(target).siblings('i.fa').show();
              ajaxCall = $.ajax({
                  url: url,
                  type: 'GET',
                  dataType: 'html',
                  data: {query: $(target).val()},
              })

              .done(function(data) {
                  $(target).siblings('i.fa').hide();
                  var element = document.createElement('div');
                  $(element).addClass('list-group perfil-list')
                      .css('top', pos[0])
                      .css('left', pos[1])
                      .css('position', 'absolute')
                      .css('z-index', '2')
                      .html(data);
                  $(target).append(element);
                  $(container).find('div.perfil-list').remove();
                  $(container).append(element);
              });

          },

          autocompleteTimeout,

          init = function() {
              var input = $('#busca-geral-menu');

              $(input).on('keydown', function(e) {
                if($(this).val().length >= 3){
                  ajaxBusca(this);
                }
                  bindUpDown(this, e);
              });

              $(input).on('keyup', function(e) {
                  var value = $(this).val(),
                      lista = $('ul.perfil-list'),
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
});
