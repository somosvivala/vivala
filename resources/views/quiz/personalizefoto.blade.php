@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz')}}" class="absolute-top-left laranja">Voltar</a> | <a href="{{ url ('quiz/contemais')}}" class="laranja">Pular etapa</a>
		</span>
		<h2>Personalize o seu perfil</h2>
		<h3>Adicione uma foto para mostrar sua peronalidade e estilo.</h3>

	</div>


@endsection
