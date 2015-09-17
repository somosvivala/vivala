@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz')}}" class="absolute-top-left laranja">{{ trans("quiz.backstep") }}</a> | <a href="{{ url ('quiz/contemais')}}" class="laranja">{{ trans("quiz.skipstep") }}</a>
		</span>
		<h2>{{ trans("quiz.customizeprofile") }}</h2>
		<h3>{{ trans("quiz.customizephoto") }}</h3>

		{!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/quiz/contemais']) !!}
		{!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

			<img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

			<div class="file-upload">
				<label for="image_file_upload">
					{{ trans("quiz.sendphoto") }}
					<p>{{ trans("quiz.fromrcomputer") }}</p>
					{!! Form::file("image_file_upload", ['id' => 'image_file_upload', 'class' => 'upload']) !!}
				</label>
			</div>
				{!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!}
				{!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!}
				{!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!}
				{!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!}
				{!! Form::hidden("_token",  csrf_token(), ['name' => '_token' ]) !!}
			<div class="erros">
			</div>
			{!! Form::submit( trans("quiz.continue"), ['class' => 'btn btn-acao']) !!}
		{!! Form::close() !!}
	</div>
@endsection
