@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Uma inscrição foi confirmada com sucesso na sua experiência!',
  'emailTitulo' => 'Sua experiência tem uma nova inscrição!'
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#25A494',
      'expTextoCima' => '',
      'expTextoBaixo' => 'A sua experiência tem uma inscrição confirmada',
      'expLinkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
      'expAltImagem' => 'Inscrição Confirmada',
      'expTitleImagem' => 'Inscrição Confirmada'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DADOS do USUÁRIO INSCRITO --}}
    @include('emails.experiencias._info-inscricao-instituicao-dados-candidato', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de COMPROVANTE DE PAGAMENTO
    @include('emails.experiencias._info-inscricao-instituicao-comprovante-pagamento', [
      'Inscricao' => $Inscricao
    ])
    --}}

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Inscricao->experiencia
    ])
  @stop
