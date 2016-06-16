@extends('mobiletemplate')

@section('content')

<div class="col-xs-12">

@if(Auth::user())
    @include('_conhecalogado')
@else
<div class="row text-center header-mobile">
    <a href="{{ url('/conhecavivala') }}">
        <span>Conheça a</span> <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
     </a>
</div>
@endif

<a href="/experiencias" class="link-voltar">
    <i class="fa fa-chevron-left"></i>
</a>
<section class="experiencia">
    <div class="descricao">
        <span class="col-xs-12 negrito-exp text-center">R${{ $Experiencia->preco }}</span>
        <span class="col-xs-12 negrito-exp text-center margin-b-1"><i class="fa fa-map-marker"></i> {{ $Experiencia->local->nome}} - {{ $Experiencia->local->estado->sigla}}</span>
        <span class="descricao-inicial">{{ $Experiencia->descricao }}</span>
        <div class="owner text-center">
            <div class="round-foto-small">
                <img alt="{{ $Experiencia->owner->nome }}" src="{{ $Experiencia->owner->avatar->path }}">
            </div>
            <span>{{ $Experiencia->owner->nome }}</span>
            <div class="row">
                @if($Experiencia->owner->url_facebook)
                <a href="https://facebook.com/{{ $Experiencia->owner->url_facebook }}"><i class="fa fa-facebook-square verde-sucesso"></i></a>
                @endif
                @if($Experiencia->owner->url_instagram)
                <a href="http://instagram.com/{{ $Experiencia->owner->url_instagram }}"><i class="fa fa-instagram verde-sucesso"></i></a>
                @endif
            </div>
        </div>
    
        <span class="col-xs-12 negrito-exp margin-t-1">Informações</span>
        @foreach($Experiencia->informacoes as $Informacao)
        <div class="col-xs-12 informacoes">
            <div class="row">
                <span class="icone-informacoes"><i class="{{ $Informacao->icone }}"></i></span>
                <span class="descricao-informacoes">{{ $Informacao->descricao }}</span>
            </div>
        </div>
        @endforeach
        @if($Experiencia->descricao!="")
        <span class="col-xs-12 negrito-exp margin-t-1">Mais detalhes</span>
        <span class="col-xs-12">{{ $Experiencia->descricao }}</span>
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
    <a class="btn-full-bottom" href="/experiencias/checkout/{{ $Experiencia->id }}">Inscreva-se aqui</a>
</section >
</div>
@endsection
