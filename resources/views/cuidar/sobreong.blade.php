@extends('cuidar')

@section('barra-topo')
@endsection

@section('content')
<h3 class="font-bold-upper text-center">
    {{ $Ong->nome }}            
</h3>
<div class="text-center fundo-cheio col-sm-12">
    <img src="{{ asset('img/casacomunal.png') }}">
    <h4>Sobre a organização</h4>
    {{ $Ong->descricao }}
</div>

@endsection
