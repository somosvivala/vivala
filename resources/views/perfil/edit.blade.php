@extends('conectar')

@section('content')
	<div class="container-fluid">
	<div class="col-md-12">
	<div class="panel panel-default">

		<div class="panel-heading"><h4>{{ trans('global.lbl_acess_data') }}</h4></div>
		<div class="panel-body">
			<!-- Adiciona um formulario pra upload de foto-->
			<div class="jc_coords row col-sm-12">

				{!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/home']) !!}
				{!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

				<img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

				<div class="file-upload">
						<label for="image_file_upload">
								{{ trans('global.lbl_photo_send') }}
								<p>{{ trans('global.quiz_fromcomputer') }}</p>
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

				{!! Form::submit( trans('global.lbl_photo_send'), ['class' => 'btn btn-acao']) !!}
				{!! Form::close() !!}
			</div>
			<div class="row col-sm-12" id="foto-atual-display">
				<img src="{{ $perfil->getAvatarUrl() }}" id="foto-perfil">
			</div>

			{!! Form::model($user, ['url' => ['editarPerfil',  $user->id ]]) !!}

			<!-- Adiciona um text field para o form-->
			<div class="form-group">
				{!! Form::label("username", trans('global.lbl_name')) !!}
				{!! Form::text("username",  null , ['class' => 'form-control']) !!}
			</div>

			<!-- Adiciona um text field para o form-->
			<div class="form-group">
				{!! Form::label("apelido", trans('global.lbl_nickname')) !!}
				{!! Form::text("apelido",  $perfil->apelido , ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label("aniversario", trans('global.lbl_birthday')) !!}
				{!! Form::text("aniversario",  $perfil->datanascimento , ['class' => 'form-control datepicker']) !!}
			</div>

			<!-- Adiciona txtfield para a cidade natal do Perfil -->
			<div class="form-group">
				{!! Form::label("cidade_natal", trans('global.lbl_hometown')) !!}
				{!! Form::text("cidade_natal",  $perfil->cidade_natal , ['class' => 'form-control']) !!}
			</div>

			<!-- Adiciona um text field para o form, user PrettyUrl -->
			<div class="form-group">
				{!! Form::label("url", trans('global.lbl_address')) !!}
				{!! Form::text("url", $perfil->getUrl(), ['class' => 'form-control']) !!}
			</div>

			<!-- Adiciona submit button para o form de Edicao -->
			<div class="form-group">
				{!! Form::submit( trans('global.lbl_submit'), ['class' => 'form-control btn btn-acao']) !!}
			<div class="form-group text-right">
				{!! Form::submit("Atualizar Perfil", ['class' => 'btn btn-primary']) !!}
			</div>

			{!! Form::close() !!}
		</div>
		</div>

		@if ($errors->any())
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		@endif

		</div>
	</div>
@endsection
