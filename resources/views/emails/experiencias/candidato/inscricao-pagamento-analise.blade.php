<?php
  $emailTitulo = 'Falta apenas 1 passo para confirmar sua participação na experiência da '.ucfirst(trim($Inscricao->experiencia->owner_nome));
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Pagamento em análise',
  'emailTitulo' => $emailTitulo
])

  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#FAA325',
      'expTextoCima' => '',
      'expTextoBaixo' => 'O seu pagamento foi recebido e está em análise. Logo entraremos em contato para confirmar a sua inscrição!',
      'expLinkImagem' => 'img/icones/png/laranja-retorno-vazio.png',
      'expAltImagem' => 'Pagamento em Análise',
      'expTitleImagem' => 'Pagamento em Análise'
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
