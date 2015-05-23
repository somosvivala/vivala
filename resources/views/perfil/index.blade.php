@extends('app')


@section('content')
	{{-- Provisorio --}}
	<h1 class="perfil-title">
	<img src="{{ $user->avatar }}" alt="{{ $user->username }}">
		Perfil de: {{ $user->username }}
		<a href="perfil/editar">
				<small style='margin-left:25px; font-size:13px; color: #337ab7;'>Editar</small>
		</a>
	</h1>


	{{-- nao sabia que tinha comentario do laravel--}}
	{{-- Infos do perfil até agora--}}
	@if (isset($perfil))
		<h2> Informações do Perfil</h2>
		Data de Aniversário:
		{{ $perfil->stri_aniversario }}<br>
		Cidade Natal:
		{{ $perfil->stri_cidade_natal }}<br>
		Último local registrado:
		{{ $perfil->stri_ultimo_local }}<br>
	@endif
	    
	<h3> Followed by </h3>
	@forelse($followedBy as $perfil)
		<img src="{{ $perfil->user->avatar }}" alt="{{ $perfil->user->username }}">
	@empty
	    <p>Ninguém :(</p>
	@endforelse

	<h3> Following </h3>
	@forelse($follow as $perfil)
		<img src="{{ $perfil->user->avatar }}" alt="{{ $perfil->user->username }}">
	@empty
	    <p>Ninguém :(</p>
	@endforelse

@endsection
 