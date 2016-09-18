@extends('emails._base', [
  'emailCabecalho' => 'Experiência Removida',
  'emailTitulo' => 'Uma experiência foi removida da Vivalá'
])

  <!-- Primeira SEÇÃO [Exclusivo de experiências] -->
  <?php
    $expTextoBaixo = 'A Experiência da <strong>{{ mb_strtoupper(trim($Experiencia->owner_nome)) }}</strong> foi <strong>REMOVIDA</strong> da Vivalá com sucesso!';
  ?>
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'expCorTextos' => '#CB171E',
    'expTextoCima' => 'Experiência removida da plataforma!',
    'expTextoBaixo' => $expTextoBaixo,
    'expLinkImagem' => 'img/icones/png/vermelho-cancelado-cheio.png',
    'expAltImagem' => 'Experiência Removida da Vivalá',
    'expTitleImagem' => 'Experiência Removida da Vivalá'
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
