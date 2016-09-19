@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência será daqui há alguns dias!',
  'emailTitulo' => 'A experiência que você se inscreveu está quase chegando!'
])
<?php
  $expTextoBaixo = 'Para confirmar sua inscrição na experiência da <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong>,<br>realize o depósito de <strong>R$'.trim($Inscricao->experiencia->preco).'</strong> na conta a seguir:';
?>
  @section('email-experiencia-cabecalho')
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#FAA325',
      'expTextoCima' => 'Falta apenas um passo para confirmar sua inscrição!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/laranja-pagamento-cartao-vazio.png',
      'expAltImagem' => 'Pagamento Pendente',
      'expTitleImagem' => 'Pagamento Pendente'
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
