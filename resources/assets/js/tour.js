$(document).ready(function() {

  // Possibilidade do user afirmar se quer ver sempre o TOUR ou cancelá-lo
  var ligaQuizTour = true;
  var ligaTourInterno = true;

  // Variáveis diferentes só por conta da opacidade da layer ao fundo
  var quizTour = introJs();
  var pilaresTour = introJs();
  var pilarInternoTour = introJs();
  var pilarInternoVendasTour = introJs();

  // Setando as operações iniciais de configuração pro IntroJs
  quizTour.setOptions({
    overlayOpacity: 0.2,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="quizTour-pular">Pular Tour</span>',
    doneLabel: '<span id="quizTour-finalizar">Finalizar Tour</span>',
    scrollToElement: true,
    showProgress: false,
    showStepNumbers: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });
  pilaresTour.setOptions({
    overlayOpacity: 0.3,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="trespilaresTour-pular">Pular Tour</span>',
    doneLabel: '<span id="trespilaresTour-finalizar">Finalizar Tour</span>',
    showStepNumbers: false,
    showProgress: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });
  pilarInternoTour.setOptions({
    overlayOpacity: 0.6,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="trespilaresTour-pular">Pular Tour</span>',
    doneLabel: '<span id="trespilaresTour-finalizar">Finalizar Tour</span>',
    showStepNumbers: false,
    showProgress: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });
  pilarInternoVendasTour.setOptions({
    overlayOpacity: 0.6,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="trespilaresTour-pular">Pular Tour</span>',
    doneLabel: '<span id="trespilaresTour-finalizar">Finalizar Tour</span>',
    showStepNumbers: false,
    showProgress: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });

  /*
  $('#notificacoes-hints').on('click', function(){
    $(this).attr("data-hints", false);
    alert($(this).attr("data-hints"));
  });
*/
/*==============================================================================
* Início de cada uma das Tours
==============================================================================*/
// ##### QUIZ
  // Se a variável for TRUE (setada pelo user), posso iniciar este Tour
  if(ligaQuizTour){
    // Passo 1
    if($("#tour-quiz").hasClass("quiz-1")){
      $("#logo-vivala").addClass("tour-quiz-step1");
      $("#skip-quiz").addClass("tour-quiz-step1");
      quizTour.start('.tour-quiz-step1');
      $("#logo-vivala").removeClass("tour-quiz-step1");
      $("#skip-quiz").removeClass("tour-quiz-step1");
    }
    // Passo 2
    if($("#tour-quiz").hasClass("quiz-2")){
      quizTour.start('.tour-quiz-step2');
    }
    // Passo 3
    if($("#tour-quiz").hasClass("quiz-3")){
      quizTour.start('.tour-quiz-step3');
    }
    // Passo 4
    if($("#tour-quiz").hasClass("quiz-4")){
      quizTour.start('.tour-quiz-step4');
    }
  }

  // Se a variável for TRUE (setada pelo user), posso iniciar este Tour
  if(ligaTourInterno){
    console.log("Estou dentro da Vivalá, preciso mostrar a TOUR INICIAL");
    console.log("Valor da variável Tour: "+ligaTourInterno);
    //alert("Valor variável Tour: "+ligaTourInterno);

      // Adicionando as classes necessárias ao IntroJS para fazer esta Tour
      $("#logo-vivala").addClass("tour-tres-pilares");
      $('#menu-tres-pilares').addClass("tour-tres-pilares");
      $('#menu-viajar').addClass("tour-tres-pilares");
      $('#menu-conectar').addClass("tour-tres-pilares");
      $('#menu-tres-pilares').addClass("tour-tres-pilares");
      $('#menu-notificacoes').addClass("tour-tres-pilares");
      $('#notificacoes-follow').addClass("tour-tres-pilares");
      $('#notificacoes-msg').addClass("tour-tres-pilares");
      $('#notificacoes-geral').addClass("tour-tres-pilares");
      $('#menu-usuario').addClass("tour-tres-pilares");

      pilaresTour.onexit(function(){
        $("#logo-vivala").removeClass("tour-tres-pilares");
        $('#menu-tres-pilares').removeClass("tour-tres-pilares");
        $('#menu-viajar').removeClass("tour-tres-pilares");
        $('#menu-conectar').removeClass("tour-tres-pilares");
        $('#menu-tres-pilares').removeClass("tour-tres-pilares");
        $('#menu-notificacoes').removeClass("tour-tres-pilares");
        $('#notificacoes-follow').removeClass("tour-tres-pilares");
        $('#notificacoes-msg').removeClass("tour-tres-pilares");
        $('#notificacoes-geral').removeClass("tour-tres-pilares");
        $('#menu-usuario').removeClass("tour-tres-pilares");
        ligaTourInterno = false;
        console.log("Valor da variável Tour-pós: "+ligaTourInterno);
      });
      pilaresTour.oncomplete(function(){
        $("#logo-vivala").removeClass("tour-tres-pilares");
        $('#menu-tres-pilares').removeClass("tour-tres-pilares");
        $('#menu-viajar').removeClass("tour-tres-pilares");
        $('#menu-conectar').removeClass("tour-tres-pilares");
        $('#menu-tres-pilares').removeClass("tour-tres-pilares");
        $('#menu-notificacoes').removeClass("tour-tres-pilares");
        $('#notificacoes-follow').removeClass("tour-tres-pilares");
        $('#notificacoes-msg').removeClass("tour-tres-pilares");
        $('#notificacoes-geral').removeClass("tour-tres-pilares");
        $('#menu-usuario').removeClass("tour-tres-pilares");
        ligaTourInterno = false;
        console.log("Valor da variável Tour-pós: "+ligaTourInterno);
      });
      pilaresTour.start(".tour-tres-pilares");
  }

  if((ligaTourInterno === false) && ($("#tour-pilares").hasClass("pilar-conectar"))){
    console.log("Estou no pilar QUERO ME CONECTAR");
    console.log("Valor da variável Tour: "+ligaTourInterno);
    pilarInternoTour.start(".tour-conectar");
  }
  if((ligaTourInterno === false) && ($("#tour-pilares").hasClass("pilar-viajar"))){
    console.log("Estou no pilar QUERO VIAJAR");
    console.log("Valor da variável Tour: "+ligaTourInterno);
    pilarInternoTour.start(".tour-viajar");
  }
  if((ligaTourInterno === false) && ($("#tour-pilares").hasClass("pilar-cuidar"))){
    console.log("Estou no pilar QUERO CUIDAR");
    console.log("Valor da variável Tour: "+ligaTourInterno);
    pilarInternoTour.start(".tour-cuidar");
  }
});
