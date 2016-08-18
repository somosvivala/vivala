@extends('gestao.experiencias.index')

{{-- Seção de gerenciamento das experiencias --}}
@section('gestao.experiencias.content')
<div class="col-lg-12 fundo-cheio margin-b-2">
    @if(Auth::user()->isAdmin())
      @include('gestao.experiencias._listaexperiencias')
    @endif
</div>
{{-- Fim da Seção de gerenciamento das experiencias --}}

{{-- Segunda Seção de gerenciamento das experiencias --}}
<div class="col-lg-12 fundo-cheio margin-b-4">
  {{-- Seção de gerenciamento das inscricoes das experiencias --}}
  <div class="col-lg-6 fundo-cheio">
  @if(Auth::user()->isAdmin())
    @include('gestao.experiencias._inscricoesexperiencias')
  @endif
  </div>
  <div class="col-lg-6 fundo-cheio">
  @if(Auth::user()->isAdmin())
    @include('gestao.experiencias._inscricoescanceladasexperiencias')
  @endif
  </div>
  {{-- Fim da Seção de gerenciamento das inscricoes das experiencias --}}
</div>
{{-- Fim da Segunda Seção de gerenciamento das experiencias --}}

{{-- Terceira Seção de gerenciamento das experiencias --}}
<div class="col-lg-12 fundo-cheio margin-b-4">
  {{-- Seção de gerenciamento das categorias das experiencias --}}
  <div class="col-lg-6 fundo-cheio">
  @if(Auth::user()->isAdmin())
    @include('gestao.experiencias._categoriasexperiencias')
  @endif
  </div>
  {{-- Fim da Seção de gerenciamento das categorias das experiencias --}}
</div>
{{-- Fim da Terceira Seção de gerenciamento das experiencias --}}


@endsection
