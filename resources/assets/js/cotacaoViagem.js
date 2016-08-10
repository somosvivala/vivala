"use strict";

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

// Colore dias anteriores do datepicker e da data atual
var coloreDatePickerDiasPassados = function(container){
  $(container).datepicker().on('focus', function(){
      $('.datepicker table tr td.disabled').addClass('datepicker-dia-anterior');
      $('.datepicker table tr td.active').addClass('datepicker-dia-atual');
  });
}

// Tooltips de aviso
var bindaTooltipsDesativados = function(container, arrayLingua){
  let bindaTooltipCarrosNaoFuncionando = new Tooltip({
    target: document.querySelector(container),
    content: arrayLingua,
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

  // Campo de texto - ajustes
  var campoOrigem1 = $('#campo-origem-1'),
      basicoOrigem1 = $('#basico-origem-1'),
      campoDestino1 = $('#campo-destino-1'),
      basicoDestino1 = $('#basico-destino-1'),
      campoBairroRegiaoPref = $('#campo-bairro-regiao-preferencia'),
      hospedagemBairroRegiaoPref = $('#hospedagem-bairro-regiao-preferencia');

      $(campoOrigem1).change(function(){
        $(basicoOrigem1).val($(campoOrigem1).val().toUpperCase());
      });
      $(campoDestino1).change(function(){
        $(basicoDestino1).val($(campoDestino1).val().toUpperCase());
      });
      $(campoBairroRegiaoPref).change(function(){
        $(hospedagemBairroRegiaoPref).val($(campoBairroRegiaoPref).val().toUpperCase());
      });

  // Campo de data - ajustes
  var basicoDataIda1 = $('#basico-data-ida-1'),
      basicoDataVolta1 = $('#basico-data-volta-1');
      coloreDatePickerDiasPassados(basicoDataIda1);
      coloreDatePickerDiasPassados(basicoDataVolta1);
      mudaDataIdaVolta(basicoDataIda1, basicoDataVolta1);

  // Mais Hospedagem [DESATIVADO TEMPORARIAMENTE]
  // var maisHospedagem1 = $('#basico-mais-hospedagem-1');
  //   $(maisHospedagem1).click(function() {
  //     if(this.checked) {}
  //     else if(!this.checked) {}
  //   });

  // Mais Destinos [DESATIVADO TEMPORARIAMENTE]
  // var ativaMaisDestinos = $('#ativa-mais-destinos');
  //   $(ativaMaisDestinos).bind('click', function(){
  //   });

  // Numero de Crianças
  var basicoNroCriancas = $('select[name=basico-nro-criancas]'),
      adicionalCrianca = $('#adicional-de-crianca'),
      idadeCrianca = $('#idade-da-crianca');

      $(basicoNroCriancas).change(function(){
        var nroCriancas = $(basicoNroCriancas).val();
        $(idadeCrianca).empty();
        if(nroCriancas >= 1){
          $(adicionalCrianca).removeClass('hidden');
          for(i=1; i<=nroCriancas; i++) {
            $(idadeCrianca).append('<li class="margin-b-1"><select id="basico-idade-criancas" name="basico-idade-criancas[]" id="" class="form-control" required><option disabled="true" selected>'+lingua[18]+' '+i+'</option><option value="Alguns Meses">'+lingua[19]+'</option><option value="1">1 '+lingua[20]+'</option><option value="2">2 '+lingua[21]+'</option><option value="3">3 '+lingua[21]+'</option><option value="4">4 '+lingua[21]+'</option><option value="5">5 '+lingua[21]+'</option><option value="6">6 '+lingua[21]+'</option><option value="7">7 '+lingua[21]+'</option><option value="8">8 '+lingua[21]+'</option><option value="9">9 '+lingua[21]+'</option><option value="10">10 '+lingua[21]+'</option><option value="11">11 '+lingua[21]+'</option></select></li>');
          }
        }
        else if($(basicoNroCriancas).val() <= 0){
          $(adicionalCrianca).addClass('hidden');
        }
      });

  // Datas Flexíveis
  var dataFlexivel = $('#chbox-data-flexivel'),
      datasFlexiveis = $('#datas-flexiveis')
    $(dataFlexivel).click(function() {
        if(this.checked) $(datasFlexiveis).val('Possui');
        else if(!this.checked) $(datasFlexiveis).val('Não Possui');
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
        text = lingua[13];
        break;
      case 2:
        text = lingua[14];
        break;
      case 3:
        text = lingua[15];
        break;
      case 4:
        text = lingua[16];
        break;
      case 5:
        text = lingua[17];
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

jQuery(document).ready(function($) {
  var informeCotacaoCarros = '#informe-cotacao-carros',
      arrayLingua = lingua[12];
  bindaTooltipsDesativados(informeCotacaoCarros, arrayLingua);
  bindaFormCotaViagem();

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
        contentType:"application/x-www-form-urlencoded; charset=UTF-8",
        data: frmObj,
        dataType: "html",

        success: function (data) {
            if(callbackFunction) {
              swal({
                  title: lingua[6],
                  html: "<p>"+lingua[7]+"</p><p>"+lingua[8]+"</p>",
                  type: 'success',
                  confirmButtonColor: corVerdePrimario,
                  confirmButtonText: 'OK',
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
                title: lingua[9],
                html: "<p>"+lingua[10]+"</p><p>"+lingua[11]+"</p>",
                type: 'error',
                confirmButtonColor: corVermelhoPrimario,
                confirmButtonText: 'OK',
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
