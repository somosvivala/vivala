@extends('quiz.index')

@section('pergunta')
	<div class="col-sm-12 pergunta">
		<a href="{{ url ('quiz/personalize')}}" class="absolute-top-right laranja">{{ trans("quiz.skipstep") }}</a>
		<h2>{{ trans("quiz.yourinterests") }}</h2>
		<h3>{{ trans("quiz.chooseinterests") }}</h3>
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
			    <p>{{ trans("quiz.nointerests") }}</p>
			@endforelse
		</ul>
		{!!Form::submit(trans("quiz.continue"), ['class' => 'btn btn-acao']) !!}
		{!! Form::close() !!}
		@endif
	</div>
@endsection
