@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua inscrição na experiêcia foi cancelada',
  'emailTitulo' => 'O seu pedido de cancelamento foi efetivado'
])

  <?php
    $expTextoBaixo = 'Sua inscrição foi cancelada na experiência oferecida pela <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong>!';
  ?>
  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#CB171E',
      'expTextoCima' => 'A sua inscrição foi cancelada',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/vermelho-cancelado-vazio.png',
      'expAltImagem' => 'Inscrição Cancelada',
      'expTitleImagem' => 'Inscrição Cancelada'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-experiencia', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de INFOS da INSTITUIÇÃO que está promovendo a EXPERIÊNCIA --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-instituicao', [
      'Inscricao' => $Inscricao
    ])
  @stop
