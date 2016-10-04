@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Experiência Hoje',
  'emailTitulo' => 'Uma experiência vai acontecer hoje na Vivalá'
])

  @section('email-experiencia-cabecalho')
    <?php
      $expTextoBaixo = 'A Experiência da <strong>'.mb_strtoupper(trim($Experiencia->owner_nome)).'</strong> acontece <strong>HOJE</strong> na Vivalá!';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#3EA790',
      'expTextoCima' => '',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/verde-sucesso-cheio.png',
      'expAltImagem' => 'Experiência Hoje',
      'expTitleImagem' => 'Experiência Hoje'
    ])
  @stop

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-experiencia-plataforma-hoje', [
      'Experiencia' => $Inscricoes->first()->experiencia,
      'Inscricoes' => $Inscricoes
    ])
  @stop
