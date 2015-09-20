@extends('cuidar')


@section('content')
	<div class="panel panel-default">
            <div class="panel-heading"><h1>Criar Projeto Social</h1></div>
            <div class="panel-body">
            
            {!! Form::open(['url' => 'ong']) !!}

                    @include('ong.form', ['btnSubmit' => 'Criar Projeto Social'])

            {!! Form::close() !!}

            </div>

            @include('errors.list')


	</div>
@endsection
 
