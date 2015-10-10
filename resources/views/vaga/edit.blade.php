@extends('cuidar')

@section('content')
  <h1>{{ trans('global.lbl_edit') }}</h1>
	<!-- Adiciona um formulario pra upload de foto-->
        <div class="text-center jc_coords row col-sm-12">

  	{!! Form::model($vaga, ['method' => 'PATCH', 'action' => ['VagaController@update', $vaga->id] ]) !!}

                {!! Form::hidden("foto", false, ['id' => 'uploadedFoto' ]) !!}
		@include('vaga.form', ['btnSubmit' => trans('global.lbl_cause_update')]);

    {!! Form::close() !!}

    @include('errors.list')
@stop
