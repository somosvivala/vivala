@extends('app')

@section('content')
	<div class="container-fluid">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-heading"><h1>{{ trans('global.lbl_setting_creating') }}</h1></div>
			<div class="panel-body">

			{!! Form::open(['url' => 'configuracao']) !!}

				{{-- Adiciona um text field para o form --}}
				<div class="form-group">
					{!! Form::label("char_nome_configuracao", trans('global.lbl_index')) !!}
					{!! Form::text("char_nome_configuracao",  null , ['class' => 'form-control']) !!}
				</div>

				{{-- Adiciona um text field para o form --}}
				<div class="form-group">
					{!! Form::label('text_valor_configuracao', trans('global.lbl_value')) !!}
					{!! Form::textarea("text_valor_configuracao", null, ['class' => 'form-control']) !!}
				</div>

				{{-- Adiciona submit button ara o form de Edicao --}}
				<div class="form-group">
					{!! Form::submit(trans('global.lbl_setting_create'), ['class' => 'form-control btn btn-primary btn-acao']) !!}
				</div>

			{!! Form::close() !!}
			</div>

			@if ($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			@endif

	</div>
	</div>
@endsection
