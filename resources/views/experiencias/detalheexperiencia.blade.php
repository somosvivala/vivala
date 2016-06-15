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
        <div class="owner text-center"><img alt="{{ $Experiencia->owner->nome }}" src="{{ $Experiencia->owner->avatar->path }}"><h4>{{ $Experiencia->owner->nome }}</h4></div>
    
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
