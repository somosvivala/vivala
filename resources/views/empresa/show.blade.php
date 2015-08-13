@extends('viajar')

@section('content')

	@if ( $empresa->podeEditar )
	<a href="/empresa/{{$empresa->id}}/edit">
		<small>Editar</small>		
	</a>
	@endif
	<h1 class="title">Nome: {{ $empresa->nome }}</h1>
	<img src="{{ $empresa->getAvatarUrl() }}" alt="Foto da Empresa">

@endsection