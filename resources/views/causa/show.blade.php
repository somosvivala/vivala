@extends('cuidar')

@section('content')
	
	@if ( $causa->podeEditar )
	<a href="/causas/{{$causa->id}}/edit">
		<small>Editar</small>		
	</a>
	@endif
	<h1 class="title">Causa</h1>
	<ul>
		<li>habilidades:     {{$causa->habilidades}}</li>
		<li>sobre_trabalho:     {{$causa->sobre_trabalho}}</li>
		<li>local:     {{$causa->local}}</li>
		<li>Ong:     {{$causa->owner}}</li>
		<li>responsavel:     {{$causa->responsavel}}</li>
	</ul>
@endsection