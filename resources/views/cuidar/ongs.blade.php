@extends('cuidar')

@section('barra-topo')
@endsection

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center"> Procurando por Ongs?
        <small class="sub-titulo">Encontre ONG's em 3 passos.</small>
    </h3>
    <div class="col-sm-12 margin-b-2 margin-t-2 text-center">
        @include('cuidar._filtraongs')
    </div>
    <div class="col-sm-12 text-center">
        @include('cuidar._listaongs')
    </div>
</div>
@endsection
