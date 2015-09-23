@extends('cuidar')


@section('content')
	<div class="panel panel-default">
            <div class="panel-heading"><h1>Criar uma Causa</h1></div>
            <div class="panel-body">
            
            {!! Form::open(['url' => 'causas']) !!}

                    @include('causa.form', ['btnSubmit' => 'Criar Causa'])

            {!! Form::close() !!}

            </div>

            @include('errors.list')


	</div>
@endsection
 
