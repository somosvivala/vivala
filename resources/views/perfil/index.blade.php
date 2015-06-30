@extends('conectar')

@section('barra-topo')

<div class="row infos-topo">
	<div class="col-md-1">
		&nbsp;
	</div>
	<div class="col-md-4">
		<h1 class="perfil-title">{{ $user->username }}

		@if (Auth::user()->id == $user->id) 
			<a href="/editarPerfil">
				<small style='margin-left:25px; font-size:13px; color: #337ab7;'>Editar</small>
			</a>
		@endif
		</h1>
		<p>Diretora de criação.Ama tudo que é visual, gosta de viajar para entrar em contato com a energia de cada lugar. Curte fotografar pessoas, sem ser vista! </p>
	</div>
	<div class="col-md-2">
		<div class="foto-perfil">
			<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="">
				<img src="{{ $user->avatar }}" alt="{{ $user->username }}">
			</a>
		</div>
	</div>
	<div class="col-md-4">
		<ul>
		<li>10k seguidores</li>
		<li>679 seguindo</li>
		<li>Viajante</li>
		</ul>
	</div>
	<div class="col-md-1">
	</div>
	
</div>
@endsection

@section('content')

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
 