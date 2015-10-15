@extends('quiz.index')

@section('pergunta')
	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
		</span>
		<h2>{{ trans("global.quiz_tell_us_more") }}</h2>
		<h3>{{ trans("global.quiz_get_intimacy") }}</h3>
		{!! Form::open(['url' => ['quiz/contemais',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/pessoasinteressantes']) !!}
			<div class="erros">
			</div>
			<div class="row">
				<div class="col-sm-4">
					{!! Form::text("apelido", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_nickname") ]) !!}
					{!! Form::text("cidade_natal", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_hometown") ]) !!}
					{!! Form::text("cidade_atual", null, ['class' => 'form-control', 'placeholder' => trans("global.quiz_currentcity") ]) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_curta", null, ['title'=> trans("global.quiz_shortdesc"), 'aria-label'=> trans("global.quiz_shortdesc"), 'placeholder'=> trans("global.quiz_shortdesc_ph"), 'class'=> 'form-control sem-resize']) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_longa", null, ['title'=> trans("global.quiz_longdesc"), 'aria-label'=> trans("global.quiz_longdesc"), 'placeholder'=> trans("global.quiz_longdesc_ph"), 'class'=> 'form-control sem-resize' ]) !!}
				</div>
			</div>
				<div class="col-sm-12">
					<br>
					{!! Form::submit( trans("global.lbl_continue"), ['class' => 'btn btn-primario btn-acao']) !!}
				</div>
		{!! Form::close() !!}
	</div>
@endsection
