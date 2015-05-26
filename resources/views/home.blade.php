@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
				<h1>Alô {{ Auth::user()->username }}</h1>
				
				@if (isset($facebookData))
					<h2> Informações do Facebook </h2>
					user_birthday:{{ $facebookData->user_birthday }}<br>
					user_hometown:{{ $facebookData->user_hometown }}<br>
					user_location:{{ $facebookData->user_location }}<br>
					user_likes:{{ $facebookData->user_likes }}<br>
				@endif

				@if (isset($perfil))
					<h2> Informações do seu Perfil <a href="{{url('perfil')}}">{{trans('acoes.visualizarperfil')}}</a></h2>
					Data de Aniversário:
					{{ $perfil->stri_aniversario }}<br>
					Cidade Natal:
					{{ $perfil->stri_cidade_natal }}<br>
					Último local registrado:
					{{ $perfil->stri_ultimo_local }}<br>
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
