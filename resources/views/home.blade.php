@extends('app')

@section('content')
<div class="foto-fundo header" style="background-image:url('/img/dummy.jpg');">
	<h2>Conheça o Brasil</h2>
	<h3>Escolha seu transporte e hospedagem, reserve restaurantes e entretenimento</h3>
	<div class="col-sm-12">
		<a class="btn-suave">Como funciona</a>
	</div>
</div>
<div class="secao-sem-bg text-center">
	<h3 class="col-sm-12">Explore novos ares e mares</h3>
	<small class="col-sm-12">Descubra lugares novos e inspiradores</small>
	<div class="col-sm-4">
		<div class="foto-fundo" style="background-image:url('/img/dummy.jpg');">
			<a href="/rio">
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-fundo" style="background-image:url('/img/dummy.jpg');">
			<a href="/rio">
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="foto-fundo" style="background-image:url('/img/dummy.jpg');">
			<a href="/rio">
				<h4>Brasília</h4>
			</a>
		</div>
	</div>
</div>

<div class="">
	<div class="row">

		<div class="col-md-2">

			<h4> Suas ONGS <a href="{{ url('ong/create') }}">+</a></h4>
			@forelse($ongs as $ong)
					<a href="{{ url($ong->getUrl()) }}" title="{{ $ong->nome }}">
						<img src="{{ $ong->nome }}" alt="{{ $ong->nome  }}">
					</a>
			@empty
			    <p>Nenhuma ong.</p>
			@endforelse
			<h4> Suas empresas <a href="{{ url('empresa/create') }}">+</a></h4>
			@forelse($empresas as $empresa)
				<a href="{{ url($empresa->getUrl()) }}" title="{{ $empresa->nome }}">
					<img src="{{ $empresa->nome }}" alt="{{ $empresa->nome  }}">
				</a>
			@empty
			    <p>Nenhuma empresas.</p>
			@endforelse
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-body">
				<a href="{{url('perfil')}}">
					<img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->username }}" style="width:100px;">
					{{trans('acoes.visualizarperfil')}}
				</a>
				<h1>Alô {{ Auth::user()->username }}</h1>
				
				@if (isset($facebookData))
					<h2> Informações do Facebook </h2>
					user_birthday:{{ $facebookData->user_birthday }}<br>
					user_hometown:{{ $facebookData->user_hometown }}<br>
					user_location:{{ $facebookData->user_location }}<br>
					user_likes:{{ $facebookData->user_likes }}<br>
				@endif

				@if (isset($perfil))
					<h2> Informações do seu Perfil </h2>
					Data de Aniversário:
					{{ $perfil->aniversario }}<br>
					Cidade Natal:
					{{ $perfil->cidade_natal }}<br>
					Último local registrado:
					{{ $perfil->ultimo_local }}<br>
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
