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

	
	<a href="{{action('CausaController@getVoluntariarse')}}/{{$causa->id}}">Seja um Voluntário</a>

	<hr>
	<h3>Voluntarios</h3>

	<ul class="sugestoes sugestoes-viajantes">
		@forelse($voluntarios as $Voluntario) 
			<li>
				{!! Form::open(['url' => ['ajax/followperfil', $Voluntario->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Voluntario->id.')']) !!}
				<button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Voluntario->id }}">seguir</button>
				<a href="{{ url($Voluntario->getUrl()) }}">
					<div class="round foto">
						<div class="cover">
							<img src="{{ $Voluntario->getAvatarUrl() }}" alt=" {{ $Voluntario->nome }}">
						</div>
					</div>
					<strong class="col-sm-12">{{ $Voluntario->user->username }}</strong>
					{{-- <div class="row localizacao-cidade">
						<div class="col-sm-4 text-right">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-sm-8 text-left">
							São Paulo, BR
						</div>
					</div> --}}
				</a>
				{!! Form::close() !!}
			</li>
		@empty
			<p>Sem voluntarios</p>
		@endforelse
	</ul>

@endsection