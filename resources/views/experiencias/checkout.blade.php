@extends('mobilelogado')

@section('content')
<h1> Checkout da {{ $Experiencia->titulo }}</h1>
<img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}">
<span class="col-sm-6">{{ $Experiencia->descricao }}</span>
<span class="col-sm-6">{{ $Experiencia->preco }}</span>
@endsection
