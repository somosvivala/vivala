@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Experiência Publicada',
  'emailTitulo' => 'Uma experiência foi publicada na Vivalá'
])

  @section('email-experiencia-cabecalho')
    <?php
      $expTextoBaixo = 'A Experiência da <strong>'.mb_strtoupper(trim($Experiencia->owner_nome)).'</strong> foi <strong>PUBLICADA</strong> na Vivalá com sucesso!';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => 'Experiência publicada na plataforma!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/verde-sucesso-cheio.png',
      'expAltImagem' => 'Experiência Publicada na Vivalá',
      'expTitleImagem' => 'Experiência Publicada na Vivalá'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Experiencia
    ])
  @stop
