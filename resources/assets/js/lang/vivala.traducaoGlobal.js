// Pegando a lingua ativa na view no momento
var linguaAtiva = $("meta[name=language]").attr("content");
var lingua = [];

switch(linguaAtiva){
  case 'pt':
    // Botão Curtir
    lingua[0] = ' Curtidas',
    lingua[1] = ' Curtida',
    lingua[2] = ' Curtir',
    // Modal Feedback
    lingua[3] = 'Muito Obrigado!',
    lingua[4] = 'Seu feedback foi enviado.',
    lingua[5] = 'Entraremos em contato assim que possivel.',
    // Modal Cotação Viagem
    lingua[6] = 'Cotação enviada com sucesso!',
    lingua[7] = 'Nosso time fará de tudo para encontrar a viagem que mais se encaixa com você!',
    lingua[8] = 'Um email de resposta sobre sua viagem chegará em breve, fique atento à sua caixa de email.',
    lingua[9] = 'Não foi possível realizar a sua cotação',
    lingua[10] = 'Um erro ocorreu em nosso sistema e sua cotação não pode ser enviada!',
    lingua[11] = 'Pedimos desculpas pelo transtorno e pedimos que tente novamente mais tarde.',
    lingua[12] = 'Caso você faça a cotação de <strong style="color:'+corLaranjaPrimario+'">VÔOS + HOSPEDAGEM</strong> conseguimos um desconto de <strong>35%</strong> no valor do aluguel do CARRO!'
    lingua[13] = 'Pouquíssimo',
    lingua[14] = 'Pouco',
    lingua[15] = 'Moderado',
    lingua[16] = 'Muito',
    lingua[17] = 'Muitíssimo',
    lingua[18] = 'Criança',
    lingua[19] = 'Alguns meses',
    lingua[20] = 'ano',
    lingua[21] = 'anos',
    // Busca de perfis
    lingua[22] = 'Sua busca não retornou perfil algum!',
    // Compartilhamento de postagem
    lingua[23] = 'Você quer compartilhar esse post?',
    lingua[24] = 'Sim, compartilhar!',
    lingua[25] = 'Não',
    lingua[26] = 'Opa!',
    lingua[27] = 'Você não pode compartilhar seu próprio post!',
    // ClickBus
    lingua[28] = 'Ops, algo saiu errado, por favor faça a busca novamente.',
    lingua[29] = 'Compra realizada com sucesso. Sua viagem de ',
    lingua[30] = ' para ',
    lingua[31] = 'está garantida. Em caso de dúvidas entre em contato pelo email '
    lingua[32] = 'Confirmaço de dados realizada com sucesso.',
    lingua[33] = 'Sua viagem de ',
    lingua[34] = 'Iremos redirecioná-lo para finalizar sua compra, se isso nao acontecer clique ',
    lingua[35] = 'aqui',
    lingua[36] = 'Sucesso',
    // ClickBus Booking
    lingua[37] = 'Ocorreu um problema durante a reserva da sua poltrona!',
    // Crop de Foto
    lingua[38] = 'A imagem não pode ter tamanho superior a 12MB!',
    // ClickBus - Rodoviario
    lingua[39] = 'Ooopa!',
    lingua[40] = 'Ocorreu um problema com seu cupom',
    lingua[41] = 'USAR CUPOM',
    lingua[42] = 'Atenção!',
    lingua[43] = 'Voce selecionou um numero diferente de passagens de ida e volta. Deseja continuar mesmo assim?',
    lingua[44] = 'Sim, continuar.',
    lingua[45] = 'Não, corrigir!',
    lingua[46] = 'Você não selecionou uma passagem de volta. Deseja continuar mesmo assim?',
    lingua[47] = 'Opa, aconteceu um problema',
    lingua[48] = 'Você não selecionou uma passagem de ida!'
  break;
  case 'en':
    // Botão Curtir
    lingua[0] = ' Likes',
    lingua[1] = ' Like',
    lingua[2] = ' Like',
    // Modal Feedback
    lingua[3] = 'Thank You!',
    lingua[4] = 'Your feedback has been sent.',
    lingua[5] = 'We\'ll get in touch as soon as possible.',
    // Modal Cotação Viagem
    lingua[6] = 'Trip estimate send with success!',
    lingua[7] = 'Our team will do everything to find the trip that fits more with you!',
    lingua[8] = 'A reply email about your trip is coming soon, stay tuned to your mailbox.',
    lingua[9] = 'It wasn\'t possible to estimate your trip',
    lingua[10] = 'An error occurred in our system and your trip estimate can\'t be send!',
    lingua[11] = 'We apologize for the inconvenience and ask you to try again later.',
    lingua[12] = 'If you choose <strong style="color:'+corLaranjaPrimario+'">FLIGHTS + HOSTING</strong> option we can get a <strong>35%</strong> discount on CAR rental amount.'
    lingua[13] = 'Very Little',
    lingua[14] = 'Little',
    lingua[15] = 'Moderate',
    lingua[16] = 'Much',
    lingua[17] = 'Very Much',
    lingua[18] = 'Child',
    lingua[19] = 'Some months',
    lingua[20] = 'year',
    lingua[21] = 'years',
    // Busca de perfis
    lingua[22] = 'Your search has returned no profiles!',
    // Compartilhamento de postagem
    lingua[23] = 'Do you want to share this post?',
    lingua[24] = 'Yes, wanna share!',
    lingua[25] = 'No',
    lingua[26] = 'Ops!',
    lingua[27] = 'You can\'t share your own post!',
    // ClickBus
    lingua[28] = 'Ops, something went wrong, do the search again please.',
    lingua[29] = 'Purchase successfully completed. Your travel from ',
    lingua[30] = ' to ',
    lingua[31] = 'is guaranteed. For more questions please contact us by email ',
    lingua[32] = 'Payment data successfully confirmed.',
    lingua[33] = 'Your travel from ',
    lingua[34] = 'We will redirect you to finalize your purchase, if that doesn\'t happen click ',
    lingua[35] = 'here',
    lingua[36] = 'Success',
    // ClickBus Booking
    lingua[37] = 'There was a problem during the booking of your seat!',
    // Crop de Foto
    lingua[38] = 'The image size cannot be more than 12MB!',
    // ClickBus - Rodoviario
    lingua[39] = 'Ooops!',
    lingua[40] = 'There was a problem with your voucher',
    lingua[41] = 'USE VOUCHER',
    lingua[42] = 'Watch out!',
    lingua[43] = 'You selected a different number of departure and return tickets. Would you like to continue anyway?',
    lingua[44] = 'Yes, continue.',
    lingua[45] = 'No, i\'ll fix it!',
    lingua[46] = 'You have not selected a return ticket. Continue anyway?',
    lingua[47] = 'Ops, there was a problem',
    lingua[48] = 'You did not select a departure ticket!'
  break;
  default:
}
