@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">Voltar</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">Pular etapa</a>
		</span>
		<h2>Conte mais sobre você</h2>
		<h3>Vamos ficar mais íntimos?</h3>

		{!! Form::open(['url' => ['quiz/contemais',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST']) !!}
			<div class="erros">
			</div>
			<div class="row">
				<div class="col-sm-4">
					{!! Form::text("apelido", null, ['class' => 'form-control', 'placeholder' => 'COMO QUER SER CHAMADO?']) !!}
					{!! Form::text("cidade_natal", null, ['class' => 'form-control', 'placeholder' => 'QUAL SUA CIDADE DE ORIGEM?']) !!}
					{!! Form::text("cidade_atual", null, ['class' => 'form-control', 'placeholder' => 'QUAL SUA CIDADE ATUAL?']) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_curta", null, ['title'=>'Descrição curta', 'aria-label'=>'Descrição curta', 'placeholder'=>'DESCRIÇÃO CURTA']) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::textarea("descricao_longa", null, ['title'=>'Descrição longa', 'aria-label'=>'Descrição longa', 'placeholder'=>'DESCRIÇÃO LONGA']) !!}
				</div>
			</div>
				<div class="col-sm-12">
					<br>
					{!! Form::submit("Continuar", ['class' => 'btn btn-acao']) !!}
				</div>
		{!! Form::close() !!}

	</div>


@endsection
