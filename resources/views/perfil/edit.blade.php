@extends('app')


@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-heading"><h1>Editando: {{ $user->username }}</h1></div>
			<div class="panel-body">
			
			{!! Form::model($user, ['url' => ['perfil/editar',  $user->id ]]) !!}
	
			<!-- Adiciona um text field para o form-->
			<div class="form-group"> 
				{!! Form::label("username", "Nome:") !!}
				{!! Form::text("username",  null , ['class' => 'form-control']) !!} 	
			</div>

			<!-- Adiciona submit button ara o form de Edicao-->
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
 