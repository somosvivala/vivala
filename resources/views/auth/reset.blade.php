@extends('templatedeslogado')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel margin-t-2">
				<div class="panel-heading">
					<h3>{{ trans('global.lbl_password_forgot') }}</h3>
				</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<div class="col-md-12">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ENDEREÇO DE EMAIL">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('global.lbl_password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('global.lbl_password_confirmation') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-default">
									{{ trans('global.lbl_password_reset') }}
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
