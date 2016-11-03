@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Agora sua experiência faz  parte da rede da Vivalá!',
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
    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Experiencia
    ])
  @stop
