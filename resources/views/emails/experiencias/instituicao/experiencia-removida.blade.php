@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'A sua experiência foi removida com sucesso!',
  'emailTitulo' => 'A sua experiência foi removida'
])

  @section('email-experiencia-cabecalho')
    <?php
      $expTextoBaixo =
        'Sua experiência foi removida da Vivalá por algum motivo,<br>
        para saber melhor o que ocorreu entre em contato conosco<br>
        através do email <strong><a href="mailto:'. env("VIVALA_LINK_EMAIL") .'" target="_top" style="text-decoration:none; color:#CB171E;">'. env("VIVALA_LINK_EMAIL") .'</a></strong><br>
        ou pelo telefone <strong><a href="tel:'. env("VIVALA_LINK_TELEFONE_CONTATO2") .'" target="_top" style="text-decoration:none;">'. env("VIVALA_LINK_TELEFONE_CONTATO2") .'</a>';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#CB171E',
      'expTextoCima' => 'Sua Experiência foi removida da Vivalá!',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/vermelho-cancelado-vazio.png',
      'expAltImagem' => 'Experiência Publicada na Vivalá',
      'expTitleImagem' => 'Experiência Publicada na Vivalá'
    ])
  @stop

  @section('email-experiencia-conteudo')
  
    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-instituicao', [
      'Experiencia' => $Experiencia
    ])
  @stop
