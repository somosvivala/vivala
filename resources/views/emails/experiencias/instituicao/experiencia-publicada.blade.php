@extends('emails._base', [
  'emailCabecalho' => 'A sua experiência foi publicada com sucesso!',
  'emailTitulo' => 'Temos uma novidade pra você!'
])

  <!-- Primeira SEÇÃO [Exclusivo de experiências] -->
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'expCorTextos' => '#3EA790',
    'expTextoCima' => 'Sua Experiência foi publicada!',
    'expTextoBaixo' => 'Agradecemos a sua contribuição em nossa listagem de Experiências. Confira abaixo todos os detalhes!',
    'expLinkImagem' => 'img/icones/png/verde-lista-vazio.png',
    'expAltImagem' => 'Experiência Publicada',
    'expTitleImagem' => 'Experiência Publicada'
  ])
  <!-- Fim da Primeira SEÇÃO [Exclusivo de experiências] -->

  <!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
    <tr></tr>
  </td>
  <!-- Fim do Separador -->

  <!-- Segunda SEÇÃO -->
  @section('email-conteudo')
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Experiencia
    ])
  @stop
  <!-- Fim da Segunda SEÇÃO -->
