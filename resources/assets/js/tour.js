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


  /* Comentado pois não estava funcionando na versão da HOME -> VIAJAR
    */
    //console.log("Estou dentro da Vivalá, preciso mostrar a TOUR INICIAL");
    // TOUR INTERNO
    switch(linguaAtiva){
      case 'en':
        introTour.setOptions({
          steps: [
            // 3 PILARES
            {
              element: '.tour-pilares-step1',
              intro: '<p class="text-center">Hello Traveller!<br/>We note that this is the first time you visit the <span class="laranja">Vivalá</span>.<br/>Through the tour we\'ll give you a hand and help you to see how things work around here.<br/>It\'s just a few steps and we promise that will take a little of your time.<br/>Let\'s Go!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step2',
              intro: '<p class="text-center">Our platform is divided into <span class="laranja">3 big distinct pilars</span>.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step3',
              intro: '<p class="text-center"><span class="laranja">Quero me Conectar</span> it is the pillar where we are now.<br/>It is our social network for you to connect with people who loves to travel and do volunteer work.<br/>Share more your experiences!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step4',
              intro: '<p class="text-center"><span class="laranja">Quero Viajar</span> is the pillar made ​​for you who wants to explore the world! Here, we offer air tickets, lodging, car rental, bus tickets and alimentation with incredible discounts.<br/>All in one place for you to stay quiet when traveling!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step5',
              intro: '<p class="text-center"><span class="laranja">Quero Cuidar</span> is our pillar for big changes! Here you can find NGO\'s and Social Projects that need help throughout Brazil.<br/>By entries in volunteer jobs you can live a unique experience, transforming yourself and the reality around you!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step6',
              intro: '<p class="text-center">Know from other <span class="laranja">Travellers</span> who are following you and who now receive your posts. Share!</p>',
              position: 'bottom'
            },
            /* Desabilitado icone de CHAT, logo não é pra funcionar mais
            {
              element: '.tour-pilares-step7',
              intro: '<p class="text-center">Exchange private messages with other users of <span class="laranja">Vivalá</span>.</p>',
              position: 'bottom'
            },
            */
            {
              element: '.tour-pilares-step8',
              intro: '<p class="text-center">Get inside and interact with those who walk enjoying and commenting on your posts!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step9',
              intro: '<p class="text-center">This is the <span class="laranja">Help</span> button. Click here when you need a helping hand. All three pillars have tips made ​​especially for you have no problems while you surf on <span class="laranja">Vivalá</span>!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step10',
              intro: '<p class="text-center">And last but not least, this is the <span class="laranja">Configuration</span> menu from your account and profile.<br/>Discover the possibilities!</p>',
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
              intro: '<p class="text-center">Olá Viajante!<br/>Verificamos que está é a primeira vez que você visita a <span class="laranja">Vivalá</span>.<br/>Através do tour vamos te dar uma mãozinha e te ajudar a ver como as coisas funcionam por aqui.<br/>São apenas alguns passos e prometemos que vai levar pouco do seu tempo.<br/>Vamos lá!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step2',
              intro: '<p class="text-center">A nossa plataforma está divididas em <span class="laranja">3 grandes pilares</span> distintos.</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step3',
              intro: '<p class="text-center"><span class="laranja">Quero me Conectar</span> é o pilar em que estamos agora.<br/>Ele é nossa rede social para você se conectar com pessoas que amam viajar e fazer voluntariado.<br/>Compartilhe mais suas experiências!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step4',
              intro: '<p class="text-center"><span class="laranja">Quero Viajar</span> é o pilar feito pra você que quer explorar o mundo! Por aqui, oferecemos avião, hospedagem, aluguel de carro, ônibus e alimentação com descontos incríveis.<br/>Tudo em um único lugar pra você ficar tranquilo na hora de viajar!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step5',
              intro: '<p class="text-center"><span class="laranja">Quero Cuidar</span> é o nosso pilar para grandes transformações!<br/>Aqui você encontra ONG\'s e Projetos Sociais que precisam de ajuda espalhados pelo Brasil.<br/>Através de inscrições em vagas de voluntariado você poderá viver uma experiência única, transformando você mesmo e a realidade ao seu redor!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step6',
              intro: '<p class="text-center">Saiba de outros <span class="laranja">Viajantes</span> que estão te seguindo e que agora recebem suas postagens. Compartilhe!</p>',
              position: 'bottom'
            },
            /* Desabilitado icone de CHAT, logo não é pra funcionar mais
            {
              element: '.tour-pilares-step7',
              intro: '<p class="text-center">Troque mensagens privadas com outros usuários da <span class="laranja">Vivalá</span>.</p>',
              position: 'bottom'
            },
            */
            {
              element: '.tour-pilares-step8',
              intro: '<p class="text-center">Fique por dentro e interaja com quem anda curtindo e comentando seus posts!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step9',
              intro: '<p class="text-center">Este é botão de <span class="laranja">Ajuda</span>. Clique aqui sempre que precisar de uma mãozinha. Todos os 3 pilares possuem dicas feitas especialmente para você não ter problemas em navegar na <span class="laranja">Vivalá</span>!</p>',
              position: 'bottom'
            },
            {
              element: '.tour-pilares-step10',
              intro: '<p class="text-center">E por último, mas não menos importante, esse é o menu de <span class="laranja">Configurações</span> da sua conta e perfil.<br/>Conheça as possibilidades!</p>',
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
                intro: '<p class="text-center">You are in <span class="laranja">Quero me Conectar</span>.<br/>Here is the place to interact with thousands of people around the world, sharing travel and volunteer experiences!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step2',
                intro: '<p class="text-center">Share your aggrandizing visions with the <span class="laranja">Vivalá</span> network through your thoughts, sharing texts, photos, travel and volunteer tips!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step3',
                intro: '<p class="text-center">Here you can acess your <span class="laranja">personal timeline</span>, with threads that you held and interacted.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step4',
                intro: '<p calss="text-center">Here in the middle you can see the posts and news from people you follow into the <span class="laranja">Vivalá</span>.<br/>Stay tuned on the news!</p>',
                position: 'right'
              },
              {
                element: '.tour-pilar-conectar-step5',
                intro: '<p class="text-center">Here we select, based on your interests, a group of <span class="laranja">people similar with you</span>!<br/>Just click on follow to start receiving your updates.</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-conectar-step6',
                intro: '<p class="text-center">In <span class="laranja">Latest News</span> you can see the most recent posts on the network.<br/>Here in <span class="laranja">Give your Feedback</span> you can send messages directly to us about what can be improved here.<br/><span class="laranja">Let\'s build Vivalá together!</span></p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step7',
                intro: '<p class="text-center"><span class="laranja">Like Vivalá on Facebook</span> and stay tuned to our big news!</p>',
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
                intro: '<p class="text-center">Você está em <span class="laranja">Quero me Conectar</span>.<br/>Aqui é o lugar para interagir com milhares de pessoas do mundo, compartilhando experiências de viagem e voluntariado!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step2',
                intro: '<p class="text-center">Compartilhe visões engrandecedoras com a rede da <span class="laranja">Vivalá</span> através de seus pensamentos em textos, fotos, dicas de viagem e voluntariado!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step3',
                intro: '<p class="text-center">Aqui você terá acesso a sua <span class="laranja">linha do tempo pessoal</span>, com as postagens que realizou e interagiu.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step4',
                intro: '<p calss="text-center">Aqui no meio você poderá ver as postagens e notícias das pessoas que você segue dentro da <span class="laranja">Vivalá</span>.<br/>Fique por dentro das novidades!</p>',
                position: 'right'
              },
              {
                element: '.tour-pilar-conectar-step5',
                intro: '<p class="text-center">Aqui, baseado nos seus interesses, selecionamos <span class="laranja">pessoas parecidas com você</span>!<br/>Basta clicar em seguir para começar a receber suas atualizações.</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-conectar-step6',
                intro: '<p class="text-center">Em <span class="laranja">Últimas Notícias</span> você poderá ver as postagens mais recentes da rede.<br/>Já em <span class="laranja">Dê seu Feedback</span> você poderá nos mandar mensagens diretamente sobre o que pode ser melhorado por aqui.<br/><span class="laranja">Vamos construir a Vivalá juntos!</span></p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-conectar-step7',
                intro: '<p class="text-center"><span class="laranja">Curta a Vivalá no Facebook</span> e fique ligado em nossas novidades!</p>',
                position: 'top'
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
                intro: '<p class="text-center">You are in <span class="laranja">Quero Viajar</span>.<br/>Here you will find everything you need for traveling in Brazil and around the world.<br/>Buy airline tickets, bus tickets, rent a car, lodging and get discounts up to 50% in renowned restaurants!<br/>Explore the possibilities and travel with us!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step2',
                intro: '<p class="text-center">Here in our menu you will find all our services!</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-viajar-step3',
                intro: '<p class="text-center">In <span class="laranja">Restaurants</span> we have an advantage club with <span class="laranja">discounts up to 5 % in more than 1.600 restaurants spread across 12 Brazilian states</span>.<br/>Join the club and delight yourself!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step4',
                intro: '<p class="text-center">In <span class="laranja">Accommodation, Flights & Packages</span> you can find air tickets to over 140 countries and accommodation in more than 160 countries.<br/>We have the best prices and market partners.<br/><span class="laranja">Create packages with the possibility to add a rented car and earn up to 35% off!</span></p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step5',
                intro: '<p class="text-center">In <span class="laranja">Bus Tickets</span> you can find <span class="laranja">bus tickets to 3,000 destinations in Brazil</span>, operated by more than 60 traffic road companies!<br/>Search here on your next trip and hit the road!</p>',
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
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Viajar</span>.<br/>Aqui você encontrará tudo que precisa para viajar no Brasil e mundo afora.<br/>Compre passagens aéreas, rodoviárias, aluguel de carro, hospedagem e tenha descontos de até 50% em restaurantes renomados!<br/>Explore as possibilidades e viaje conosco!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step2',
                intro: '<p class="text-center">Aqui em nosso menu você encontra todos os nossos serviços!</p>',
                position: 'left'
              },
              {
                element: '.tour-pilar-viajar-step3',
                intro: '<p class="text-center">Em <span class="laranja">Restaurantes</span> temos um clube de vantagens com <span class="laranja">descontos de até 50% em mais de 1.600 restaurantes espalhados por 12 estados brasileiros</span>.<br/>Entre para o clube e delicie-se!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step4',
                intro: '<p class="text-center">Em <span class="laranja">Hospedagem, Vôos e Pacotes</span> você encontra passagens aéreas para mais de 140 países e hospedagem em mais de 160 países.<br/>Temos os melhores preços e parceiros do mercado.<br/><span class="laranja">Crie pacotes com a possibilidade de adicionar aluguel de carro, e ganhe até 35% de desconto!</span></p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-viajar-step5',
                intro: '<p class="text-center">Em <span class="laranja">Passagens Rodoviárias</span> você encontra <span class="laranja">passagens de ônibus para 3.000 destinos no Brasil</span>, operados por mais de 60 viações rodoviárias!<br/>Busque aqui em sua próxima viagem e pé na estrada!</p>',
                position: 'bottom'
              }
            ]
          });
        break;
        default:
        // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
      }
      internoTour.onexit(function(){
        //console.log("Estou no MarketPlace, devo mostrar ChefsClub ou ClickBus");
        internoTour.exit();
        setTimeout(verificaMarketPlace, 1000);
      });
      internoTour.oncomplete(function(){
        //console.log("Estou no MarketPlace, devo mostrar ChefsClub ou ClickBus");
        internoTour.exit();
        setTimeout(verificaMarketPlace, 1000);
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
                intro: '<p class="text-center">You are in <span class="laranja">Quero Cuidar</span>. You can find volunteer jobs in various NGOs and social impact projects throughout Brazil.<br/>Register your NGO or project and arrange volunteers, or help big projects to change realities in Brazil!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step2',
                intro: '<p class="text-center">Learn more closely NGOs and <span class="laranja">transformation projects</span> around Brazil that are registered on <span class="laranja">Vivalá</span> network.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step3',
                intro: '<p class="text-center">Find volunteer works in your city, in your travel destination or remote! <span class="laranja">Candidate yourself and start the transformation</span>!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step4',
                intro: '<p class="text-center">Use the search filters to find projects and vacant jobs for you, looking between the various categories and locations in Brazil.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step5',
                intro: '<p class="text-center">In the settings menu you can create a page of your NGO or project and spread the vacancies that you need to get your project off the ground! It is simple and fast.<br/>Share impact volunteer jobs and transform Brazil for the better!</p>',
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
                intro: '<p class="text-center">Você está em <span class="laranja">Quero Cuidar</span>. Aqui você pode encontrar vagas de voluntariado em diversas ONGs e Projetos de impacto social espalhadas pelo Brasil.<br/>Inscreva sua ONG ou Projeto e arrume voluntários ou ajude grandes projetos a mudar realidades no Brasil!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step2',
                intro: '<p class="text-center">Conheça mais de perto ONGs e <span class="laranja">projetos transformadores</span> ao redor do Brasil que estão cadastrados na rede da <span class="laranja">Vivalá</span>.</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step3',
                intro: '<p class="text-center">Encontre trabalhos voluntários em sua cidade, em seu destino de viagem ou até remoto! <span class="laranja">Se candidate e comece a transformar</span>!</p>',
                position: 'bottom'
              },
              {
                element: '.tour-pilar-cuidar-step4',
                intro: '<p class="text-center">Use os filtros de busca para encontrar projetos e vagas que tenham a sua cara, buscando entre as diversas categorias e localidades no Brasil.</p>',
                position: 'top'
              },
              {
                element: '.tour-pilar-cuidar-step5',
                intro: '<p class="text-center">No menu de configurações você poderá criar a página de sua ONG ou projeto e divulgar as vagas que você precisa para o projeto decolar! É simples e rápido.<br/>Compartilhe o trabalho voluntário de impacto e transforme o Brasil para melhor!</p>',
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

});

function verificaMarketPlace(){
  var linguaAtiva = $("meta[name=language]").attr("content");
  var pilarVendasTour = introJs(); // Tour interna do MarketPlace (ChefsClub + ClickBus)

  // Pilares Vendas (ChefsClub + Quimera + ClickBus)
  switch(linguaAtiva){
    case 'en':
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
    break;
    default:
  }

  //console.log("Entrei no MarketPlace.");
  if($("#restaurantes")){
    console.log("CHEFSCLUB");
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
              position: 'left'
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
              position: 'left'
            }
          ]
        });
      break;
      default:
      // Não encontrei o LANG, faço nada (?) ou jogo um FALLBACK em PT-BR (?)
    }
    pilarVendasTour.start();
    pilarVendasTour.oncomplete(function(){
      pilarVendasTour.exit();
    });
  }
};
