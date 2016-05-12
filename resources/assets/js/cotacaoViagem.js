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

var ativaForm = function(container, val){
  if(val < 1){
    $(container).addClass('hidden');
  }
  else if(val >= 1){
    $(container).removeClass('hidden');
  }
}

var bindaFormCotaViagem = function() {
  var formBasico = $('#cotacao-basica'),
      formBasicoValue =  $('#cotacao-basica').data("value"),
      formHospedagem = $('#cotacao-hospedagem'),
      formHospedagemValue = $('#cotacao-hospedagem').data("value"),
      ativaFormVoos = $('#ativa-form-voos'),
      ativaFormOnibus = $('#ativa-form-onibus'),
      ativarFormHospedagem = $('#ativa-form-hospedagem'),
      ativarFormCarros = $('#ativa-form-carros');

  $(ativaFormVoos).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
    }
  });
  $(ativaFormOnibus).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
    }
  });
  $(ativarFormHospedagem).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      formHospedagemValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
      $(formHospedagem).attr("data-value", formHospedagemValue);
      ativaForm(formHospedagem, formHospedagemValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      formHospedagemValue--;
      $(formBasico).attr("data-value", formBasicoValue);
      ativaForm(formBasico, formBasicoValue);
      $(formHospedagem).attr("data-value", formHospedagemValue);
      ativaForm(formHospedagem, formHospedagemValue);
    }
  });

}

jQuery(document).ready(function($) {
  bindaFormCotaViagem();
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
