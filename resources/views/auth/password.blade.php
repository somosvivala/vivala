@extends('templatedeslogado')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel margin-t-2">
				<div class="panel-heading row">
					<div class="col-md-12">
						<h3 class="text-left">{{ trans('global.lbl_password_forgot') }}</h3>
					</div>
				</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>{{ trans('global.error_whops') }}</strong> {{ trans('global.error_input_problem') }}<br>{{ trans('global.error_input_again') }}<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group row">
							<div class="col-md-12">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('global.lbl_email') }}">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primario btn-acao pull-right">
									{{ trans('global.lbl_password_recovery_link_send') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
