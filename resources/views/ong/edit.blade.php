@extends('cuidar')

@section('content')
  <h1>Edite a Ong</h1>

  	{!! Form::model($ong, ['method' => 'PATCH', 'action' => ['OngController@update', $ong->id] ]) !!}

		@include('ong.form', ['btnSubmit' => 'Atualizar Dados']);

    {!! Form::close() !!}

    @include('errors.list')
@stop