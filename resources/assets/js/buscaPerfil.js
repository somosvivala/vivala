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
                    // Cria a lista para receber os perfis encontrados na busca
                    var element = document.createElement('ul');
                    $(element).addClass('list-group perfil-list')
                        .css('top', pos[0])
                        .css('left', pos[1])
                        .css('position', 'absolute')
                        .css('z-index', '2')
                        .html(data);

                    // Coloco a lista dentro do target, que é a Barra de Busca
                    $(target).append(element);

                    // Remove o elemento antigo (busca antiga) caso possua
                    $(container).find('ul.perfil-list').remove();

                    // Adiciono a busca nova dentro da lista de perfis
                    $(container).append(element);
                  }
                  // Se a busca não retornou perfil algum
                  else{
                    // Remove o elemento antigo (busca antiga) caso possua
                    $(container).find('ul.perfil-list').remove();
                    var arrayLingua = [];

                    switch(linguaAtiva){
                        case 'en':
                            arrayLingua[1] = 'Ops!';
                            arrayLingua[2] = 'Your search has returned no profiles!<br/>Please consider and try other names.';
                        break;
                        case 'pt':
                            arrayLingua[1] = 'Opa!';
                            arrayLingua[2] = 'Sua busca não retornou perfil algum!<br/>Por favor, tente outros nomes.';
                        break;
                        default:
                            arrayLingua[1] = 'Opa!';
                            arrayLingua[2] = 'Sua busca não retornou perfil algum!<br/>Por favor, tente outros nomes.';
                    }
                    swal({
                        title: arrayLingua[1],
                        html: arrayLingua[2],
                        type: "error",
                        confirmButtonColor: "#FF5B00",
                        confirmButtonText: "OK",
                        closeOnConfirm: true,
                    });
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
                      lista = $('ul.perfil-list'),
                      container = $('div.menu-principal');

                  if (autocompleteTimeout!= null && autocompleteTimeout > 0) {
                      clearTimeout(autocompleteTimeout);
                  }
                  if (value.length >= 3) {
                      autocompleteTimeout = setTimeout(ajaxBusca, 1000, this, container);
                  } else {
                      lista.remove();
                  }
              });
          };
          init();
  }());

});
