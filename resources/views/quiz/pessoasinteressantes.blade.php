@extends('quiz.index')

@section('pergunta')
	<div id="tour-quiz" class="col-sm-12 pergunta quiz-4">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/contemais')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('home')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
		</span>
		<h2 class="tour_quiz-4-step1">{{ trans("global.quiz_interestingpeople") }}</h2>
		<h3>{{ trans("global.quiz_nicesuggests") }}</h3>
		<ul class="row sugestoes sugestoes-quiz">
			@if(isset($sugestoesPessoasInteressantes))
			@forelse($sugestoesPessoasInteressantes as $Perfil)
			<li class="col-sm-4 col-md-2">
				{!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
				<button id='btn_seguir' type="submit" class='btn_seguir_viajante tour_quiz-4-step2' data-id="{{ $Perfil->id }}">{{ trans('global.lbl_follow') }}</button>
				<a onclick="$(this).siblings('button').click();">
					<img class="hidden" title='{{ trans("global.lbl_loading1") }}' alt='{{ trans("global.lbl_loading1") }}'>
                                        <div class="round foto quadrado3em">
                                            <div class="avatar-img" style="background-image:url('{{ $Perfil->getAvatarUrl() }}')">
                                            </div>
                                        </div>
					<strong class="col-sm-12">{{ $Perfil->apelido_tratado }}</strong>
					<div class="row localizacao-cidade">
                                            {{--
                                            <div class="col-sm-3 text-right">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-sm-9 text-left">
							<!-- Retorno da cidade do user, não traduzido por necessitar de uma tabela separada de países, cidades e afins -->
							São Paulo, BR
						</div>
                                                --}}
					</div>
				</a>
				{!! Form::close() !!}
			</li>
			@empty
			    <p>{{ trans("global.quiz_nosuggests") }}</p>
			@endforelse
			@endif
		</ul>
		<div class="col-sm-12 text-center tour_quiz-4-step3">
			<a class="btn btn-primario btn-acao" href="/home">{{ trans("global.lbl_continue") }}</a>
		</div>
	</div>
@endsection
