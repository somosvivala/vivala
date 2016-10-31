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

calendarioExperiencia('.clndr-container');
$(".clndr-picker").click(function() {
    $(".clndr-container").toggleClass('visivel');
});
});

/**
 * Funcao para realizar o submit de um form por ajax
 */
function mobileAjaxSubmitForm(form, containerErros, callback) {
    console.log('inside mobileAjaxSubmitForm');
    console.log(form);
    console.log(containerErros);
    console.log(callback);

    //Executa a ajax request
    //$.ajax({
        //url: 'mydomain.com/url',
        //type: 'POST',
        //dataType: 'xml/html/script/json',
        //data: $.param( $('Element or Expression') ),
        //complete: function (jqXHR, textStatus) {
            //console.log('complete');
            //// callback
        //},
        //success: function (data, textStatus, jqXHR) {
            //console.log('success');
            //// success callback
        //},
        //error: function (jqXHR, textStatus, errorThrown) {
            //console.log('error');
            //// error callback
        //}
    //});
}

/**
 * Funcao para bindar submit de forms por ajax
 */
function bindaSubmitFormAjax() {
    console.log('chamou binda submit');
     $(".form-por-ajax").on('submit', function(event) {
         event.preventDefault()
         event.stopPropagation()
         console.log('bindando input');
         console.log(event);
     });;
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
      jQuery('.informacoes span.descricao-informacoes div.clndr-container').addClass('visivel');
  });
  jQuery(window).click(function() {

      console.log('all');
      jQuery('.informacoes span.descricao-informacoes div.clndr-container').removeClass('visivel');
  });
});
