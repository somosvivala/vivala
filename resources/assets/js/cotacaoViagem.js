"use strict";

// Pegando a lingua ativa na view no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];
switch(linguaAtiva){
  case 'en':
    lingua[0] = 'Trip estimate send with success!',
    lingua[1] = 'Our team will do everything to find the trip that fits more with you!',
    lingua[2] = 'A reply email about your trip is coming soon, stay tuned to your mailbox.'
  break;
  case 'pt':
    lingua[0] = 'Cotação enviada com sucesso!',
    lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.'
  break;
  default:
  lingua[0] = 'Cotação enviada com sucesso!',
  lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
  lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.'
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

  // Token do laravel para Ajax
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
     }
  });

  $('#form-cotar-viagens').submit(function (ev) {
    ev.defaultPrevented;
    var frm = $(this),
        dataForm = new FormData(this),
        callbackFunction = frm.data('callback'),
        loading = frm.data('loading');

    if (loading && loading != "") {
        $('input:submit').hide();
        $('#'+loading).show();
    }

    $.ajax({
        url: frm.attr('url'),
        type: frm.attr('method'),
        data: dataForm,
        contentType: "application/json; charset=utf-8",
        //dataType: ,
        //processData: ,
        success: function (data) {
            if(callbackFunction) {
              swal({
                  title: lingua[0],
                  html: lingua[1]+"<br/><br/>"+lingua[2],
                  type: "success",
                  confirmButtonColor: "#FF5B00",
                  confirmButtonText: "OK",
                  closeOnConfirm: true,
              });
              document.getElementById('form-cotar-viagens').reset();
              $('#modal-cotacao-viagem').modal('hide');
            }
            if(redirect) {
                window.location = redirect;
            }
        },
       complete: function (data) {
         //Se tiver loading e tiver dado erro, voltar botao
         if (loading && loading != "") {
             $('input:submit').show();
             $('#'+loading).hide();
         }
       }
    });

  });

});
