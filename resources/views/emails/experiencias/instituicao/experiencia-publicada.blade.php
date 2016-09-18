@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência foi publicada com sucesso!',
  'emailTitulo' => 'Temos uma novidade pra você!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => 'Sua Experiência foi publicada!',
      'expTextoBaixo' => 'Agradecemos a sua contribuição em nossa listagem de Experiências. Confira abaixo todos os detalhes!',
      'expLinkImagem' => 'img/icones/png/verde-lista-vazio.png',
      'expAltImagem' => 'Experiência Publicada',
      'expTitleImagem' => 'Experiência Publicada'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Experiencia
    ])
  @stop
