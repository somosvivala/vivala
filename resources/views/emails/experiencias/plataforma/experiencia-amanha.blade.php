@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Experiência Amanhã',
  'emailTitulo' => 'Uma experiência vai acontecer amanhã na Vivalá'
])

  @section('email-experiencia-cabecalho')
    <?php
        //Obtendo a experiencia atraves das inscricoes
        if ( !isset($Experiencia) ) {
            $Experiencia = $Inscricoes->first()->experiencia;
        }

      $expTextoBaixo = 'A Experiência da <strong>'.mb_strtoupper(trim($Experiencia->owner_nome)).'</strong> acontece <strong>AMANHÃ</strong> na Vivalá!';
    ?>
    @include('emails.experiencias._experiencias_img-cabecalho', [
      'expCorTextos' => '#F89916',
      'expTextoCima' => '',
      'expTextoBaixo' => $expTextoBaixo,
      'expLinkImagem' => 'img/icones/png/laranja-atencao-cheio.png',
      'expAltImagem' => 'Experiência Amanhã',
      'expTitleImagem' => 'Experiência Amanhã'
    ])
  @stop

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DICAS EXP. AMANHÃ PARA PLATAFORMA --}}
    @include('emails.experiencias._info-experiencia-plataforma-dicas-experiencia-amanha')

    {{-- SEÇÃO de INFOS DE USUÁRIOS + SEÇÃO de INFOS DA EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-plataforma-amanha', [
      'Experiencia' => $Inscricoes->first()->experiencia,
      'Inscricoes' => $Inscricoes
    ])
  @stop
