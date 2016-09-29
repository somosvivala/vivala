@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Sua experiência está chegando!',
  'emailTitulo' => 'Confira os detalhes da sua experiência!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => '',
      'expTextoBaixo' => 'Confira os detalhes da Experiência e algumas dicas da Vivalá para que tudo corra bem!',
      'expLinkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
      'expAltImagem' => 'Pagamento Confirmado',
      'expTitleImagem' => 'Pagamento Confirmado'
    ])
  @stop

  @section('email-experiencia-conteudo')

    {{-- SEÇÃO de DICAS PARA O CANDIDATO
    @include('emails.experiencias._info-inscricao-candidato-experiencia-eminente', [
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
