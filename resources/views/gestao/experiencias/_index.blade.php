@extends('gestao.experiencias.index')
@section('gestao.experiencias.content')


{{-- Seção de gerenciamento das experiencias --}}
<div class="col-md-12 col-lg-12 fundo-cheio">
    @if(Auth::user()->isAdmin())
      @include('gestao.experiencias._listaexperiencias')
    @endif
</div>

{{-- Seção de gerenciamento das inscricoes --}}
<div class="col-md-6 col-lg-6 fundo-cheio">
@if(Auth::user()->isAdmin())
  @include('gestao.experiencias._inscricoesexperiencias')
@endif
</div>

{{-- Seção de gerenciamento das categorias das experiencias --}}
<div class="col-md-6 col-lg-6 fundo-cheio">
@if(Auth::user()->isAdmin())
  @include('gestao.experiencias._categoriasexperiencias')
@endif
</div>

@endsection
