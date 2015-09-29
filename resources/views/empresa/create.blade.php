@extends('viajar')

@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-heading"><h1>{{ trans('global.lbl_company_adding') }}</h1></div>
		<div class="panel-body">

		{!! Form::open(['url' => 'empresa']) !!}
			@include('empresa.form', ['btnSubmit' => trans('global.lbl_update_data')]);
		{!! Form::close() !!}

		</div>

    	@include('errors.list')

	</div>
	</div>
@endsection
