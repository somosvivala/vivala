@extends('cuidar')

@section('content')
	<h4 class="suave">{{ trans('global.lbl_album_') }}</h4>

	<div class="col-md-6">
		<h1>{{ trans('global.lbl_album_adding') }}</h1>

		{!! Form::open(['url' => 'albums']) !!}
		@include('album.form', ['btnSubmit' => trans('global.lbl_album_create')]);
		{!! Form::close() !!}

		@include('errors.list')

	</div>
@endsection
