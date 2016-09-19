<?php
  $emailTitulo = 'Candidato(a) cancelado(a) na experiência da<br><strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong><br>';
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Inscrição Cancelada na Experiência',
  'emailTitulo' => $emailTitulo
])

@section('email-experiencia-conteudo')
  {{-- SEÇÃO de DADOS do USUÁRIO INSCRITO --}}
  @include('emails.experiencias._info-inscricao-plataforma-dados-candidato', [
    'Inscricao' => $Inscricao
  ])

  {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
  @include('emails.experiencias._info-experiencia-plataforma', [
    'Experiencia' => $Inscricao->experiencia
  ])
@stop
