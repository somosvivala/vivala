"use strict";

// Pegando a lingua ativa na view no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];
switch(linguaAtiva){
  case 'en':
    lingua[0] = 'Trip estimate send with success!',
    lingua[1] = 'Our team will do everything to find the trip that fits more with you!',
    lingua[2] = 'A reply email about your trip is coming soon, stay tuned to your mailbox.',
    lingua[3] = 'It wasn\'t possible to estimate your trip',
    lingua[4] = 'An error occurred in our system and your trip estimate can\'t be send!',
    lingua[5] = 'We apologize for the inconvenience and ask you to try again later.',
    lingua[6] = 'If you choose <strong style="color:#FF5B00;">FLIGHTS + HOSTING</strong> option we can get a <strong>35%</strong> discount on CAR rental amount.'
    lingua[7] = 'Very Little',
    lingua[8] = 'Little',
    lingua[9] = 'Moderate',
    lingua[10] = 'Much',
    lingua[11] = 'Very Much'
  break;
  case 'pt':
    lingua[0] = 'Cotação enviada com sucesso!',
    lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.',
    lingua[3] = 'Não foi possível realizar a sua cotação',
    lingua[4] = 'Um erro ocorreu em nosso sistema e sua cotação não pode ser enviada!',
    lingua[5] = 'Pedimos desculpas pelo transtorno e pedimos que tente novamente mais tarde.',
    lingua[6] = 'Caso você faça a cotação de <strong style="color:#FF5B00;">VÔOS + HOSPEDAGEM</strong> conseguimos um desconto de <strong>35%</strong> no valor do aluguel do CARRO!'
    lingua[7] = 'Pouquíssimo',
    lingua[8] = 'Pouco',
    lingua[9] = 'Moderado',
    lingua[10] = 'Muito',
    lingua[11] = 'Muitíssimo'
  break;
  default:
    lingua[0] = 'Cotação enviada com sucesso!',
    lingua[1] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[2] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.',
    lingua[3] = 'Não foi possível realizar a sua cotação',
    lingua[4] = 'Um erro ocorreu em nosso sistema e sua cotação não pode ser enviada!',
    lingua[5] = 'Pedimos desculpas pelo transtorno e pedimos que tente novamente mais tarde.',
    lingua[6] = 'Caso você faça a cotação de <strong style="color:#FF5B00;">VÔOS + HOSPEDAGEM</strong> conseguimos um desconto de <strong>35%</strong> no valor do aluguel do CARRO!'
    lingua[7] = 'Pouquíssimo',
    lingua[8] = 'Pouco',
    lingua[9] = 'Moderado',
    lingua[10] = 'Muito',
    lingua[11] = 'Muitíssimo'
}

// Aplicando mascara nos campos de date para funcionar melhor com o calendário
$('.mascara-data').mask("00/00/0000");

// Ativa os forms que se encontram abaixo das opções principais
var ativaForm = function(container, val){
  if(val < 1) $(container).addClass('hidden');
  else if(val >= 1) $(container).removeClass('hidden');
}

// Previne o usuário de escolher a data da volta em dias anteriores a data da ida
var mudaDataIdaVolta = function(containerIda, containerVolta){
  $(containerIda).datepicker().on('changeDate', function() {
      $(containerVolta).datepicker('setStartDate', $(containerIda).datepicker('getDate') );
  });
}

// Colore dias anteriores do datepicker na abertura do mesmo
var coloreDatePickerDiasPassados = function(container){
  $(container).datepicker().on('focus', function(){
      $('.datepicker table tr td.disabled').addClass('datepicker-dia-anterior');
  });
}

// Tooltips de aviso que algumas features não estão prontas
var bindaTooltipsDesativados = function(){
  let bindaTooltipCarrosNaoFuncionando = new Tooltip({
    target: document.querySelector('#informe-cotacao-carros'),
    content: lingua[6],
    classes: 'tooltip-theme-twipsy',
    position: 'bottom middle'
  });
}

// Binda o formulário de Cotação de Viagens
var bindaFormCotaViagem = function() {
  /* FORM BÁSICO */
  // Icones Superiores
  var ativaFormVoos = $('#ativa-form-voos'),
      ativaFormOnibus = $('#ativa-form-onibus'),
      ativaFormHospedagem = $('#ativa-form-hospedagem'),
      ativaFormAlimentacao = $('#ativa-form-alimentacao'),
      ativaFormCarros = $('#ativa-form-carros'),
      formBasico = $('#cotacao-basica'),
      formBasicoValue =  $(formBasico).attr("data-value"),
      formHospedagem = $('#cotacao-hotel'),
      formHospedagemValue = $(formHospedagem).attr("data-value"),
      formAlimentacao = $('#cotacao-restaurantes'),
      formAlimentacaoValue = $(formAlimentacao).attr("data-value"),
      formCarros = $('#cotacao-veiculos'),
      formCarrosValue = $(formHospedagem).attr("data-value");
      formBtnEnviar = $('#cotacao-enviar');

    $(ativaFormVoos).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').attr('checked', true);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-voos').attr('checked', false);
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
        $('input#cotacao-onibus').attr('checked', true);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $('input#cotacao-onibus').attr('checked', false);
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
        $('input#cotacao-hospedagem').attr('checked', true);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        formHospedagemValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formHospedagem).attr("data-value", formHospedagemValue);
        $('input#cotacao-hospedagem').attr('checked', false);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formHospedagem, formHospedagemValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
    });
    $(ativaFormAlimentacao).bind('click', function() {
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        formAlimentacaoValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formAlimentacao).attr("data-value", formAlimentacaoValue);
        $('input#cotacao-alimentacao').attr('checked', true);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formAlimentacao, formAlimentacaoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        formAlimentacaoValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formAlimentacao).attr("data-value", formAlimentacaoValue);
        $('input#cotacao-alimentacao').attr('checked', false);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formAlimentacao, formAlimentacaoValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
    });
    $(ativaFormCarros).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        formBasicoValue++;
        formCarrosValue++;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formCarros).attr("data-value", formCarrosValue);
        $('input#cotacao-carros').attr('checked', true);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formCarros, formCarrosValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        formBasicoValue--;
        formCarrosValue--;
        $(formBasico).attr("data-value", formBasicoValue);
        $(formCarros).attr("data-value", formCarrosValue);
        $('input#cotacao-carros').attr('checked', false);
        ativaForm(formBasico, formBasicoValue);
        ativaForm(formCarros, formCarrosValue);
        ativaForm(formBtnEnviar, formBasicoValue);
      }
    });

  // Campo de data
  var basicoDataIda1 = $('#basico-data-ida-1'),
      basicoDataVolta1 = $('#basico-data-volta-1');
      coloreDatePickerDiasPassados(basicoDataIda1);
      coloreDatePickerDiasPassados(basicoDataVolta1);
      mudaDataIdaVolta(basicoDataIda1, basicoDataVolta1);

  // Hospedagem-x
  var dataHospdagem1 = $('#mais-hospedagem-1'),
      datasMaisHospedagem1 = $('#basico-mais-hospedagem-1');
    $(dataHospdagem1).click(function() {
        if(this.checked){
          $(datasMaisHospedagem1).val(1);
        }
        else if(!this.checked){
          $(datasMaisHospedagem1).val(0);
        }
    });

  // Mais Hospedagem
  var maisHospedagem1 = $('#basico-mais-hospedagem-1');
    $(maisHospedagem1).click(function() {
      if(this.checked) $(maisHospedagem1).val(1);
      else if(!this.checked) $(maisHospedagem1).val(0);
    });

  // Mais Destinos
  var ativaMaisDestinos = $('#ativa-mais-destinos');
    $(ativaMaisDestinos).bind('click', function(){
    });

  // Datas Flexíveis
  var dataFlexivel = $('#datas-flexiveis');
    $(dataFlexivel).click(function() {
        if(this.checked) $(dataFlexivel).val(1);
        else if(!this.checked) $(dataFlexivel).val(0);
    });

  // RangeSlider do Preço a se Gastar
  var qtoGastarNaViagem = $('#qto-gastar-viagem'),
      rangeSliderQtoGastar = $('#range-slider-quanto-gastar'),
      valueBubble = '<output class="rangeslider__value-bubble" />',
      $ruler = $('<div class="rangeslider__ruler" />');

  function getRulerRange(min, max, step) {
    var range = '';
    var i = 1;

    while(i <= (max+step)) {
      range += Array(i).join('$') + ' ';
      i = i + step;
    }
    return (range);
  }
  function updateValueBubble(pos, value, context) {
    pos = pos || context.position;
    value = value || context.value;
    switch(value){
      case 1:
        text = lingua[7];
        break;
      case 2:
        text = lingua[8];
        break;
      case 3:
        text = lingua[9];
        break;
      case 4:
        text = lingua[10];
        break;
      case 5:
        text = lingua[11];
        break;
      default:
        'N/A';
    }
    var $valueBubble = $('.rangeslider__value-bubble', context.$range);
    var tempPosition = pos + context.grabPos;
    var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

    if ($valueBubble.length) {
      $valueBubble[0].style.left = Math.ceil(position) + 'px';
      $valueBubble[0].innerHTML = text;
    }
  }

  $(rangeSliderQtoGastar).rangeslider({
    polyfill: false,
    onInit: function() {
      this.$range.append($(valueBubble));
      $ruler[0].innerHTML = getRulerRange(this.min, this.max, this.step);
      this.$range.prepend($ruler);
      updateValueBubble(null, null, this);
    },
    onSlide: function(pos, value) {
      updateValueBubble(pos, value, this);
      $(qtoGastarNaViagem).val(value);
    }
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
        $('input#pref-tempo-manha').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-manha').attr('checked', false);
      }
    });
    $(ativaTempoTarde).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-tarde').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-tarde').attr('checked', false);
      }
    });
    $(ativaTempoNoite).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-noite').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-noite').attr('checked', false);
      }
    });
    $(ativaTempoMadrugada).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-tempo-madrugada').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-tempo-madrugada').attr('checked', false);
      }
    });

  // Horarios Restritos
  var ativaHorarioRestrito = $('#ativa-horario-restrito'),
      campoHorarioRestrito = $('#campo-horario-restrito');

    $(ativaHorarioRestrito).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(campoHorarioRestrito).toggle('slow');
      }
      else{
        $(this).removeClass('active');
        $(campoHorarioRestrito).toggle('fast');
        $(campoHorarioRestrito).val('');
      }
    });

  /* FORM HOSPEDAGEM */
  // Mais informações
  var ativaInfoAdicional = $('#ativa-info-adicional'),
      campoInfoAdicional = $('#campo-info-adicional');

      $(ativaInfoAdicional).bind('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $(campoInfoAdicional).toggle('slow');
        }
        else{
          $(this).removeClass('active');
          $(campoInfoAdicional).toggle('fast');
          $(campoInfoAdicional).val('');
        }
      });

  /* FORM ALIMENTAÇÃO */
  // Icones de Tempo
  var ativaCafeDaManha = $('#ativa-cafe-da-manha'),
      ativaAlmoco = $('#ativa-almoco'),
      ativaJantar = $('#ativa-jantar');

    $(ativaCafeDaManha).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-cafe-da-manha').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-cafe-da-manha').attr('checked', false);
      }
    });
    $(ativaAlmoco).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-almoco').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-almoco').attr('checked', false);
      }
    });
    $(ativaJantar).bind('click', function(){
      if(!$(this).hasClass('active')){
        $(this).addClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-desativado').addClass('icone-externo-ativado');
        $('input#pref-jantar').attr('checked', true);
      }
      else{
        $(this).removeClass('active');
        $(this).find('i.fa-circle').removeClass('icone-externo-ativado').addClass('icone-externo-desativado');
        $('input#pref-jantar').attr('checked', false);
      }
    });

  // Adicionais de Alimentação

  /* FORM CARROS */
}

var ajaxGetModal = function () {
  $('#ativa-modal-cotacao-viagem').click(function() {
    console.log('Enviando submit do form');
    $.ajax({
        url: 'cotarviagem/data',
        type: 'POST',
        dataType: 'html',
    })
    .done(function(data) {
      console.log('Foi o ajax!');
      console.log(data);
       $('#teste').append(data);
       $('#modal-cotacao-viagem').modal('show');
    })
    .fail(function() {
      console.log('Falhou o ajax!');
    });
  });
}

jQuery(document).ready(function($) {
  bindaFormCotaViagem();
  bindaTooltipsDesativados();

  // Token do laravel para Ajax
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
        'Access-Control-Allow-Headers': '*'
     }
  });

  $('#form-cotar-viagens').submit(function (ev) {
    ev.preventDefault();
    var modal = $('#modal-cotacao-viagem');
        frm = $('#form-cotar-viagens'),
        frmObj = {},
        callbackFunction = frm.data('callback'),
        redirect = frm.data('redirect'),
        loading = frm.data('loading');

    $.each(frm.serializeArray(), function() {
        if (frmObj[this.name] !== undefined) {
            if (!frmObj[this.name].push) {
                frmObj[this.name] = [frmObj[this.name]];
            }
            frmObj[this.name].push(this.value || '');
        } else {
            frmObj[this.name] = this.value || '';
        }
    });

    if (loading && loading != "") {
      $('input:submit').hide();
      $('#'+loading).show();
    }

    $.ajax({
        url: frm.attr('action'),
        type: frm.attr('method'),
        data: frmObj,

        success: function (data) {
            if(callbackFunction) {
              swal({
                  title: lingua[0],
                  html: lingua[1]+"<br/>"+lingua[2],
                  type: "success",
                  confirmButtonColor: "#FF5B00",
                  confirmButtonText: "OK",
                  closeOnConfirm: true,
              });
              document.getElementById("form-cotar-viagens").reset();
              modal.modal('hide');
            }
            if(redirect) {
                window.location = redirect;
            }
        },
        error: function (data) {
          if(callbackFunction) {
            swal({
                title: lingua[3],
                html: lingua[4]+"<br/>"+lingua[5],
                type: "error",
                confirmButtonColor: "#FF5B00",
                confirmButtonText: "OK",
                closeOnConfirm: true,
            });
            document.getElementById("form-cotar-viagens").reset();
            modal.modal('hide');
          }
        },
        complete: function (data) {
          // Se tiver loading e tiver dado erro, voltar botao
          if (loading && loading != "") {
             $('#'+loading).hide();
             $('input:submit').show();
          }
       }
    });

  });

});
