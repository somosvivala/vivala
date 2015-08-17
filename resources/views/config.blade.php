@extends('conectar')

@section('content')

<div class="">
	<div class="row">

		<div class="col-md-2">

			<h4> Suas ONGS <a href="{{ url('ong/create') }}">+</a></h4>
			@forelse($ongs as $ong)
				<a href="{{ url($ong->getUrl()) }}" title="{{ $ong->nome }}">
					<img src="{{ $ong->getAvatarUrl() }}" alt="{{ $ong->nome  }}">
				</a>
				{!! Form::open(array('url' => array('home/trocaentidadeativa', $ong->id)))!!}
				{!! Form::hidden('entidadeAtiva_tipo','ong') !!}
				{!! Form::submit('Acessar como ' . $ong->nome) !!}
				{!! Form::close() !!}
			@empty
			    <p>Nenhuma ong.</p>
			@endforelse
			<h4> Suas empresas <a href="{{ url('empresa/create') }}">+</a></h4>
			@forelse($empresas as $empresa)
				<a href="{{ url($empresa->getUrl()) }}" title="{{ $empresa->nome }}">
					<img src="{{ $empresa->getAvatarUrl() }}" alt="{{ $empresa->nome  }}">
				</a>
				{!! Form::open(array('url' => array('home/trocaentidadeativa', $empresa->id)))!!}
				{!! Form::hidden('entidadeAtiva_tipo','empresa') !!}
				{!! Form::submit('Acessar como ' . $empresa->nome) !!}
				{!! Form::close() !!}

			@empty
			    <p>Nenhuma empresas.</p>
			@endforelse
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-body">
				<a href="{{url('perfil')}}">
					<img src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->username }}" style="width:100px;">
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
