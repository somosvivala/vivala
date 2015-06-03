@extends('app')


@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-heading"><h1>Adicionando Empresa</h1></div>
			<div class="panel-body">
			
			{!! Form::open(['url' => 'empresa']) !!}
	
			<!-- Adiciona um text field para o form-->
			<div class="form-group"> 
				{!! Form::label("nome", "Nome:") !!}
				{!! Form::text("nome",  null , ['class' => 'form-control']) !!} 	
			</div>

			<div class="form-group"> 
				{!! Form::submit("Cadastrar Empresa", ['class' => 'form-control btn btn-primary']) !!}
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
 