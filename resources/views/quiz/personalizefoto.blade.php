@extends('quiz.index')

@section('pergunta')

	<div class="col-sm-12 pergunta">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('quiz/contemais')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
		</span>
		<h2>{{ trans("global.quiz_profile_customize") }}</h2>
		<h3>{{ trans("global.quiz_photo_customize") }}</h3>

		{!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/quiz/contemais']) !!}
		{!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

			<img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

			<div class="file-upload">
				<label for="image_file_upload">
					{{ trans("global.lbl_photo_send") }}
					<p>{{ trans("global.quiz_fromcomputer") }}</p>
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
			{!! Form::submit( trans("global.lbl_continue"), ['class' => 'btn btn-acao']) !!}
		{!! Form::close() !!}
	</div>
@endsection
