@extends('app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-2">

			<h4> Suas ONGS <a href="{{ url('ong/create') }}">+</a></h4>
			@forelse($ongs as $ong)
				@if ($ong->prettyUrl()->first())
					<a href="{{ url($ong->prettyUrl()->first()->url) }}" title="{{ $ong->nome }}">
						<img src="{{ $ong->nome }}" alt="{{ $ong->nome  }}">
					</a>
				@endif
			@empty
			    <p>Nenhuma ong.</p>
			@endforelse
			<h4> Suas empresas <a href="{{ url('empresa/create') }}">+</a></h4>
			@forelse($empresas as $empresa)
				<a href="{{ url($empresa->nome) }}" title="{{ $empresa->nome }}">
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
