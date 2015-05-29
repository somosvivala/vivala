@extends('app')


@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Dados de Acesso</h4></div>
		<div class="panel-body">
		
			{!! Form::model($user, ['url' => ['editarPerfil',  $user->id ]]) !!}

			<!-- Adiciona um text field para o form-->
			<div class="form-group"> 
			<input type="file" name="img">
			</div>
			<!-- Adiciona um text field para o form-->
			<div class="form-group"> 
				{!! Form::label("username", "Nome:") !!}
				{!! Form::text("username",  null , ['class' => 'form-control']) !!} 	
			</div>

			<!-- Adiciona um text field para o form, user PrettyUrl -->
			<div class="form-group"> 
				{!! Form::label("string_prettyUrl", "prettyUrl:") !!}
				{!! Form::text("string_prettyUrl", $perfil->prettyUrl->stri_url_prettyUrls, ['class' => 'form-control']) !!}
			</div>
		</div>
		
		<div class="panel-heading"><h4>Dados Pessoais</h4></div>
		<div class="panel-body">
			<!-- Adiciona txtfield para o aniversário do Perfil -->
			<div class="form-group"> 
				{!! Form::label("stri_aniversario", "Data de Nascimento:") !!}
				{!! Form::text("stri_aniversario",  $perfil->stri_aniversario , ['class' => 'form-control']) !!} 	
			</div>

			<!-- Adiciona txtfield para a cidade natal do Perfil -->
			<div class="form-group"> 
				{!! Form::label("stri_cidade_natal", "Cidade Natal:") !!}
				{!! Form::text("stri_cidade_natal",  $perfil->stri_cidade_natal , ['class' => 'form-control']) !!} 	
			</div>

			<!-- Adiciona submit button para o form de Edicao -->
			<div class="form-group"> 
				{!! Form::submit("Submit", ['class' => 'form-control btn btn-primary']) !!}
			</div>

			{!! Form::close() !!}
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
 