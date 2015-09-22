@extends('cuidar')

@section('barra-topo')
@endsection

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">
            Procurando por Ongs?
    </h3>
    <span>Encontre ongs em 3 passos</span> 
    @include('cuidar._filtraongs')
    @include('cuidar._listaongs')
</div>
@endsection
