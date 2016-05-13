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
// Icones Superiores
  var   ativaFormVoos = $('#ativa-form-voos'),
        ativaFormOnibus = $('#ativa-form-onibus'),
        ativaFormHospedagem = $('#ativa-form-hospedagem'),
        ativaFormCarros = $('#ativa-form-carros'),
        formBasico = $('#cotacao-basica'),
        formBasicoValue =  $(formBasico).attr("data-value"),
        formHospedagem = $('#cotacao-hotel'),
        formHospedagemValue = $(formHospedagem).attr("data-value");
        formCarros = $('#cotacao-veiculos'),
        formCarrosValue = $(formHospedagem).attr("data-value");

  $(ativaFormVoos).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      $('input#cotacao-voos').val(1);
      ativaForm(formBasico, formBasicoValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      $(formBasico).attr("data-value", formBasicoValue);
      $('input#cotacao-voos').val(0);
      ativaForm(formBasico, formBasicoValue);
    }
  });
  $(ativaFormOnibus).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      $('input#cotacao-onibus').val(1);
      ativaForm(formBasico, formBasicoValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      $(formBasico).attr("data-value", formBasicoValue);
      $('input#cotacao-onibus').val(0);
      ativaForm(formBasico, formBasicoValue);
    }
  });
  $(ativaFormHospedagem).bind('click', function() {
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      formBasicoValue++;
      formHospedagemValue++;
      $(formBasico).attr("data-value", formBasicoValue);
      $(formHospedagem).attr("data-value", formHospedagemValue);
      $('input#cotacao-hospedagem').val(1);
      ativaForm(formBasico, formBasicoValue);
      ativaForm(formHospedagem, formHospedagemValue);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      formBasicoValue--;
      formHospedagemValue--;
      console.log(formHospedagemValue);
      $(formBasico).attr("data-value", formBasicoValue);
      $(formHospedagem).attr("data-value", formHospedagemValue);
      $('input#cotacao-hospedagem').val(0);
      ativaForm(formBasico, formBasicoValue);
      ativaForm(formHospedagem, formHospedagemValue);
    }
  });
  $(ativaFormCarros).bind('click', function(){
    var tooltipFormCarros = new Tooltip({
      target: ativaFormCarros,
      content: "OOLAR.",
      classes: 'tooltip-theme-arrows',
      position: 'right middle'
    });
  });

// Mais Destinos
  var ativaMaisDestinos = $('#ativa-mais-destinos');

  $(ativaMaisDestinos).bind('click', function(){
  });

// Icones de Tempo
  var ativaTempoManha = $('#ativa-tempo-manha'),
      ativaTempoTarde = $('#ativa-tempo-tarde'),
      ativaTempoNoite = $('#ativa-tempo-noite'),
      ativaTempoMadrugada = $('#ativa-tempo-madrugada');

  $(ativaTempoManha).bind('click', function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      $('input#pref-tempo-manha').val(1);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      $('input#pref-tempo-manha').val(0);
    }
  });
  $(ativaTempoTarde).bind('click', function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      $('input#pref-tempo-tarde').val(1);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      $('input#pref-tempo-tarde').val(0);
    }
  });
  $(ativaTempoNoite).bind('click', function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      $('input#pref-tempo-noite').val(1);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      $('input#pref-tempo-noite').val(0);
    }
  });
  $(ativaTempoMadrugada).bind('click', function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
      $('input#pref-tempo-madrugada').val(1);
    }
    else{
      $(this).removeClass('active');
      $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
      $('input#pref-tempo-madrugada').val(0);
    }
  });

// Horarios Restritos
  var ativaHorarioRestrito = $('#ativa-horario-restrito'),
      campoHorarioRestrito = $('#campo-horario-restrito');

  $(ativaHorarioRestrito).bind('click', function(){
    if(!$(this).hasClass('active')){
      $(this).addClass('active');
      $(campoHorarioRestrito).removeClass('hidden');
    }
    else{
      $(this).removeClass('active');
      $(campoHorarioRestrito).addClass('hidden');
      $(campoHorarioRestrito).val('');
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
