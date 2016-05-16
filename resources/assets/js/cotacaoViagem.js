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
  /* FORM BÁSICO */
  // Icones Superiores
  var ativaFormVoos = $('#ativa-form-voos'),
      ativaFormOnibus = $('#ativa-form-onibus'),
      ativaFormHospedagem = $('#ativa-form-hospedagem'),
      ativaFormCarros = $('#ativa-form-carros'),
      formBasico = $('#cotacao-basica'),
      formBasicoValue =  $(formBasico).attr("data-value"),
      formHospedagem = $('#cotacao-hotel'),
      formHospedagemValue = $(formHospedagem).attr("data-value"),
      formCarros = $('#cotacao-veiculos'),
      formCarrosValue = $(formHospedagem).attr("data-value");
      formBtnEnviar = $('#cotacao-enviar');

    $(ativaFormVoos).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').val(1);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
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
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-onibus').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
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
        ativaForm(formBtnEnviar, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        formHospedagemValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formHospedagem).attr("data-value", formHospedagemValue);
        $('input#cotacao-hospedagem').val(0);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
      }
    });
    $(ativaFormCarros).bind('click', function(){
      var tooltipFormCarros = new Tooltip({
        target: ativaFormCarros,
        content: "TESTE",
        classes: 'tooltip-theme-arrows',
        position: 'right middle'
      });
    });


  // Mais Destinos
  var ativaMaisDestinos = $('#ativa-mais-destinos');

    $(ativaMaisDestinos).bind('click', function(){
    });

  // Datas Flexíveis
  var dataFlexivel = $('#data-flexivel'),
      datasFlexiveis = $('#datas-flexiveis');
    $(dataFlexivel).click(function() {
        if (this.checked) $(datasFlexiveis).val(1);
        else if(!this.checked) $(datasFlexiveis).val(0);
    });

  // Quantidade Viajantes - Adultos e Crianças
  var qtdAdultos = $('#qtd-adultos'),
      qtdCriancas = $('#qtd-criancas'),
      nroAdultos = $('input#nro-adultos'),
      nroCriancas = $('input#nro-criancas');

        $(qtdAdultos).change(function(){
          $(nroAdultos).val(this.value);
        });
        $(qtdCriancas).change(function(){
          $(nroCriancas).val(this.value);
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

  /* FORM HOSPEDAGEM */
  // Quantidade de Quartos
  var hospQtdQuartos = $('#qtd-quartos-hotel'),
      hospNroQuartos = $('input#nro-quartos-hotel');

      $(hospQtdQuartos).change(function(){
        $(hospNroQuartos).val(this.value);
      });

  // Adicionais do Hotel
  var AdcCafe = $('#adicional-cafe'), hospAdcCafe = $('input#hospedagem-adicional-cafe'),
      AdcWifi = $('#adicional-wifi'), hospAdcWifi = $('input#hospedagem-adicional-wifi'),
      AdcArCondicionado = $('#adicional-ar-condicionado'), hospAdcArCondicionado = $('input#hospedagem-adicional-ar-condicionado'),
      AdcTvCabo = $('#adicional-tv-cabo'), hospAdcTvCabo = $('input#hospedagem-adicional-tv-cabo'),
      AdcCancelamento = $('#adicional-cancelamento'), hospAdcCancelamento = $('input#hospedagem-adicional-cancelamento'),
      AdcAnimal = $('#adicional-animal'), hospAdcAnimal = $('input#hospedagem-adicional-animal'),
      AdcAcademia = $('#adicional-academia'), hospAdcAcademia = $('input#hospedagem-adicional-academia'),
      AdcPiscina = $('#adicional-piscina'), hospAdcPiscina = $('input#hospedagem-adicional-piscina'),
      AdcEstacionamento = $('#adicional-estacionamento'), hospAdcEstacionamento = $('input#hospedagem-adicional-estacionamento'),
      AdcBanheiroPrivativo = $('#adicional-banheiro-privativo'), hospAdcBanheiroPrivativo = $('input#hospedagem-adicional-banheiro-privativo'),
      AdcVaranda = $('#adicional-varanda'), hospAdcVaranda = $('input#hospedagem-adicional-varanda'),
      AdcTranslado = $('#adicional-translado'), hospAdcTranslado = $('input#hospedagem-adicional-translado');

        $(AdcCafe).click(function() {
            if (this.checked) $(hospAdcCafe).val(1);
            else if(!this.checked) $(hospAdcCafe).val(0);
        });
        $(AdcWifi).click(function() {
            if (this.checked) $(hospAdcWifi).val(1);
            else if(!this.checked) $(hospAdcWifi).val(0);
        });
        $(AdcArCondicionado).click(function() {
            if (this.checked) $(hospAdcArCondicionado).val(1);
            else if(!this.checked) $(hospAdcArCondicionado).val(0);
        });
        $(AdcTvCabo).click(function() {
            if (this.checked) $(hospAdcTvCabo).val(1);
            else if(!this.checked) $(hospAdcTvCabo).val(0);
        });
        $(AdcCancelamento).click(function() {
            if (this.checked) $(hospAdcCancelamento).val(1);
            else if(!this.checked) $(hospAdcCancelamento).val(0);
        });
        $(AdcAnimal).click(function() {
            if (this.checked) $(hospAdcAnimal).val(1);
            else if(!this.checked) $(hospAdcAnimal).val(0);
        });
        $(AdcAcademia).click(function() {
            if (this.checked) $(hospAdcAcademia).val(1);
            else if(!this.checked) $(hospAdcAcademia).val(0);
        });
        $(AdcPiscina).click(function() {
            if (this.checked) $(hospAdcPiscina).val(1);
            else if(!this.checked) $(hospAdcPiscina).val(0);
        });
        $(AdcEstacionamento).click(function() {
            if (this.checked) $(hospAdcEstacionamento).val(1);
            else if(!this.checked) $(hospAdcEstacionamento).val(0);
        });
        $(AdcBanheiroPrivativo).click(function() {
            if (this.checked) $(hospAdcBanheiroPrivativo).val(1);
            else if(!this.checked) $(hospAdcBanheiroPrivativo).val(0);
        });
        $(AdcVaranda).click(function() {
            if (this.checked) $(hospAdcVaranda).val(1);
            else if(!this.checked) $(hospAdcVaranda).val(0);
        });
        $(AdcTranslado).click(function() {
            if (this.checked) $(hospAdcTranslado).val(1);
            else if(!this.checked) $(hospAdcTranslado).val(0);
        });

  /* FORM CARROS */
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
