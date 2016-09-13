<?php
  $emailTitulo = 'Obrigado pela confiança,<strong>'. ucfirst(trim($Inscricao->perfil->nome)) . '</strong>!';
  $textoBaixo = 'Sua inscrição foi confirmada na experiência<br>oferecida pela <strong>'. mb_strtoupper(trim($Inscricao->experiencia->owner_nome)) . '</strong>!';
?>

@include('emails._header', [
  'emailCabecalho' => 'Sua experiência foi confirmada com sucesso!',
  'emailTitulo' => $emailTitulo
]);

<!-- Primeira SEÇÃO -->
  @include('emails.experiencias._experiencias_img-cabecalho', [
    'corTextos' => '#25A494',
    'textoCima' => 'Pagamento realizado com sucesso!',
    'textoBaixo' => $textoBaixo,
    'linkImagem' => 'img/icones/png/verde-sucesso-vazio.png',
    'titleImagem' => 'Pagamento Confirmado',
    'altImagem' => 'Pagamento Confirmado'
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
    'divisor' => true
  ]);
<!-- Fim da Segunda SEÇÃO -->

<!-- Separador -->
<td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
  <tr></tr>
</td>
<!-- Fim do Separador -->

@include('emails._footer')
