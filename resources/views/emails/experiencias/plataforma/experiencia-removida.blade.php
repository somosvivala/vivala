@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Experiência Removida',
  'emailTitulo' => 'Uma experiência foi removida da Vivalá'
])

  @section('email-experiencia-cabecalho')
    <?php
      $expTextoBaixo = 'A Experiência da <strong>'.mb_strtoupper(trim($Experiencia->owner_nome)).'</strong> foi <strong>REMOVIDA</strong> da Vivalá com sucesso!';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#CB171E',
      'expTextoCima' => 'Experiência removida da plataforma!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/vermelho-cancelado-cheio.png',
      'expAltImagem' => 'Experiência Removida da Vivalá',
      'expTitleImagem' => 'Experiência Removida da Vivalá'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Experiencia
    ])
  @stop
