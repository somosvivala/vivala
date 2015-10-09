@extends('cuidar')

@section('content')
	<div class="panel panel-default">
            <h3 class="font-bold-upper text-center"> {{ trans('global.lbl_cause_create') }}
                <small class="sub-titulo"></small>
            </h3>
            <div class="panel-heading"><h1></h1></div>
            <div class="panel-body">

            {!! Form::open(['url' => 'vagas']) !!}
            	@include('vaga.form', ['btnSubmit' => trans('global.lbl_create') ])
            {!! Form::close() !!}

						</div>
            @include('errors.list')
	</div>
@endsection
