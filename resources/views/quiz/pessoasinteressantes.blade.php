@extends('quiz.index')

@section('pergunta')
	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/contemais')}}" class="absolute-top-left laranja">{{ trans("quiz.backstep") }}</a> | <a href="{{ url ('home')}}" class="laranja">{{ trans("quiz.skipstep") }}</a>
		</span>
		<h2>{{ trans("quiz.interestingpeople") }}</h2>
		<h3>{{ trans("quiz.nicesuggests") }}</h3>
		<ul class="row sugestoes sugestoes-quiz">
			@if(isset($sugestoesPessoasInteressantes))
			@forelse($sugestoesPessoasInteressantes as $Perfil)
			<li class="col-sm-4 col-md-2">
				{!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
				<button id='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Perfil->id }}">seguir</button>
				<a href="{{ url($Perfil->getUrl()) }}">
					<img class="hidden" title='{{ trans("quiz.t_loading") }}' alt='{{ trans("quiz.at_loading") }}'>
					<div class="round foto">
						<div class="cover">
							<img src="{{ $Perfil->getAvatarUrl() }}" alt=" {{ $Perfil->nome }}">
						</div>
					</div>
					<strong class="col-sm-12">{{ $Perfil->user->username }}</strong>
					<div class="row localizacao-cidade">
						<div class="col-sm-3 text-right">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-sm-9 text-left">
							São Paulo, BR
						</div>
					</div>
				</a>
				{!! Form::close() !!}
			</li>
			@empty
			    <p>{{ trans("quiz.nosuggests") }}</p>
			@endforelse
			@endif
		</ul>
		<div class="col-sm-12 text-center">
			<a class="btn btn-acao" href="/home">{{ trans("quiz.continue") }}</a>
		</div>
	</div>
@endsection
