@extends('cuidar')

@section('content')
		<h4 class="suave">
			Álbuns
		</h4>
	
	<div class="col-md-6">
		<h1>Adicionando Album</h1>
		
		{!! Form::open(['url' => 'albums']) !!}

		@include('album.form', ['btnSubmit' => 'Criar album']);

		{!! Form::close() !!}


		@include('errors.list')
	</div>

 @endsection