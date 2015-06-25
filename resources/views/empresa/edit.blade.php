@extends('app')

@section('content')
  <h1>Edite a Empresa</h1>

  	{!! Form::model($empresa, ['method' => 'PATCH', 'action' => ['EmpresaController@update', $empresa->id] ]) !!}

		@include('empresa.form', ['btnSubmit' => 'Atualizar Dados']);

    {!! Form::close() !!}

    @include('errors.list')
@stop