@extends('cuidar')

@section('content')
  <h1>{{ trans('global.lbl_edit') }}</h1>
	<!-- Adiciona um formulario pra upload de foto-->
        <div class="text-center jc_coords row col-sm-12">

  	{!! Form::model($causa, ['method' => 'PATCH', 'action' => ['CausaController@update', $causa->id] ]) !!}

		@include('causa.form', ['btnSubmit' => trans('global.lbl_cause_update')]);

    {!! Form::close() !!}

    @include('errors.list')
@stop
