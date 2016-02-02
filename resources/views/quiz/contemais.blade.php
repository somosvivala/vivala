@extends('quiz.index')

@section('pergunta')
	<div id="tour-quiz" class="col-sm-12 pergunta quiz-3">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
		</span>
		<h2 class="tour-quiz-step3" data-intro='{{ trans("tour.tour_quiz-3-step1") }}' data-step="1">{{ trans("global.quiz_tell_us_more") }}</h2>
		<h3>{{ trans("global.quiz_get_intimacy") }}</h3>
		{!! Form::open(['url' => ['quiz/contemais',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/pessoasinteressantes', 'data-loading'=>'form-loading']) !!}
			<div class="erros">
			</div>
			<div class="row tour-quiz-step3" data-intro='{{ trans("tour.tour_quiz-3-step2") }}' data-step="2">
				<div class="col-sm-4">
					{!! Form::text("apelido", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_nickname") ]) !!}
					{!! Form::text("cidade_natal", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_hometown") ]) !!}
					{!! Form::text("cidade_atual", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_currentcity") ]) !!}
				</div>
				<div class="col-sm-8">
					{!! Form::textarea("descricao_curta", null, ['title'=> trans("global.quiz_shortdesc"), 'aria-label'=> trans("global.quiz_shortdesc"), 'placeholder'=> trans("global.quiz_shortdesc_ph"), 'class'=> 'form-control sem-resize']) !!}
				</div>
			</div>
				<div class="col-sm-12 margin-t-1 tour-quiz-step3" data-intro='{{ trans("tour.tour_quiz-3-step3") }}' data-step="3">
					{!! Form::submit( trans("global.lbl_continue"), ['class' => 'btn btn-primario btn-acao']) !!}
          <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x laranja" style="display:none"></i>
				</div>
		{!! Form::close() !!}
	</div>
@endsection
