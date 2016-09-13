@include('emails._header', [
  'emailCabecalho' => 'Pagamento em análise',
  'emailTitulo' => 'Falta pouco para sua experiência acontecer!'
]);

<!-- Primeira SEÇÃO -->
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'corTextos' => '#FAA325',
    'textoCima' => '',
    'textoBaixo' => 'O seu pagamento foi recebido e está em análise. Logo entraremos em contato para confirmar a sua inscrição!',
    'linkImagem' => 'img/icones/png/laranja-retorno-vazio.png',
    'titleImagem' => 'Pagamento em Análise',
    'altImagem' => 'Pagamento em Análise'
  ]);
<!-- Fim da Primeira SEÇÃO -->

<!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:7px 20px;">
    <tr></tr>
  </td>
<!-- Fim do Separador -->

<!-- Segunda SEÇÃO -->
  @include('emails.experiencias._experiencias_info-candidato', [
    'Inscricao' => $Inscricao,
    'divisor' => false
  ]);
<!-- Fim da Segunda SEÇÃO -->

<!-- Separador -->
<td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
  <tr></tr>
</td>
<!-- Fim do Separador -->

@include('emails._footer')
