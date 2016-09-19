@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Pagamento em análise',
  'emailTitulo' => 'Falta pouco para sua experiência acontecer!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#FAA325',
      'expTextoCima' => '',
      'expTextoBaixo' => 'O seu pagamento foi recebido e está em análise. Logo entraremos em contato para confirmar a sua inscrição!',
      'expLinkImagem' => 'img/icones/png/laranja-retorno-vazio.png',
      'expAltImagem' => 'Pagamento em Análise',
      'expTitleImagem' => 'Pagamento em Análise'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-inscricao-candidato', [
      'Inscricao' => $Inscricao,
      'divisor' => false
    ])
  @stop
