'use strict';

jQuery(document).ready(function($) {
    $(window).capslockstate();
    var init = function() {
        $('.conheca-popup').on('click', function() {
            $('#conheca-vivala').addClass('ativo');
        });

        $('.history-back').on('click', function() {
            window.history.back();
        });

        $('.desativa-conheca').on('click', function(e) {
            $('#conheca-vivala').removeClass('ativo');
        });

        $("input.form-mobile[name='password_confirmation']").on('change', function(e) {
            validatePassword();
        });
        $("input.form-mobile[name='password']").on('change', function(e) {
            validatePassword();
        });
        $("input.form-mobile[name='password']").focus(function(e){
          capsLockPassword();
        });
    };
    init();

    var validatePassword = function(){
        var pass2=$("input.form-mobile[name='password_confirmation']").val();
        var pass1=$("input.form-mobile[name='password']").val();
        if(pass1!=pass2 && pass2.length>2)
            $("#senhas-nao-coincidem").removeClass("hide");
        else
            $("#senhas-nao-coincidem").addClass("hide");
    }
    var capsLockPassword = function(){
      $(window).bind("capsOn", function(event) {
        $("#capslock-ligado").removeClass("hide");
      });
      $(window).bind("capsOff capsUnknown", function(event) {
        $("#capslock-ligado").addClass("hide");
      });
    }

  // Calendário da Experiencia
  moment.locale('pt-br');
  var thisMonth = moment().format('YYYY-MM');
  console.log($('#json-eventos').val());
  var eventArray = $('#json-eventos').val()?jQuery.parseJSON($('#json-eventos').val()):[];
  console.log(eventArray);
  var _CalendarioExperiencia = null;
  var calendarioExperiencia  = function(container){
    _CalendarioExperiencia = jQuery(container).clndr({
        events: eventArray,
        daysOfTheWeek: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        clickEvents: {
            click: function (target) {
                if(target.events.length) {
                  var dataEvento = target.events[0].date;
                  $(".clndr-picker").val(dataEvento);
                  $(".clndr-container").toggleClass('visivel');
                }
            },
            today: function () {
                console.log('Cal-1 today');
            },
            nextMonth: function () {
                console.log('Cal-1 next month');
            },
            previousMonth: function () {
                console.log('Cal-1 previous month');
            },
            onMonthChange: function () {
                console.log('Cal-1 month changed');
            },
            nextYear: function () {
                console.log('Cal-1 next year');
            },
            previousYear: function () {
                console.log('Cal-1 previous year');
            },
            onYearChange: function () {
                console.log('Cal-1 year changed');
            },
            nextInterval: function () {
                console.log('Cal-1 next interval');
            },
            previousInterval: function () {
                console.log('Cal-1 previous interval');
            },
            onIntervalChange: function () {
                console.log('Cal-1 interval changed');
            }
        },
        multiDayEvents: {
            singleDay: 'date',
            endDate: 'endDate',
            startDate: 'startDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false
    });
  }

/** Apenas bindando o calendario se ele estiver presente */
if ( $('.clndr-container').length ) {
    calendarioExperiencia('.clndr-container');
    $(".clndr-picker").click(function() {
        $(".clndr-container").toggleClass('visivel');
    });
}

});

/**
 * Funcao para bindar submit de forms que contenham a classe 'form-por-ajax'.
 * Obtendo as informacoes necessarias do elemento form (data-callback, data-loading, data-errors)
 *
 * Se der erro insere o html ja formatado no container de erros, se der tudo certo executa a funcao de callback
 */
function bindaSubmitFormAjax() {
     $(".form-por-ajax").submit(function(event) {
         event.preventDefault()

         var target = $(event.target);
         var callbackFunction = target.data('callback');
         var loadingElement = target.data('loading');
         var errorContainer = target.data('errors');

         //token do laravel para ajax
         $.ajaxSetup({
             headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value') }
         });

         $.ajax({
             url: target.attr('action'),
             type: target.attr('method'),
             dataType: 'json',
             data: $.param( target.serializeArray() ),
             beforeSend: function() {

                 /** Antes de enviar o ajax, limpamos os erros, escondemos o botao e mostramos o loading **/
                 $(errorContainer).html('');
                 $(loadingElement).toggleClass('hidden');
                 target.find('input[type=submit]').toggleClass('hidden');
             },
             complete: function (jqXHR, textStatus) {

                 /** Escondendo o loading e voltando o botao de submit **/
                 $(loadingElement).toggleClass('hidden');
                 target.find('input[type=submit]').toggleClass('hidden');
             },
             success: function (data, textStatus, jqXHR) {

                 /** Se tiver ocorrido tudo certo, verificar se existe um callback **/
                 if ( data.success ) {

                     /** Chamando funcao de callback caso exista uma **/
                     if ( callbackFunction ) {
                         eval(callbackFunction);
                     }
                 }
             },
             error: function (jqXHR, textStatus, errorThrown) {
                 var arrayErros = [];
                 /** Iterando sob o objeto que contem os erros **/
                 $.each(jqXHR.responseJSON, function (Objkey, campoErro) {

                     /** Iterando sob cada indice do objeto de erros que contem as mensagens de erro */
                     $.each(campoErro, function(key, mensagem) {

                         /** Formatando erros para inserilos no container **/
                         arrayErros.push("<div class='form-mobile-error'>" + mensagem + "</div>");
                     });
                 });

                 /** Gerando/Inserindo string com o html dos erros **/
                 var htmlErros = arrayErros.join("");
                 $(errorContainer).html(htmlErros);
             }
         });
     });
}

/**
 * Funcao para executar caso o cadastro mobile ocorra com sucesso
 */
function callbackCadastroMobile() {
    location.reload();
}

/**
 * Funcao para executar caso o login do mobile ocorra com sucesso
 */
function callbackLoginMobile(data) {

    //Se tiver um redirectPath, redirecionar para lá
    if ( data.redirectPath ) {
        location.href = data.redirectPath;
    }

    location.reload();
}



jQuery(document).ready(function($) {
  bindaSubmitFormAjax();

  jQuery('.informacoes span.descricao-informacoes input.clndr-picker').click(function(event){
      event.stopPropagation();
      console.log('inpput');
      //jQuery('.informacoes span.descricao-informacoes div.clndr-container').toggleClass('visivel');
  });
  jQuery('.informacoes span.descricao-informacoes div.clndr-container').click(function(event){
      event.stopPropagation();
      console.log('container');
      //jQuery('.informacoes span.descricao-informacoes div.clndr-container').addClass('visivel');
  });
  jQuery(window).click(function() {

      console.log('all');
      jQuery('.informacoes span.descricao-informacoes div.clndr-container').removeClass('visivel');
  });
});
