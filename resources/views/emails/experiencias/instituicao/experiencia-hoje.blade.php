@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência é hoje!',
  'emailTitulo' => 'Chegou o dia da sua Experiência!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '##3EA790',
      'expTextoCima' => '',
      'expTextoBaixo' => 'Confira abaixo a lista final de usuários inscritos<br>em sua Experiência!',
      'expLinkImagem' => 'img/icones/png/verde-usuarios-vazio.png',
      'expAltImagem' => 'Experiência é Hoje',
      'expTitleImagem' => 'Experiência é Hoje'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DICAS EXP. HOJE PARA INSTITUIÇÃO --}}
    @include('emails.experiencias._info-experiencia-instituicao-dicas-experiencia-hoje')

    {{-- SEÇÃO de INFOS DE USUÁRIOS + SEÇÃO de INFOS DA EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-instituicao-experiencia-hoje', [
      'Experiencia' => $Inscricoes->first()->experiencia,
      'Inscricoes' => $Inscricoes
    ])

  @stop
