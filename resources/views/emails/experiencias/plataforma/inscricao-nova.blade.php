<?php
  $emailTitulo = 'A experiência da <strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong><br>tem uma nova inscrição';
?>
  @extends('emails.experiencias._base-experiencias', [
    'emailCabecalho' => 'Nova Inscrição na Experiência',
    'emailTitulo' => $emailTitulo
  ])

  @section('email-experiencia-conteudo')
    @include('emails.experiencias._info-inscricao-nova-plataforma', [
      'Inscricao' => $Inscricao
    ])
  @stop
