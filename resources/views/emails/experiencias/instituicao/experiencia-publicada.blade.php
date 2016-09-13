@include('emails._header', [
  'emailCabecalho' => 'A sua experiência foi publicada com sucesso!',
  'emailTitulo' => 'Temos uma novidade pra você!'
]);

<!-- Primeira SEÇÃO -->
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'corTextos' => '#3EA790',
    'textoCima' => 'Sua Experiência foi publicada!',
    'textoBaixo' => 'Agradecemos a sua contribuição em nossa listagem de Experiências. Confira abaixo todos os detalhes!',
    'linkImagem' => 'img/icones/png/verde-lista-vazio.png',
    'titleImagem' => 'Experiência Publicada',
    'altImagem' => 'Experiência Publicada'
  ]);
<!-- Fim da Primeira SEÇÃO -->

<!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
    <tr></tr>
  </td>
<!-- Fim do Separador -->

<!-- Segunda SEÇÃO -->
  @include('emails.experiencias._experiencias_info-instituicao', [
    'Experiencia' => $Experiencia
  ]);
<!-- Fim da Segunda SEÇÃO -->

<!-- Separador -->
<td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
  <tr></tr>
</td>
<!-- Fim do Separador -->

@include('emails._footer')
