@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Experiência Desativada',
  'emailTitulo' => 'Uma experiência foi desativada na Vivalá'
])

  @section('email-experiencia-cabecalho')
    <?php
      $expTextoBaixo = 'A Experiência da <strong>'.mb_strtoupper(trim($Experiencia->owner_nome)).'</strong> foi <strong>DESATIVADA</strong> da Vivalá com sucesso!';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#F89916',
      'expTextoCima' => 'Experiência desativada da plataforma',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/laranja-atencao-cheio.png',
      'expAltImagem' => 'Experiência Desativada',
      'expTitleImagem' => 'Experiência Desativada'
    ])
  @stop

  @section('email-experiencia-conteudo')

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Experiencia
    ])
  @stop
