@extends('conectar')

@section('content')
	<div class="container-fluid">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Dados de Acesso</h4></div>
		<div class="panel-body">
			<!-- Adiciona um formulario pra upload de foto-->
			<div class="jc_coords row col-sm-12">

				{!! Form::open(['url' => ['cropPhoto',  $user->id ], 'files' => true, 'onsubmit' => 'verificaRecorteImagem(this);']) !!}

					{!! Form::label("image_file_upload", "Escolha outra imagem:") !!}
					{!! Form::file("image_file_upload", ['id' => 'image_file_upload']) !!}

					{!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!} 	
					{!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!} 	
					{!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!} 	
					{!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!} 	

					<div class="erros">
					</div>
					{!! Form::submit("Recortar Imagem", ['class' => 'btn btn-primary']) !!}
				<img id="preview" />
			</div>
				{!! Form::close() !!}
			<div class="row col-sm-12" id="foto-atual-display"> 
				<img src="{{ $perfil->foto }}" id="foto-perfil">
			</div>
			

			{!! Form::model($user, ['url' => ['editarPerfil',  $user->id ]]) !!}
					
			<!-- Adiciona um text field para o form-->
			<div class="form-group"> 
				{!! Form::label("username", "Nome:") !!}
				{!! Form::text("username",  null , ['class' => 'form-control']) !!} 	
			</div>

			<div class="form-group"> 
				{!! Form::label("aniversario", "Data de Nascimento:") !!}
				{!! Form::text("aniversario",  $perfil->aniversario , ['class' => 'form-control datepicker']) !!}
			</div>

			<!-- Adiciona txtfield para a cidade natal do Perfil -->
			<div class="form-group"> 
				{!! Form::label("cidade_natal", "Cidade Natal:") !!}
				{!! Form::text("cidade_natal",  $perfil->cidade_natal , ['class' => 'form-control']) !!} 	
			</div>

			<!-- Adiciona um text field para o form, user PrettyUrl -->
			<div class="form-group"> 
				{!! Form::label("url", "Seu endereço:") !!}
				{!! Form::text("url", $perfil->prettyUrl->first()->url, ['class' => 'form-control']) !!}
			</div>

			<!-- Adiciona submit button para o form de Edicao -->
			<div class="form-group"> 
				{!! Form::submit("Submit", ['class' => 'form-control btn btn-primary']) !!}
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
 