$(document).ready(function() {

  // Pegando a lingua ativa no momento
  var linguaAtiva = $("meta[name=language]").attr("content");

  // Possibilidade do user afirmar se quer ver sempre o TOUR ou cancelá-lo
  var ligaQuizTour = Cookies.get('quizTour');
  var ligaIntroTour = Cookies.get('introTour');

  // Variáveis diferentes só por conta da opacidade da layer ao fundo
  var quizTour = introJs(); // Quiz
  var introTour = introJs(); // Primeira Tour da Plataforma
  var internoTour = introJs(); // Tour de cada 1 dos 3 pilares
  var pilarVendasTour = introJs(); // Tour interna do MarketPlace (ChefsClub + ClickBus)

  // [QUIZ/INTRO/INTERNO/PILARVENDAS] Configurações Iniciais Baseados na Língua Usada
  switch(linguaAtiva){
    case 'en':
      // Quiz
        quizTour.setOptions({
          nextLabel: 'Next',
          prevLabel: 'Previous',
          skipLabel: 'Skip Tour',
          doneLabel: 'End Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.2,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Got it',
        });
      // Intro
        introTour.setOptions({
          nextLabel: 'Next',
          prevLabel: 'Previous',
          skipLabel: 'Skip Help',
          doneLabel: 'End Help',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.5,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Got it',
        });
      // Interno
        internoTour.setOptions({
          nextLabel: 'Next',
          prevLabel: 'Previous',
          skipLabel: 'Skip Tour',
          doneLabel: 'End Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.1,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Got it',
        });
      // Pilares Vendas (ChefsClub + Quimera + ClickBus)
        pilarVendasTour.setOptions({
          nextLabel: 'Next',
          prevLabel: 'Previous',
          skipLabel: 'Skip Tour',
          doneLabel: 'End Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: false,
          showProgress: true,
          scrollToElement: true,
          overlayOpacity: 0.1,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Got it',
        });
    break;
    case 'pt':
      // Quiz
        quizTour.setOptions({
          nextLabel: 'Próximo',
          prevLabel: 'Anterior',
          skipLabel: 'Pular Tour',
          doneLabel: 'Finalizar Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.2,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Entendi',
        });
      // Intro
        introTour.setOptions({
          nextLabel: 'Próximo',
          prevLabel: 'Anterior',
          skipLabel: 'Pular Ajuda',
          doneLabel: 'Finalizar Ajuda',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.5,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Entendi',
        });
      // Interno
        internoTour.setOptions({
          nextLabel: 'Próximo',
          prevLabel: 'Anterior',
          skipLabel: 'Pular Tour',
          doneLabel: 'Finalizar Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: true,
          showProgress: false,
          scrollToElement: true,
          overlayOpacity: 0.1,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Entendi',
        });
      // Pilares Vendas (ChefsClub + Quimera + ClickBus)
        pilarVendasTour.setOptions({
          nextLabel: 'Próximo',
          prevLabel: 'Anterior',
          skipLabel: 'Pular Tour',
          doneLabel: 'Finalizar Tour',
          //tooltipPosition: ,
          //tooltipClass: ,
          //highlightClass: ,
          exitOnEsc: true,
          exitOnOverlayClick: true,
          showStepNumbers: false,
          keyboardNavigation: true,
          showButtons: true,
          showBullets: false,
          showProgress: true,
          scrollToElement: true,
          overlayOpacity: 0.1,
          //disableInteraction: ,
          //hintPosition: ,
          hintButtonLabel: 'Entendi',
        });
    default:
      // Quiz
        quizTour.setOptions({
          overlayOpacity: 0.2,
          showButtons: true,
          scrollToElement: true,
          showProgress: false,
          showStepNumbers: false,
          keyboardNavigation: true,
          exitOnEsc: true
        });
      // Intro
        introTour.setOptions({
          overlayOpacity: 0.5,
          showButtons: true,
          scrollToElement: true,
          showProgress: false,
          showStepNumbers: false,
          keyboardNavigation: true,
          exitOnEsc: true
        });
      // Interno
        internoTour.setOptions({
            overlayOpacity: 0.1,
            showButtons: true,
            scrollToElement: true,
            showProgress: false,
            showStepNumbers: false,
            keyboardNavigation: true,
            exitOnEsc: true
          });
  }

/*==============================================================================
* Início de cada um dos Tours
==============================================================================*/

// ##### QUIZ
// Se a variável for FALSE (setada pelo user), posso iniciar este Tour
  if(!parseInt(ligaQuizTour)){
    // Passo 1
    if($("#tour-quiz").hasClass("quiz-1")){
      //console.log("Estou em QUIZ - Etapa 1");
      switch(linguaAtiva){
        case 'en':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-1-step1',
                intro: '<p class="text-center">Hello Traveler!<br/>Welcome to <span class="laranja">Vivalá</span>,<br/>the platform for people from all over the world who want to travel and make some good changes in Brazil.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step2',
                intro: '<p class="text-center">The first step to be part of our community is fill some basic information. So we can know a little about you!<br/>It will take less than <span class="laranja">3 minutes</span> in total, but if you want, you can skip some of the steps by clicking on button <span class="laranja">Skip</span> in the top right corner.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step3',
                intro: '<p class="text-center">In each question you can tick more than one option, but do with some moderation.<br/>So we can understand you better.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step4',
                intro: '<p class="text-center">After completion click <span class="laranja">Continue</span> to proceed to the next step of our questions.</p>',
                position: 'top'
              },
            ]
          });
        break;
        case 'pt':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-1-step1',
                intro: '<p class="text-center">Olá Viajante!<br/>Seja bem-vindo(a) à <span class="laranja">Vivalá</span>,<br/> a plataforma para pessoas de todo o mundo que querem viajar e transformar o Brasil.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step2',
                intro: '<p class="text-center">O primeiro passo para fazer parte dessa nossa comunidade é preencher algumas informações básicas para a gente saber um pouco sobre você!<br/>Serão em média <span class="laranja">3 minutos</span> no total, mas se você quiser, pode pular alguma das etapas no botão <span class="laranja">Pular etapa</span> aqui em cima, no canto direito.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step3',
                intro: '<p class="text-center">Em cada pergunta você pode marcar mais de uma opção, mas marque com moderação!<br/>Assim conseguiremos te entender melhor.</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-1-step4',
                intro: '<p class="text-center">Após a finalização, clique no botão <span class="laranja">Continuar</span> para seguir para a próxima etapa do questionário.</p>',
                position: 'top'
              },
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      quizTour.onexit(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.oncomplete(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.start();
    }
    // Passo 2
    if($("#tour-quiz").hasClass("quiz-2")){
      //console.log("Estou em QUIZ - Etapa 2");
      switch(linguaAtiva){
        case 'en':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-2-step1',
                intro: '<p class="text-center">To have a profile with your face in <span class="laranja">Vivalá</span> we ask everybody to put a profile photo. Lets do it?</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-2-step2',
                intro: '<p class="text-center">Click in this area to upload a photo from your computer.<br/>After choosing between your files, you will be able to cut it as you want and will be automatically directed to the next step!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        case 'pt':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-2-step1',
                intro: '<p class="text-center">Para ter um perfil com sua cara na <span class="laranja">Vivalá</span> pedimos pra todo mundo colocar uma foto de perfil. Bora?</p>',
                position: 'bottom'
              },
              {
                element: '.tour_quiz-2-step2',
                intro: '<p class="text-center">Clique nesta área para carregar uma foto do seu computador.<br/>Depois de escolher entre seus arquivos, você vai poder recortá-la como quiser e será direcionado automaticamente para o próximo passo!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      quizTour.onexit(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.oncomplete(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.start();
    }
    // Passo 3
    if($("#tour-quiz").hasClass("quiz-3")){
      //console.log("Estou em QUIZ - Etapa 3");
      switch(linguaAtiva){
        case 'en':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-3-step1',
                intro: '<p class="text-center">Now it\'s time to fill out the information that will go to your public profile.</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        case 'pt':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-3-step1',
                intro: '<p class="text-center">Agora chegou a hora de preencher as informações que irão para o seu perfil público.</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      quizTour.onexit(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.oncomplete(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.start();
    }
    // Passo 4
    if($("#tour-quiz").hasClass("quiz-4")){
      //console.log("Estou em QUIZ - Etapa 4");
      switch(linguaAtiva){
        case 'en':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-4-step1',
                intro: '<p class="text-center">Finally we arrived at the last step! Here we begin to suggest travelers with similar interests to yours. <span class="laranja">Connect yourself</span>!</p>',
                position: 'bottom',
              },
              {
                element: '.tour_quiz-4-step2',
                intro: '<p class="text-center">By clicking on the <span class="laranja"">Follow</span> button you will create a connection within the <span class="laranja">Vivalá</span> and will receive updates from this person.<br/>Start to share your experiences!</p>',
                position: 'bottom',
              },
              {
                element: '.tour_quiz-4-step3',
                intro: '<p class="text-center">Be welcome to our home!</p>',
                position: 'bottom',
              }
            ]
          });
        break;
        case 'pt':
          quizTour.setOptions({
            steps: [
              {
                element: '.tour_quiz-4-step1',
                intro: '<p class="text-center">Chegamos na última etapa! Aqui, começamos a sugerir viajantes com interesses semelhantes aos seus. <span class="laranja">Conecte-se</span>!</p>',
                position: 'bottom',
              },
              {
                element: '.tour_quiz-4-step2',
                intro: '<p class="text-center">Clicando no botão <span class="laranja">seguir</span> você já estará criando uma conexão dentro da <span class="laranja">Vivalá</span> e receberá as atualizações desta pessoa.<br/>Comece a compartilhar suas experiências!</p>',
                position: 'bottom',
              },
              {
                element: '.tour_quiz-4-step3',
                intro: '<p class="text-center">Seja bem-vindo à nossa casa!</p>',
                position: 'bottom',
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      quizTour.onexit(function(){
        Cookies.set('quizTour', 0, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.oncomplete(function(){
        Cookies.set('quizTour', 1, { expires: 365, path: '/' });
        ligaQuizTour = Cookies.get('quizTour');
      });
      quizTour.start();
    }
  }

// ##### INTERNO
// Se a variável for FALSE (setada pelo user), posso iniciar este Tour
  if((!parseInt(ligaIntroTour)) && ($("#tour-pilares").hasClass("pilar-home"))){
    //console.log("Estou dentro da Vivalá, preciso mostrar a TOUR INICIAL");
    // TOUR INTERNO
    switch(linguaAtiva){
      case 'en':
        introTour.setOptions({
          steps: [
            // 3 PILARES
            {
              element: '.tour-pilares-step1',
              intro: '<p class="text-center">Olá Viajante!<br/>Verificamos que está é a primeira vez que você visita a <span class="laranja">Vivalá</span>.<br/>Podemos te dar uma mãozinha e te ajudar a ver como as coisas funcionam por aqui.<br/>São apenas alguns passos e prometemos que vai levar menos de <span class="laranja">5 minutinhos</span> do seu tempo.<br/>O que acha?</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step2',
              intro: '<p class="text-center">A nossa plataforma está divididas em <span class="laranja">3 grandes seções</span> distintas.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step3',
              intro: '<p class="text-center"><span class="laranja">Quero me Conectar</span> é o pilar em que estamos agora.<br/>Nele você poderá se conectar coms seus amigos e compartilhar suas mais incríveis experiências.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step4',
              intro: '<p class="text-center"><span class="laranja">Quero Viajar</span> é o pilar feito pra você viajante, que adora marcar aquela viagem com seus amigos.<br/>Nele são oferecidos serviços de transporte, hospedagem e alimentação com incríveis descontos, tudo pra você ficar tranquilo(a) na hora de viajar!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step5',
              intro: '<p class="text-center"><span class="laranja">Quero Cuidar</span> é o pilar para suas grandes contribuições!<br/>Nele se encontram diversos projetos de ONG\'s espalhadas pelo Brasil, você pode se candidatar a uma vaga ou criar uma experiência única, modificando a realidade do nosso país durante suas viagens!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step6',
              intro: '<p class="text-center">Aqui você receberá todas as notificações importantes dentro da plataforma.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step7',
              intro: '<p class="text-center">Notificações de outros <span class="laranja">Viajantes</span> que te seguiram e que agora recebem suas postagens.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step8',
              intro: '<p class="text-center">Notificações de novas <span class="laranja">Mensagens</span> dos viajantes que querem te dar aquele alô.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step9',
              intro: '<p class="text-center">Notificações <span class="laranja">Gerais</span>, onde são mostradas as curtidas e comentários em suas postagens.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step10',
              intro: '<p class="text-center">Este é botão de <span class="laranja">Ajuda</span>, você pode clicar aqui sempre que precisar e uma ajuda será mostrada caso esteja disponível.<br/>Todos os 3 pilares possuem dicas feitas especiamente para nossos viajantes, venha e experimente nossoo Tour!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step11',
              intro: '<p class="text-center">E por último, neste canto está o menu de <span class="laranja">Configurações Globais</span>, aqui você encontra todas as configurações da sua conta e do seu perfil.</p>',
              position: 'bottom'
            }
          ]
        });
      break;
      case 'pt':
        introTour.setOptions({
          steps: [
            // 3 PILARES
            {
              element: '.tour-pilares-step1',
              intro: '<p class="text-center">Olá Viajante!<br/>Verificamos que está é a primeira vez que você visita a <span class="laranja">Vivalá</span>.<br/>Podemos te dar uma mãozinha e te ajudar a ver como as coisas funcionam por aqui.<br/>São apenas alguns passos e prometemos que vai levar menos de <span class="laranja">5 minutinhos</span> do seu tempo.<br/>O que acha?</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step2',
              intro: '<p class="text-center">A nossa plataforma está divididas em <span class="laranja">3 grandes seções</span> distintas.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step3',
              intro: '<p class="text-center"><span class="laranja">Quero me Conectar</span> é o pilar em que estamos agora.<br/>Nele você poderá se conectar coms seus amigos e compartilhar suas mais incríveis experiências.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step4',
              intro: '<p class="text-center"><span class="laranja">Quero Viajar</span> é o pilar feito pra você viajante, que adora marcar aquela viagem com seus amigos.<br/>Nele são oferecidos serviços de transporte, hospedagem e alimentação com incríveis descontos, tudo pra você ficar tranquilo(a) na hora de viajar!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step5',
              intro: '<p class="text-center"><span class="laranja">Quero Cuidar</span> é o pilar para suas grandes contribuições!<br/>Nele se encontram diversos projetos de ONG\'s espalhadas pelo Brasil, você pode se candidatar a uma vaga ou criar uma experiência única, modificando a realidade do nosso país durante suas viagens!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step6',
              intro: '<p class="text-center">Aqui você receberá todas as notificações importantes dentro da plataforma.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step7',
              intro: '<p class="text-center">Notificações de outros <span class="laranja">Viajantes</span> que te seguiram e que agora recebem suas postagens.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step8',
              intro: '<p class="text-center">Notificações de novas <span class="laranja">Mensagens</span> dos viajantes que querem te dar aquele alô.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step9',
              intro: '<p class="text-center">Notificações <span class="laranja">Gerais</span>, onde são mostradas as curtidas e comentários em suas postagens.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step10',
              intro: '<p class="text-center">Este é botão de <span class="laranja">Ajuda</span>, você pode clicar aqui sempre que precisar e uma ajuda será mostrada caso esteja disponível.<br/>Todos os 3 pilares possuem dicas feitas especiamente para nossos viajantes, venha e experimente nossoo Tour!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step11',
              intro: '<p class="text-center">E por último, neste canto está o menu de <span class="laranja">Configurações Globais</span>, aqui você encontra todas as configurações da sua conta e do seu perfil.</p>',
              position: 'bottom'
            }
          ]
        });
      break;
      default:
      // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
    }
    introTour.onexit(function(){
      Cookies.set('introTour', 0, { expires: 365, path: '/' });
      ligaQuizTour = Cookies.get('introTour');
    });
    introTour.oncomplete(function(){
      Cookies.set('introTour', 1, { expires: 365, path: '/' });
      ligaQuizTour = Cookies.get('introTour');
    });
    introTour.start();
  }

// ##### PILARES
  $('#notificacoes-ajuda').click(function(){
    // TOUR PILARES
    if(($("#tour-pilares").hasClass("pilar-conectar"))){
      // CONECTAR
      //console.log("Estou no pilar QUERO ME CONECTAR");
      switch(linguaAtiva){
        case 'en':
          internoTour.setOptions({
            steps: [
              // CONECTAR
              {
                element: '.tour-pilar-conectar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero me Conectar</span>.<br/>É aqui o lugar para interagir com milhares de pessoas que estão viajando e compartilhando experiências Brasil à fora.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step2',
                intro: '<p class="text-center">No menu de postagens você poderá compartilhar as suas viagens, fotos e experiências com a rede da <span class="laranja">Vivalá</span>, tornando a experiência de nossos viajantes cada vez mais legal!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step3',
                intro: '<p class="text-center">Nosso menu lateral esquerdo servirá como bússola para te guiar nas mais completas experiências com seus amigos e seguidores.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step4',
                intro: '<p calss="text-center">Em <span class="laranja">Linha do Tempo</span> você terá acesso a sua linha do tempo pessoal, com as postagens que realizou e as pessoas com as quais interagiu.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step5',
                intro: '<p class="text-center">Aqui ao meio você poderá ver as postagens e notícias de todas as pessoas que estão interagindo dentro da <span class="laranja">Vivalá</span>. Claro que facilitamos, colocando as pessoas que você seguiu no topo desta lista!</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-conectar-step6',
                intro: '<p class="text-center">No menu lateral direito você pode encontrar muito mais viajantes que combinam com você!<br/>Basta segui-los para receber suas postagens, fotos e notícias.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step7',
                intro: '<p class="text-center">Em <span class="laranja">Últimas Notícias</span> você poderá ver as últimas postagens que ocorreram por aqui.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step8',
                intro: '<p class="text-center">Em <span class="laranja">Dê Seu Feedback</span> você poderá nos mandar uma mensagem direta, dando dicas e sugestões do que pode ser melhorado!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step9',
                intro: '<p class="text-center">Você também pode dar aquela curtidinha em nossa página no Facebook por aqui. Vamos lá, é rapidinho!</p>',
                position: 'top'
              }
            ]
          });
        break;
        case 'pt':
          internoTour.setOptions({
            steps: [
              // CONECTAR
              {
                element: '.tour-pilar-conectar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero me Conectar</span>.<br/>É aqui o lugar para interagir com milhares de pessoas que estão viajando e compartilhando experiências Brasil à fora.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step2',
                intro: '<p class="text-center">No menu de postagens você poderá compartilhar as suas viagens, fotos e experiências com a rede da <span class="laranja">Vivalá</span>, tornando a experiência de nossos viajantes cada vez mais legal!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step3',
                intro: '<p class="text-center">Nosso menu lateral esquerdo servirá como bússola para te guiar nas mais completas experiências com seus amigos e seguidores.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step4',
                intro: '<p calss="text-center">Em <span class="laranja">Linha do Tempo</span> você terá acesso a sua linha do tempo pessoal, com as postagens que realizou e as pessoas com as quais interagiu.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step5',
                intro: '<p class="text-center">Aqui ao meio você poderá ver as postagens e notícias de todas as pessoas que estão interagindo dentro da <span class="laranja">Vivalá</span>. Claro que facilitamos, colocando as pessoas que você seguiu no topo desta lista!</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-conectar-step6',
                intro: '<p class="text-center">No menu lateral direito você pode encontrar muito mais viajantes que combinam com você!<br/>Basta segui-los para receber suas postagens, fotos e notícias.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step7',
                intro: '<p class="text-center">Em <span class="laranja">Últimas Notícias</span> você poderá ver as últimas postagens que ocorreram por aqui.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step8',
                intro: '<p class="text-center">Em <span class="laranja">Dê Seu Feedback</span> você poderá nos mandar uma mensagem direta, dando dicas e sugestões do que pode ser melhorado!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step9',
                intro: '<p class="text-center">Você também pode dar aquela curtidinha em nossa página no Facebook por aqui. Vamos lá, é rapidinho!</p>',
                position: 'right'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      internoTour.start();
    }
    if(($("#tour-pilares").hasClass("pilar-viajar"))){
      // VIAJAR
      //console.log("Estou no pilar QUERO VIAJAR");
      switch(linguaAtiva){
        case 'en':
          internoTour.setOptions({
            steps: [
              // VIAJAR
              {
                element: '.tour-pilar-viajar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Viajar</span>.<br/>Aqui você encontrará tudo que precisa para viajar Brasil afora, alimentação, passagens áereas/ônibus e hospedagem, tudo isso com muitos descontos e vantagens!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step2',
                intro: '<p class="text-center">Em nosso menu você encontra cada um de nossos serviços.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-viajar-step3',
                intro: '<p class="text-center">Em <span class="laranja">Restaurantes</span> temos um clube de vantagens com 1.700 opções de restaurantes espalhados pelo Brasil, delicie-se!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step4',
                intro: '<p class="text-center">Em <span class="laranja">Hospedagem, Vôos e Carros</span> temos passagens áereas, hospedagem e pacotes de viagens com os melhores descontos para você viajante!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step5',
                intro: '<p class="text-center">Em <span class="laranja">Passagens Rodoviárias</span> temos passagens para todo território nacional e descontos exclusivos com mais de 60 viações de ônibus diferentes!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step6',
                intro: '<p class="text-center">No menu lateral direito você encontra os <span class="laranja">Roteiros</span> mais quentes da Vivalá, feitos sob medida para você conhecer os lugares mais incríveis do país!</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-viajar-step7',
                intro: '<p class="text-center">Monte sua viagem agora e viva esta experiência, viva o Brasil!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        case 'pt':
          internoTour.setOptions({
            steps: [
              // VIAJAR
              {
                element: '.tour-pilar-viajar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Viajar</span>.<br/>Aqui você encontrará tudo que precisa para viajar Brasil afora, alimentação, passagens áereas/ônibus e hospedagem, tudo isso com muitos descontos e vantagens!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step2',
                intro: '<p class="text-center">Em nosso menu você encontra cada um de nossos serviços.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-viajar-step3',
                intro: '<p class="text-center">Em <span class="laranja">Restaurantes</span> temos um clube de vantagens com 1.700 opções de restaurantes espalhados pelo Brasil, delicie-se!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step4',
                intro: '<p class="text-center">Em <span class="laranja">Hospedagem, Vôos e Carros</span> temos passagens áereas, hospedagem e pacotes de viagens com os melhores descontos para você viajante!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step5',
                intro: '<p class="text-center">Em <span class="laranja">Passagens Rodoviárias</span> temos passagens para todo território nacional e descontos exclusivos com mais de 60 viações de ônibus diferentes!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step6',
                intro: '<p class="text-center">No menu lateral direito você encontra os <span class="laranja">Roteiros</span> mais quentes da Vivalá, feitos sob medida para você conhecer os lugares mais incríveis do país!</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-viajar-step7',
                intro: '<p class="text-center">Monte sua viagem agora e viva esta experiência, viva o Brasil!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      internoTour.onexit(function(){
        console.log("Estou no MarketPlace, devo mostrar ChefsClub ou ClickBus");
        verificaMarketPlace();
      });
      internoTour.oncomplete(function(){
        console.log("Estou no MarketPlace, devo mostrar ChefsClub ou ClickBus");
        verificaMarketPlace();
      });
      internoTour.start();
    }
    if(($("#tour-pilares").hasClass("pilar-cuidar"))){
      // CUIDAR
      //console.log("Estou no pilar QUERO CUIDAR");
      switch(linguaAtiva){
        case 'en':
          internoTour.setOptions({
            steps: [
              // CUIDAR
              {
                element: '.tour-pilar-cuidar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Cuidar</span>.<br/>Aqui você pode encontrar vagas em diversas ONGs espalhadas pelo Brasil, poderá se cadastrar a uma delas e compartilhar com outros viajantes o trabalho voluntário em nosso país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step2',
                intro: '<p class="text-center">Você também poderá divulgar suas vagas caso possua uma ONG, possibilitando a outros viajantes esta troca de experiências!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step3',
                intro: '<p class="text-center">Nosso menu lateral esquerdo servirá como bússola para te guiar nas mais completas experiências de voluntariado pelo país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step4',
                intro: '<p class="text-center">Em <span class="laranja">Página Inicial</span> você poderá buscar pelas mais diversas ONGs em todo país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step5',
                intro: '<p class="text-center">Em <span class="laranja">Projetos</span> você verá os projetos sociais mais acessados por nossos viajantes transformadores.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step6',
                intro: '<p class="text-center">Em <span class="laranja">Vagas</span> você encontrará as vagas para os trabalhos voluntários mais irados!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step7',
                intro: '<p class="text-center">Você pode usar a busca para encontrar a ONG que é a sua cara, buscando entre as diversas categorias e localidades pelo Brasil.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step8',
                intro: '<p class="text-center">Ou você pode ver as últimas ONGs que cadastraram vagas em nossa plataforma.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step9',
                intro: '<p class="text-center">No menu de <span class="laranja">Configurações Globais</span> você poderá criar a página de sua ONG e divulgar suas vagas, é simples e rápido.<br/>Compartilhe o trabalho voluntário e transforme o Brasil!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        case 'pt':
          internoTour.setOptions({
            steps: [
              // CUIDAR
              {
                element: '.tour-pilar-cuidar-step1',
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Cuidar</span>.<br/>Aqui você pode encontrar vagas em diversas ONGs espalhadas pelo Brasil, poderá se cadastrar a uma delas e compartilhar com outros viajantes o trabalho voluntário em nosso país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step2',
                intro: '<p class="text-center">Você também poderá divulgar suas vagas caso possua uma ONG, possibilitando a outros viajantes esta troca de experiências!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step3',
                intro: '<p class="text-center">Nosso menu lateral esquerdo servirá como bússola para te guiar nas mais completas experiências de voluntariado pelo país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step4',
                intro: '<p class="text-center">Em <span class="laranja">Página Inicial</span> você poderá buscar pelas mais diversas ONGs em todo país.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step5',
                intro: '<p class="text-center">Em <span class="laranja">Projetos</span> você verá os projetos sociais mais acessados por nossos viajantes transformadores.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step6',
                intro: '<p class="text-center">Em <span class="laranja">Vagas</span> você encontrará as vagas para os trabalhos voluntários mais irados!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step7',
                intro: '<p class="text-center">Você pode usar a busca para encontrar a ONG que é a sua cara, buscando entre as diversas categorias e localidades pelo Brasil.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step8',
                intro: '<p class="text-center">Ou você pode ver as últimas ONGs que cadastraram vagas em nossa plataforma.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step9',
                intro: '<p class="text-center">No menu de <span class="laranja">Configurações Globais</span> você poderá criar a página de sua ONG e divulgar suas vagas, é simples e rápido.<br/>Compartilhe o trabalho voluntário e transforme o Brasil!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      internoTour.start();
    }
  });

  function verificaMarketPlace(){
    if($("#restaurantes")){
      // CHEFSCLUB
      switch(linguaAtiva){
        case 'en':
          pilarVendasTour.setOptions({
            steps: [
              // CHEFSCLUB
              {
                element: '.tour-chefsclub-step1',
                intro: '<p class="text-center">Aqui você pode selecionar e buscar os melhores descontos em restaurantes do país!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-chefsclub-step2',
                intro: '<p class="text-center">Ou pode degustar essa maravilhosa seleção que fizemos para você!<br/>Venha saborear o que há de melhor no Brasil, entre para o clube!</p>',
                position: 'top'
              }
            ]
          });
        break;
        case 'pt':
          pilarVendasTour.setOptions({
            steps: [
              // CHEFSCLUB
              {
                element: '.tour-chefsclub-step1',
                intro: '<p class="text-center">Aqui você pode selecionar e buscar os melhores descontos em restaurantes do país!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-chefsclub-step2',
                intro: '<p class="text-center">Ou pode degustar essa maravilhosa seleção que fizemos para você!<br/>Venha saborear o que há de melhor no Brasil, entre para o clube!</p>',
                position: 'top'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      pilarVendasTour.start();
    }
  };
});
