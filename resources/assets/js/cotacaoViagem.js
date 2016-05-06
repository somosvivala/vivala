"use strict";

// Pegando a lingua ativa no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];
switch(linguaAtiva){
  case 'en':
  break;
  case 'pt':
  break;
  default:
}

// Retirando click OutOfArea da modal
$('#cotacao-viagem').modal({
    backdrop: 'static',
    keyboard: false
});

// var ajaxFormCotacao = function(){
//   var origem, destino, data-ida,
//       data-volta, data-flexivel,
//       qtd-adultos, qtd-criancas,
//       melhor-periodo;
//
//   ajax = $.ajax({
//     url: '',
//     type: 'POST',
//     dataType: 'html',
//     data: defaultParams,
//   })
//   .done(function(){})
//   .fail(function(){});
//}
