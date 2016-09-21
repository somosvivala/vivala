@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência vai acontecer em alguns dias!',
  'emailTitulo' => 'A sua Experiência está quase chegando!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#F89916',
      'expTextoCima' => '',
      'expTextoBaixo' => 'Confira os detalhes da Experiência e algumas dicas da<br>Vivalá para que tudo corra bem!',
      'expLinkImagem' => 'img/icones/png/laranja-atencao-vazio.png',
      'expAltImagem' => 'Experiência Eminente',
      'expTitleImagem' => 'Experiência Eminente'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-instituicao-eminente', [
      'Experiencia' => $Inscricoes->first()->experiencia,
      'Inscricoes' => $Inscricoes
    ])
  @stop
