@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">Voltar</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">Pular etapa</a>
		</span>
		<h2>Conte mais sobre você</h2>
		<h3>Vamos ficar mais íntimos?</h3>
	</div>


@endsection
