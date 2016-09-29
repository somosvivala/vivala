@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Um cliente cancelou sua participação em sua Experiência',
  'emailTitulo' => 'Houve um cancelamento na sua Experiência'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#CB171E',
      'expTextoCima' => '',
      'expTextoBaixo' => 'A sua experiência tem uma inscrição cancelada',
      'expLinkImagem' => 'img/icones/png/vermelho-cancelado-vazio.png',
      'expAltImagem' => 'Inscrição Cancelada',
      'expTitleImagem' => 'Inscrição Cancelada'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DADOS do USUÁRIO INSCRITO --}}
    @include('emails.experiencias._info-inscricao-instituicao-dados-candidato', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Inscricao->experiencia
    ])
  @stop
