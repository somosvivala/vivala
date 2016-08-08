@extends('mobiletemplate')

@section('content')

<div class="col-xs-12">

@if(Auth::user())
    @include('_conhecalogado')
@else
<div class="row text-center header-mobile">
    <a href="{{ url('/conhecavivala') }}">
        <span>{!! trans('global.lbl_know_the') !!}</span> <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
     </a>
</div>
@endif

<a href="{{ url('experiencias') }}" class="link-voltar">
    <i class="fa fa-chevron-left"></i>
</a>
<section class="experiencia">
    <div class="descricao">
        <span class="col-xs-12 negrito-exp text-center">R${{ $Experiencia->preco }}</span>
        <span class="col-xs-12 negrito-exp text-center margin-b-1"><i class="fa fa-map-marker"></i> {{ $Experiencia->local->nome}} - {{ $Experiencia->local->estado->sigla}}</span>
        <span class="descricao-inicial">{{ $Experiencia->descricao }}</span>
        <div class="owner text-center">
            <div class="round-foto-small">
                <img alt="{{ $Experiencia->owner_nome }}" src="{{ $Experiencia->fotoOwnerUrl }}">
            </div>
            <span>{{ $Experiencia->owner_nome }}</span>
            <div class="row">
                @if($Experiencia->owner->url_facebook)
                <a href="https://facebook.com/{{ $Experiencia->owner->url_facebook }}"><i class="fa fa-facebook-square verde-sucesso"></i></a>
                @endif
                @if($Experiencia->owner->url_instagram)
                <a href="http://instagram.com/{{ $Experiencia->owner->url_instagram }}"><i class="fa fa-instagram verde-sucesso"></i></a>
                @endif
            </div>
        </div>

        <span class="col-xs-12 negrito-exp margin-t-1">Data</span>
        @if($Experiencia->isEventoUnico)
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-clock-o"></i></span>
                <span class="descricao-informacoes">EVENTO ÚNICO</span>
            </div>
        </div>
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                <span class="descricao-informacoes">{{ $Experiencia->dataProximaOcorrencia }}</span>
            </div>
            <div class="clndr-container">
            </div>
        </div>
        @endif
        @if($Experiencia->isEventoRecorrente)
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-clock-o"></i></span>
                <span class="descricao-informacoes">EVENTO RECORRENTE</span>
            </div>
        </div>
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                <span class="descricao-informacoes">{{ $Experiencia->dataProximaOcorrencia }}</span>
            </div>
        </div>
        @endif
        @if($Experiencia->isEventoServico)
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-clock-o"></i></span>
                <span class="descricao-informacoes">EVENTO SERVIÇO</span>
            </div>
        </div>
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                <span class="descricao-informacoes">{{ $Experiencia->dataProximaOcorrencia }}</span>
            </div>
        </div>
        @endif
        <span class="col-xs-12 negrito-exp margin-t-1">Informações</span>
        @foreach($Experiencia->informacoes as $Informacao)
        <div class="col-xs-12 informacoes">
            <div class="row padding-t-1">
                <span class="icone-informacoes"><i class="{{ $Informacao->icone }}"></i></span>
                <span class="descricao-informacoes">{{ $Informacao->descricao }}</span>
            </div>
        </div>
        @endforeach
        @if($Experiencia->detalhes!="")
        <span class="col-xs-12 negrito-exp margin-t-2">Mais detalhes</span>
        <span class="col-xs-12">{{ $Experiencia->detalhes }}</span>
        @endif
        @if($Experiencia->isUsuarioAtualInscrito)
            <a class="btn-cancelar-inscricao col-xs-12" href="/experiencias/checkout/{{ $Experiencia->id }}"><i class="fa fa-times-circle-o"></i> Cancelar Inscrição</a>
        @endif
    </div>

    <div class="foto-experiencia margin-t-1">
        <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
            <div class="categorias-experiencia">
                @foreach($Experiencia->categorias as $Categoria)
                <div class="icone">
                    <i class="fa fa-{{ $Categoria->icone }}"></i>
                    {{-- <span>{{ $Categoria->nome }}</span> --}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($Experiencia->isUsuarioAtualInscrito)
        <a class="btn-full-bottom-laranja" href="/experiencias/checkout/{{ $Experiencia->id }}">{!! trans('global.lbl_subscribed') !!}</a>
    @else
        <a class="btn-full-bottom" href="/experiencias/checkout/{{ $Experiencia->id }}">{!! trans('global.lbl_subscribe_yourself') !!}</a>
    @endif        
</section >
</div>
@endsection