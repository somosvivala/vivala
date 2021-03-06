<?php
  $emailTitulo = 'Candidato(a) confirmado(a) na experiência do(a)<br><strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong><br>';
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Inscrição Confirmada na Experiência',
  'emailTitulo' => $emailTitulo
])

  @section('email-experiencia-conteudo')
    {{-- SEÇÃO de DADOS do USUÁRIO INSCRITO --}}
    @include('emails.experiencias._info-inscricao-plataforma-dados-candidato', [
      'Inscricao' => $Inscricao
    ])

    {{-- SEÇÃO de COMPROVANTE DE PAGAMENTO
    @include('emails.experiencias._info-inscricao-plataforma-comprovante-pagamento', [
      'Inscricao' => $Inscricao
    ])
    --}}

    {{-- SEÇÃO de INFOS da EXPERIÊNCIA --}}
    @include('emails.experiencias._info-experiencia-plataforma', [
      'Experiencia' => $Inscricao->experiencia
    ])
  @stop
