@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência é amanhã!',
  'emailTitulo' => 'A experiência que você se inscreveu é amanhã!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => 'Sua experiência é amanhã!',
      'expTextoBaixo' => 'Confira os detalhes da Experiência para que tudo corra bem!',
      'expLinkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
      'expAltImagem' => 'Experiência Amanhã',
      'expTitleImagem' => 'Experiência Amanhã!'
    ])
  @stop

  @section('email-experiencia-conteudo')

    {{-- SEÇÃO de DICAS PARA O CANDIDATO
    @include('emails.experiencias._info-inscricao-candidato-dicas-experiencia-hoje', [
      'Inscricao' => $Inscricao
    ])
    --}}

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-experiencia', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da INSTITUIÇÃO que está promovendo a EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-instituicao', [
      'Inscricao' => $Inscricao
    ])
  @stop
