'use strict';

jQuery(document).ready(function($) {
  // Tradução
  var linguaAtiva = $("meta[name=language]").attr("content");

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

              // Se ajaxCall é diferente de NULO ou o estado dele é PENDING -> Abortar
              if (ajaxCall != null && ajaxCall.state() == 'pending') {
                  ajaxCall.abort();
              }

              // Mostra o icon de loading
              $(target).siblings('i.fa').show();

              ajaxCall = $.ajax({
                  url: url,
                  type: 'GET',
                  dataType: 'html',
                  data: {
                    query: $(target).val()
                  },
              })

              .success(function(data) {
                  // Esconde o icon de loading
                  $(target).siblings('i.fa').hide();

                  // Se a busca retornou algum perfil
                  if($(data).hasClass("list-group-item")){

                    // Cria o background shadow para receber os perfis encontrados na busca
                    // var bgelement = document.createElement('div'),
                    // body = document.body, html = document.documentElement,
                    // width = document.body.clientWidth,
                    // height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
                    //
                    // $(bgelement).addClass('background-shadow')
                    //     .css('top', pos[0])
                    //     .css('left', 0)
                    //     .css('position', 'absolute')
                    //     .css('z-index', '2')
                    //     .css('background-color','rgba(0,0,0,.1)')
                    //     .css('width', width)
                    //     .css('height', height);

                    // Cria a lista para receber os perfis encontrados na busca
                    var element = document.createElement('ul');
                    $(element).addClass('list-group perfil-list')
                        .css('top', pos[0])
                        .css('left', pos[1])
                        .css('position', 'absolute')
                        .css('z-index', '2')
                        .html(data);

                    // Coloco o background-shadow dentro do target, que é a Barra de Busca
                    //$(target).append(bgelement);

                    // Coloco a lista dentro do target, que é a Barra de Busca
                    $(target).append(element);

                    // Remove o elemento antigo (background-shadow) caso possua
                    //$(container).find('div.background-shadow').remove();

                    // Remove o elemento antigo (busca antiga) caso possua
                    $(container).find('ul.perfil-list').remove();

                    // Adiciono o background-shadow novo dentro da lista de perfis
                    //$(container).append(bgelement);

                    // Adiciono a busca nova dentro da lista de perfis
                    $(container).append(element);
                  }
                  // Se a busca não retornou perfil algum
                  else{
                    var arrayLingua = [];
                    switch(linguaAtiva){
                        case 'en':
                            arrayLingua[0] = 'Your search has returned no profiles!'
                        break;
                        case 'pt':
                            arrayLingua[0] = 'Sua busca não retornou perfil algum!'
                        break;
                        default:
                            arrayLingua[0] = 'Sua busca não retornou perfil algum!'
                    }
                    var element = document.createElement('ul');
                    $(element).addClass('list-group perfil-list')
                        .css('top', pos[0])
                        .css('left', pos[1])
                        .css('position', 'absolute')
                        .css('z-index', '2')
                        .css('background-color', '#FFF')
                        .css('border', '1px solid #ddd');

                    $(element).append(arrayLingua[0]);

                    // Coloco a lista dentro do target, que é a Barra de Busca
                    $(target).append(element);

                    // Remove o elemento antigo (busca antiga) caso possua
                    $(container).find('ul.perfil-list').remove();

                    // Adiciono a busca nova dentro da lista de perfis
                    $(container).append(element);
                  }
              })

              .error(function(data){
                // Esconde o icon de loading
                $(target).siblings('i.fa').hide();
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
                      bglista = $('div.background-shadow');
                      lista = $('ul.perfil-list'),
                      container = $('div.menu-principal');

                  if (autocompleteTimeout!= null && autocompleteTimeout > 0) {
                      clearTimeout(autocompleteTimeout);
                  }
                  if (value.length >= 3) {
                      autocompleteTimeout = setTimeout(ajaxBusca, 700, this, container);
                  } else {
                      lista.remove();
                      bglista.remove();
                  }
              });
          };
          init();
  }());

});
