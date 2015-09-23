@extends('cuidar')

@section('content')
  <h1>Edite a Causa</h1>
	<!-- Adiciona um formulario pra upload de foto-->
        <div class="text-center jc_coords row col-sm-12">

  	{!! Form::model($causa, ['method' => 'PATCH', 'action' => ['CausaController@update', $causa->id] ]) !!}

		@include('causa.form', ['btnSubmit' => 'Atualizar dados da Causa']);

    {!! Form::close() !!}

    @include('errors.list')
@stop
