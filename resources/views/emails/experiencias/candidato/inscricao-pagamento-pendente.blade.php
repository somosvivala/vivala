@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Sua experiência está em andamento',
  'emailTitulo' => 'Falta apenas um passo para sua Experiência acontecer!'
])
<?php
  $expTextoBaixo = 'Para confirmar sua inscrição na experiência da <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong>,<br>realize o depósito de <strong>R$'.trim($Inscricao->experiencia->preco).'</strong> na conta a seguir:';
?>
  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#FAA325',
      'expTextoCima' => 'Você está quase lá!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/laranja-pagamento-cartao-vazio.png',
      'expAltImagem' => 'Pagamento em Análise',
      'expTitleImagem' => 'Pagamento em Análise'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-inscricao-pendente-candidato', [
      'Inscricao' => $Inscricao
    ])
  @stop
