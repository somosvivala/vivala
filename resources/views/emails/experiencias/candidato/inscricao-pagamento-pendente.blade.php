@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Sua experiência está em andamento',
  'emailTitulo' => 'Falta apenas um passo para sua Experiência acontecer!'
])
<?php
  $expTextoBaixo = 'Para confirmar sua inscrição na experiência da <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong>, realize o depósito de <strong>R$'.trim($Inscricao->experiencia->preco).'</strong> na conta a seguir:';
?>
  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#FAA325',
      'expTextoCima' => 'Você está quase lá!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/laranja-pagamento-dinheiro-vazio.png',
      'expAltImagem' => 'Pagamento em Análise',
      'expTitleImagem' => 'Pagamento em Análise'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de PAGAMENTOS do CANDIDATO --}}
    @include('emails.experiencias._info-inscricao-candidato-dados-pagamento', [
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
