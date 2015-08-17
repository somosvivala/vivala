@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/contemais')}}" class="absolute-top-left laranja">Voltar</a> | <a href="{{ url ('home')}}" class="laranja">Pular etapa</a>
		</span>
		<h2>Pessoas interessantes para seguir</h2>
		<h3>Sugestões mais que belas!</h3>
	</div>


@endsection
