@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência é hoje!',
  'emailTitulo' => 'A experiência que você se inscreveu é hoje!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => 'Sua experiência é hoje!',
      'expTextoBaixo' => 'Confira os detalhes da Experiência e algumas dicas da Vivalá para que tudo corra bem!',
      'expLinkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
      'expAltImagem' => 'Experiência Hoje',
      'expTitleImagem' => 'Experiência Hoje!'
    ])
  @stop
  
  @section('email-experiencia-conteudo')

    {{-- SEÇÃO de DICAS PARA O CANDIDATO --}}
    @include('emails.experiencias._info-inscricao-candidato-experiencia-eminente', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-experiencia', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da INSTITUIÇÃO que está promovendo a EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-instituicao', [
      'Inscricao' => $Inscricao
    ])
  @stop
