<!DOCTYPE html>
<html lang="en" id="welcome-html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vivalá</title>

	<link rel="icon" href="/favicon-16.png" sizes="16x16"/>
	<link rel="icon" href="/favicon-32.png" sizes="32x32"/>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='fonts/futura/futura.css' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="col-sm-12 welcome-header">
		<div class="container">
			<div class="col-sm-5">
				<a class="navbar-brand nav-logo" href="{{ url('home') }}"><img src="/img/vivalogo.png" alt="Vivalá" title="Vivalá"></a>
			</div>
			<div class="col-sm-7">
				<div class="col-sm-10">
					{!! Form::open(['url' => '/auth/login', 'class' => 'form-horizontal form-login']) !!}
					<div class="row">
						<div class="col-sm-4">
							{!! Form::label('idioma', trans('welcome.language'), ['class' => 'titulo']) !!}
						</div>
						<div class="col-sm-3">
							{!! Form::label('email', trans('welcome.login'), ['class' => 'titulo']) !!}
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							{!! Form::select('idioma', array('pt' => trans('welcome.pt-BR'), 'en' => trans('welcome.en-US') )) !!}
						</div>
						<div class="col-sm-4">
							{!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('welcome.ph_email') ]) !!}
						</div>
						<div class="col-sm-4">
							{!! Form::password("password", ['class' => 'form-control', "placeholder" => trans('welcome.ph_password') ]) !!}
							<span class="btn-submit">
								{!! Form::submit( trans('welcome.btn_ok'), ['class' => 'btn-default btn loginbtn']) !!}
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							&nbsp;
						</div>
						<div class="col-sm-4">
							<label class="rememberme" for="remember"><input type="checkbox" name="remember" id="remember">{{trans('welcome.keeplogged')}}</label>
						</div>
						<div class="col-sm-4">
							<a href="{{ url('/password/email') }}">{{trans('welcome.forgotpassword')}}</a>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 welcome-content">
		<div class="container">
			<div class="col-sm-7 welcome-left">
				<img class="brasilwelcome" src="/img/brasilwelcome.png" alt="{{ trans('welcome.img_alt_vivalameet') }}" title="{{ trans('welcome.img_t_vivalaregister') }}">
				<div class="balao-flutuante balao-1">
					{{ trans('welcome.floatingballon1') }}
				</div>
				<div class="balao-flutuante balao-2">
					{{ trans('welcome.floatingballon2') }}
				</div>
				<div class="balao-flutuante balao-3">
					{{ trans('welcome.floatingballon3') }}
				</div>
			</div>

			<div class="col-sm-5 form-cadastro-wrapper">
				<!-- Adiciona a abertura do Form -->
				{!! Form::open(['url' => '/auth/register', 'class' => 'form-horizontal']) !!}

				<div class="welcome-cadastrar row">
					<div class="col-md-6">
						<h3>{{ trans('welcome.signup') }}</h3>
					</div>
					<div class="col-md-6">
						<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook btn-xs">
							<i class="fa fa-facebook"></i> {{ trans('welcome.btn_fblogin') }}
						</a>
					</div>
				</div>
				@if (count($errors) > 0)
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-danger">
							<ul class="">
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				@endif


				<div class="form-group">
					<div class="col-sm-6">
						<!-- Adiciona um text field para o form-->
						{!! Form::text("username", null, ['class' => 'form-control', 'placeholder' => trans('welcome.ph_name')]) !!}
					</div>
					<div class="col-sm-6">
						<!-- Adiciona um text field para o form-->
						{!! Form::text("username_last", null, ['class' => 'form-control', 'placeholder' => trans('welcome.ph_lastname')]) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6">
						<label class="radio-button radio-hidden">
							{!! Form::radio("genero", "masculino") !!}
							<span>{{trans('welcome.ph_male')}}</span>
						</label>
					</div>
					<div class="col-sm-6">
						<label class="radio-button radio-hidden">
							{!! Form::radio("genero", "feminino") !!}
							<span>{{trans('welcome.ph_female')}}</span>
						</label>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name='aniversario' class="mask-data form-control" placeholder="{{ trans('welcome.ph_birthday') }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('welcome.ph_email')]) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::password("password", ['class' => 'form-control', "placeholder" => trans('welcome.senha')]) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::password("password_confirmation", ['class' => 'form-control', "placeholder" => trans('welcome.ph_passwordconfirmation') ]) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 welcome-privacy">
						<p>{{ trans('welcome.aboutprivacy1') }}
							<a href="#"> {{ trans('welcome.a_privacyterms') }}</a>
							 {{ trans('welcome.aboutprivacy2') }}
							<a href="#"> {{ trans('welcome.a_datapolicy') }}</a>
							 {{ trans('welcome.aboutprivacy3') }}
							<a href="#"> {{ trans('welcome.a_cookie') }}</a>.
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<!-- <a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a> -->
					</div>
					<div class="col-sm-4">
						{!!Form::submit( trans('welcome.btn_signup'), ['class' => 'btn btn-default']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
</body>
</html>
