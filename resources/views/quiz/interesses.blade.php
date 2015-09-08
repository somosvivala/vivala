@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<a href="{{ url ('quiz/personalize')}}" class="absolute-top-right laranja">Pular etapa</a>

		<h2>Quais são seus interesses?	</h2>
		<h3>Escolha uma ou mais opções abaixo e iremos sugerir algumas coisas boas para você.</h3>
		<ul class="interesses col-sm-12">
			{!! Form::open(['url' => ['quiz/interesses', Auth::user()->perfil->id], 'class' => 'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/personalize']) !!}
			@if(isset($interesses))
			@forelse($interesses as $Interesse)
				<li class="col-sm-3">
					<label>
						{!! Form::checkbox("interesses[]", $Interesse->id); !!}
						<span>{{ $Interesse->nome }}</span>
					</label>
				</li>
			@empty
			    <p>Nenhuma interesse cadastrado.</p>
			@endforelse
		</ul>
		{!!Form::submit("CONFIRMAR", ['class' => 'btn btn-acao']) !!}
		{!! Form::close() !!}
		@endif
	</div>


@endsection
