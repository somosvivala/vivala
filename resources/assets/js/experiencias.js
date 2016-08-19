/**
* Metodo para mostrar a sweetAlert de DELETE de Experiencia
*/
var confirmaDeleteExperiencia = function (ev) {
    ev.preventDefault();

    //pegando a linha da ul que devemos remover
    var target = $(ev.target);

    //disparando sweetalert para confirmar a exclusao de uma categoria
    swal({
        title: "Atenção",
        text: "Essa Experiencia será removida. Tem certeza que deseja continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, deletar!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(confirmed){
            if (confirmed) {
                ajaxDeleteExperiencia(target);
            }
    });
};

/**
* Metodo para disparar um Ajax de DELETE em uma Experiencia
*/
var ajaxDeleteExperiencia = function (target) {
    var parentLinha = $(target).parents('.experiencia-item');

    //sweetalert de loading :)
    swal({
        html : '<br><i class="fa fa-3x fa-pulse fa-spin fa-spinner laranja"></i> <br><br> <h4>Processando</h4>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide'
    });

    //inserindo o token manualmente
    //@TODO inserir uma meta no header das versoes mobile logadas
    var params = {
        id : parentLinha.data('id'),
        _token: $('input[name="_token"]').val()
    };

    $.ajax({
        url: '/experiencias/' + params.id,
        type: 'DELETE',
        data: params,
        success: function (data, textStatus, jqXHR) {
            //deixando vermelho e removendo o elemento
            parentLinha.addClass('bg-danger').fadeOut(400, function() {
                $(this).remove()
            });

            //mostrando sweetAlert de sucesso (user-friendly)
            sweetAlertSucessoDeleteExperiencia();
            location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {

            //mostrando sweetAlert de erro (user-friendly)
            sweetAlertErroDeleteExperiencia();
        }
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertSucessoDeleteExperiencia = function() {
    swal({
        type: "success",
        html: '<h4>Sucesso</h4> <p>Experiencia removida!</p>',
        showCancelButton: false,
        width:240,
        confirmButtonClass: 'hide',
        timer: 900,
    });
};

/**
* Funcao para mostrar uma sweetAlert de sucesso
*/
var sweetAlertErroDeleteExperiencia = function() {
    swal({
        type: "error",
        html: '<h4>Opa..</h4> <br> <p> Ocorreu um erro e nao foi possivel remover a experiencia. !</p><br>',
        confirmButtonColor: "#DD6B55",
        showCancelButton: false
    });
};

// Calendário da Experiencia
moment.locale('pt-br');
var thisMonth = moment().format('YYYY-MM');
var eventArray = $('#json-eventos').val()?jQuery.parseJSON($('#json-eventos').val()):[];
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

//apenas instanciando o calendario se ele estiver presente
if ( $('.clndr-container').length ) {
    calendarioExperiencia('.clndr-container');
}

$(".clndr-picker").click(function() {
    $(".clndr-container").toggleClass('visivel');
});


$('ul.pesquisa-viajar li a').click(function (e) {
  $('ul.pesquisa-viajar li.active').removeClass('active');
  $('.pilar-viajar .tab-content div.active').removeClass('active');
  $(this).parent('li').addClass('active');
  $('.tab-content #'+$(this).attr('aria-controls')).addClass('active');
})



