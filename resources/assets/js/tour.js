$( document ).ready(function() {

  var quizTour = introJs();
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
  quizTour.start(".tour-quiz");
  console.log("IntroJS, passou aqui.");

});
