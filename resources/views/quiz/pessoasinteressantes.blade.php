@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/contemais')}}" class="absolute-top-left laranja">Voltar</a> | <a href="{{ url ('home')}}" class="laranja">Pular etapa</a>
		</span>
		<h2>Pessoas interessantes para seguir</h2>
		<h3>Sugestões mais que belas!</h3>
		<ul class="row sugestoes sugestoes-quiz">
			@if(isset($sugestoesPessoasInteressantes))
			@forelse($sugestoesPessoasInteressantes as $Perfil)
			<li class="col-sm-4 col-md-2">

				{!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET']) !!}
				<button id='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Perfil->id }}">seguir</button>
				<a href="{{ url($Perfil->getUrl()) }}">

					<img class="hidden" title='Carregando' alt='Carregando...'>
					<div class="round foto">
						<div class="cover">
							<img src="{{ $Perfil->getAvatarUrl() }}" alt=" {{ $Perfil->nome }}">
						</div>
					</div>
					<strong class="col-sm-12">{{ $Perfil->user->username }}</strong>
					<div class="row localizacao-cidade">
						<div class="col-sm-3 text-right">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-sm-9 text-left">
							São Paulo, BR
						</div>
					</div>
				</a>
				{!! Form::close() !!}
			</li>
			@empty
			    <p>Não encontramos nenhuma sugestão.</p>
			@endforelse
			@endif

		</div>
	</div>


@endsection
