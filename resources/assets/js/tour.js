$(document).ready(function() {

  // Possibilidade do user afirmar se quer ver sempre o TOUR ou cancelá-lo
  var ligaQuizTour = true;
  var ligaTresPilaresTour = true;
  var ligarChefsCLubTour = true;
  var ligaQuimeraTour = true;
  var ligaClickBusTour = true;

  // Externos
  var quizTour = introJs();
  var trespilaresTour = introJs();
  var chefsclubTour = introJs();
  var quimeraTour = introJs();
  var clickbusTour = introJs();

  // Setando as operações iniciais de configuração pro IntroJs
  quizTour.setOptions({
    overlayOpacity: 0.2,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="quizTour-pular">Pular Tour</span>',
    doneLabel: '<span id="quizTour-finalizar">Finalizar Tour</span>',
    scrollToElement: true,
    showStepNumbers: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });

  trespilaresTour.setOptions({
    overlayOpacity: 0.3,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: '<span id="trespilaresTour-pular">Pular Tour</span>',
    doneLabel: '<span id="trespilaresTour-finalizar">Finalizar Tour</span>',
    showStepNumbers: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });

// ##### QUIZ
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

  // ##### 3PILARES
  if(ligaTresPilaresTour && ($("#tour-pilares").hasClass("pilar-conectar"))){
    console.log("Estou no pilar QUERO ME CONECTAR");
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
    trespilaresTour.start('.tour-tres-pilares');

  }
  if(ligaTresPilaresTour && ($("#tour-pilares").hasClass("pilar-viajar"))){
    console.log("Estou no pilar QUERO VIAJAR");
    $("#logo-vivala").addClass("tour-pilar-viajar");
    trespilaresTour.start('.tour-pilar-viajar');
  }
  if(ligaTresPilaresTour && ($("#tour-pilares").hasClass("pilar-cuidar"))){
    console.log("Estou no pilar QUERO CUIDAR");
    $("#logo-vivala").addClass("tour-pilar-cuidar");
    trespilaresTour.start('.tour-pilar-cuidar');
  }
});
