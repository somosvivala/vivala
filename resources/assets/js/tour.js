$(document).ready(function() {

  var quizTour = introJs();

  // Setando as operações iniciais de configuração pro IntroJS
  quizTour.setOptions({
    overlayOpacity: 0.3,
    showButtons: true,
    nextLabel: 'Próximo',
    prevLabel: 'Anterior',
    skipLabel: 'Pular Tour',
    doneLabel: 'Finalizar Tour',
    scrollToElement: true,
    showStepNumbers: false,
    keyboardNavigation: true,
    exitOnEsc: true,
  });

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
});
