@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<a href="#">Pular etapa</a>

		<h2>Quais são seus interesses?	</h2>
		<h3>Escolha uma ou mais opções abaixo e iremos sugerir algumas coisas boas para você.</h3>
		<ul class="interesses col-sm-12">
		@if(isset($sugestoesEmpresas))
		{!! Form::open(['url' => ['ajax/followempresa', $Empresa->id], 'class' => 'form-ajax', 'method' => 'GET']) !!}
		@forelse($sugestoesEmpresas as $Interesse)
			<li>
				<label>{{ $Interesse->id }}</label>
			</li>
		@empty
		    <p>Nenhuma interesse cadastrado.</p>
		@endforelse
		{!!Form::submit("CONFIRMAR", ['class' => 'btn btn-default']) !!}
		{!! Form::close() !!}
		@endif
	</div>


@endsection
