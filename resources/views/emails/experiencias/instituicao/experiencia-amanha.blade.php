@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência é amanhã!',
  'emailTitulo' => 'Amanhã é a sua Experiência!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '##3EA790',
      'expTextoCima' => '',
      'expTextoBaixo' => 'Confira abaixo a lista de usuários inscritos<br>em sua Experiência!',
      'expLinkImagem' => 'img/icones/png/verde-usuarios-vazio.png',
      'expAltImagem' => 'Sua experiência é Amanhã',
      'expTitleImagem' => 'Sua experiência é Amanhã'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-instituicao-amanha', [
      'Experiencia' => $Inscricoes->first()->experiencia,
      'Inscricoes' => $Inscricoes
    ])
  @stop
