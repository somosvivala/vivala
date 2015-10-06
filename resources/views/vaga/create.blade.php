@extends('cuidar')

@section('content')
	<div class="panel panel-default">
            <div class="panel-heading"><h1>{{ trans('global.lbl_cause_create') }}</h1></div>
            <div class="panel-body">

            {!! Form::open(['url' => 'vagas']) !!}
            	@include('vaga.form', ['btnSubmit' => trans('global.lbl_create') ])
            {!! Form::close() !!}

						</div>
            @include('errors.list')
	</div>
@endsection
