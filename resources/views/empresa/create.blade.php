@extends('viajar')

@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-heading"><h1>Adicionando Empresa</h1></div>
		<div class="panel-body">
		
		{!! Form::open(['url' => 'empresa']) !!}

			@include('empresa.form', ['btnSubmit' => 'Atualizar Dados']);

		{!! Form::close() !!}

		</div>

    	@include('errors.list')

	</div>
	</div>
@endsection
 