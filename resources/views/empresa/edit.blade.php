@extends('viajar')

@section('content')
  <h1>Edite a Empresa</h1>

	<!-- Adiciona um formulario pra upload de foto-->
	<div class="jc_coords row col-sm-12">

	{!! Form::open(['url' => ['cropPhotoEmpresa',  $empresa->id ], 'files' => true, 'onsubmit' => 'verificaRecorteImagem(this);']) !!}

		{!! Form::label("image_file_upload", "Escolha outra imagem:") !!}
		{!! Form::file("image_file_upload", ['id' => 'image_file_upload']) !!}

		{!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!} 	
		{!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!} 	
		{!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!} 	
		{!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!} 	

		<div class="erros"></div>
		{!! Form::submit("Recortar Imagem", ['class' => 'btn btn-primary']) !!}
		<img id="preview" />
	</div>
	{!! Form::close() !!}		
	<div class="row col-sm-12" id="foto-atual-display"> 
		<img src="{{ $empresa->foto }}" id="foto-perfil" alt="Foto da empresa">
	</div>

  	{!! Form::model($empresa, ['method' => 'PATCH', 'action' => ['EmpresaController@update', $empresa->id] ]) !!}

		@include('empresa.form', ['btnSubmit' => 'Atualizar Dados']);

    {!! Form::close() !!}

    @include('errors.list')
@stop