@extends('emails._base', [
  'emailCabecalho' => 'Experiência Publicada',
  'emailTitulo' => 'Uma experiência foi publicada na Vivalá'
])

  <!-- Primeira SEÇÃO [Exclusivo de experiências] -->
  <?php
    $expTextoBaixo = 'A Experiência da <strong>{{ mb_strtoupper(trim($Experiencia->owner_nome)) }}</strong>foi <strong>PUBLICADA</strong> na Vivalá com sucesso!';
  ?>
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'expCorTextos' => '#3EA790',
    'expTextoCima' => 'Experiência publicada na plataforma!',
    'expTextoBaixo' => $expTextoBaixo,
    'expLinkImagem' => 'img/icones/png/verde-sucesso-cheio.png',
    'expAltImagem' => 'Experiência Publicada na Vivalá',
    'expTitleImagem' => 'Experiência Publicada na Vivalá'
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
