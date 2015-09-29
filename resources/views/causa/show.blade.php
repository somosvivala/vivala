@extends('cuidar')

@section('content')

	@if($causa->podeEditar)
	<a href="/causas/{{$causa->id}}/edit">
		<small>{{ trans('global.lbl_edit') }}</small>
	</a>
	@endif
	<h1 class="title">{{ trans('global.lbl_cause') }}</h1>
	<ul>
		<li>{{ trans('global.lbl_cause_job_habilities') }}:     {{$causa->habilidades}}</li>
		<li>{{ trans('global.lbl_cause_description') }}:     {{$causa->sobre_trabalho}}</li>
		<li>{{ trans('global.lbl_cause_job_localization') }}:     {{$causa->local}}</li>
		<li>{{ trans('global.lbl_ong') }}:     {{$causa->owner}}</li>
		<li>{{ trans('global.lbl_cause_job_supervisor') }}:     {{$causa->responsavel}}</li>
	</ul>


	<a href="{{action('CausaController@getVoluntariarse')}}/{{$causa->id}}">{{ trans('global.lbl_volunteer_be') }}</a>

	<hr>
	<h3>{{ trans('global.volunteer_') }}</h3>

	<ul class="sugestoes sugestoes-viajantes">
		@forelse($voluntarios as $Voluntario)
			<li>
				{!! Form::open(['url' => ['ajax/followperfil', $Voluntario->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Voluntario->id.')']) !!}
				<button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Voluntario->id }}">{{ trans('global.lbl_follow') }}</button>
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
			<p>{{ trans('global.lbl_volunteer_not_found') }}</p>
		@endforelse
	</ul>

@endsection
