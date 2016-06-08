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
        <span class="col-xs-12 negrito-exp text-center"><i class="fa fa-map-marker"></i>{{ $Experiencia->local->nome}}</span>
        <span class="col-xs-12 negrito-exp text-center">{{ $Experiencia->preco }}</span>
        <span class="descricao-inicial">{{ $Experiencia->descricao }}</span>
        <div class="owner text-center"><img alt="{{ $Experiencia->owner->nome }}" src="{{ $Experiencia->owner->avatar->path }}"><h4>{{ $Experiencia->owner->nome }}</h4></div>
    
        <span class="col-xs-12 negrito-exp">Informações</span>
        @foreach($Experiencia->informacoes as $Informacao)
        <div class="col-xs-12 informacoes">
            <div class="row">
                <div class="col-xs-2"><i class="{{ $Informacao->icone }}"></i></div>
                <div class="col-xs-10">{{ $Informacao->descricao }}</div>
            </div>
        </div>
        @endforeach
        @if($Experiencia->descricao!="")
        <span class="col-xs-12 negrito-exp">Detalhes da experiência</span>
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
    <a class="btn-full-bottom" href="/experiencias/checkout/{{ $Experiencia->id }}">Se inscreva aqui</a>
</section >
</div>
@endsection
