<?php
  $emailTitulo = 'Obrigado pela confiança,<strong>'.ucfirst(trim($Inscricao->perfil->nome)).'</strong>!';
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Sua experiência foi confirmada com sucesso!',
  'emailTitulo' => $emailTitulo
])

  <?php
  $textoBaixo = 'Sua inscrição foi confirmada na experiência<br>oferecida pela <strong>'. mb_strtoupper(trim($Inscricao->experiencia->owner_nome)) . '</strong>!';
  ?>
  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#25A494',
      'expTextoCima' => 'Pagamento realizado com sucesso!',
      'expTextoBaixo' => $textoBaixo,
      'expLinkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
      'expAltImagem' => 'Pagamento Confirmado',
      'expTitleImagem' => 'Pagamento Confirmado'
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
