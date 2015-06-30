@extends('cuidar')

@section('content')
	
	@if ( $ong->podeEditar )
	<a href="/ong/{{$ong->id}}/edit">
		<small>Editar</small>		
	</a>
	@endif
	<h1 class="title">Ong {{ $ong->nome }}</h1>
@endsection