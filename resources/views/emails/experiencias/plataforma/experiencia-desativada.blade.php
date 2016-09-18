@extends('emails._base', [
  'emailCabecalho' => 'Experiência Desativada',
  'emailTitulo' => 'Uma experiência foi desativada na Vivalá'
])

  <!-- Primeira SEÇÃO [Exclusivo de experiências] -->
  <?php
    $expTextoBaixo = 'A Experiência da <strong>{{ mb_strtoupper(trim($Experiencia->owner_nome)) }}</strong> foi <strong>DESATIVADA</strong> da Vivalá com sucesso!';
  ?>
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'expCorTextos' => '#F89916',
    'expTextoCima' => 'Experiência desativada da plataforma',
    'expTextoBaixo' => $expTextoBaixo,
    'expLinkImagem' => 'img/icones/png/laranja-atencao-cheio.png',
    'expAltImagem' => 'Experiência Desativada',
    'expTitleImagem' => 'Experiência Desativada'
  ])
  <!-- Fim da Primeira SEÇÃO [Exclusivo de experiências] -->

  <!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
    <tr></tr>
  </td>
  <!-- Fim do Separador -->

  <!-- Segunda SEÇÃO -->
  @section('email-conteudo')
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Experiencia
    ])
  @stop
  <!-- Fim da Segunda SEÇÃO -->
