@extends('app')


@section('content')
	<h1 class="perfil-title">
		<div class="foto-perfil">
			<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="">
				<img src="{{ $user->avatar }}" alt="{{ $user->username }}">
			</a>
		</div>

		Perfil de: {{ $user->username }}
		@if (Auth::user()->id == $user->id) 
			<a href="/editarPerfil">
				<small style='margin-left:25px; font-size:13px; color: #337ab7;'>Editar</small>
			</a>
		@endif
	</h1>


	{{-- nao sabia que tinha comentario do laravel--}}
	{{-- Infos do perfil até agora--}}
	@if (isset($perfil))
		<h2> Informações do Perfil</h2>
		Data de Aniversário:
		{{ $perfil->aniversario }}<br>
		Cidade Natal:
		{{ $perfil->cidade_natal }}<br>
		Último local registrado:
		{{ $perfil->ultimo_local }}<br>
	@endif
	    
	<div class="row">
		<div class="col-sm-6">
			<h3> Followed by </h3>
			@forelse($followedBy as $perfil)
				<ul class="lista-usuarios">
					<li class="foto-user">
						<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="{{ $perfil->user->username }}">
							<img src="{{ $perfil->user->avatar }}" alt="{{ $perfil->user->username }}">
						</a>
					</li>
				</ul>
			@empty
			    <p>Ninguém :(</p>
			@endforelse
		</div>
		<div class="col-sm-6">
			<h3> Following </h3>
			@forelse($follow as $perfil)
				<ul class="lista-usuarios">
					<li class="foto-user">
						<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="{{ $perfil->user->username }}">
							<img src="{{ $perfil->user->avatar }}" alt="{{ $perfil->user->username }}">
						</a>
					</li>
				</ul>
			@empty
			    <p>Ninguém :(</p>
			@endforelse
		</div>
	</div>

@endsection
 