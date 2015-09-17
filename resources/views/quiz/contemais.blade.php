@extends('quiz.index')

@section('pergunta')
	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">{{ trans("quiz.backstep") }}</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">{{ trans("quiz.skipstep") }}</a>
		</span>
		<h2>{{ trans("quiz.tellusmore") }}</h2>
		<h3>{{ trans("quiz.getintimacy") }}</h3>
		{!! Form::open(['url' => ['quiz/contemais',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/pessoasinteressantes']) !!}
			<div class="erros">
			</div>
			<div class="row">
				<div class="col-sm-4">
					{!! Form::text("apelido", null, ['class' => 'form-control', 'placeholder' => trans("quiz.nickname") ]) !!}
					{!! Form::text("cidade_natal", null, ['class' => 'form-control', 'placeholder' => trans("quiz.hometown") ]) !!}
					{!! Form::text("cidade_atual", null, ['class' => 'form-control', 'placeholder' => trans("quiz.currentcity") ]) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_curta", null, ['title'=> trans("quiz.t_shortdesc"), 'aria-label'=>'Descrição curta', 'placeholder'=> trans("quiz.ph_shortdesc") ]) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_longa", null, ['title'=> trans("quiz.t_longdesc"), 'aria-label'=>'Descrição longa', 'placeholder'=> trans("quiz.ph_longdesc") ]) !!}
				</div>
			</div>
				<div class="col-sm-12">
					<br>
					{!! Form::submit( trans("quiz.continue"), ['class' => 'btn btn-acao']) !!}
				</div>
		{!! Form::close() !!}
	</div>
@endsection
