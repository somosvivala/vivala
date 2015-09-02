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
							{!! Form::label('idioma', 'Idioma', ['class' => 'titulo']) !!}
						</div>
						<div class="col-sm-3">
							{!! Form::label('email', 'Fazer login', ['class' => 'titulo']) !!}
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							{!! Form::select('idioma', array('pt' => 'PORTUGUÊS', 'en' => 'INGLÊS')) !!}
						</div>
						<div class="col-sm-4">
							{!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => 'E-MAIL']) !!}
						</div>


						<div class="col-sm-4">
							{!! Form::password("password", ['class' => 'form-control', "placeholder" => "SENHA"]) !!}
							<span class="btn-submit">
								{!! Form::submit("OK", ['class' => 'btn-default btn loginbtn']) !!}
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							&nbsp;
						</div>
						<div class="col-sm-4">
							<label class="rememberme" for="remember"><input type="checkbox" name="remember" id="remember">Mantenha-me logado</label>
						</div>
						<div class="col-sm-4">
							<a href="{{ url('/password/email') }}">Esqueceu a senha?</a>
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
				<img class="brasilwelcome" src="/img/brasilwelcome.png" alt="Conheça o Brasil!" title="Cadastre-se na Vivalá e conheça o Brasil de verdade">
				<div class="balao-flutuante balao-1">
					Compre seu transporte, hospedagem, alimentação e entretenimento na plataforma de viagens brasileiras mais completa da web.
				</div>
				<div class="balao-flutuante balao-2">
					Faça trabalhos voluntários e desenvolva o Brasil.
				</div>
				<div class="balao-flutuante balao-3">
					Conecte-se com pessoas que tem interesse em viajar no Brasil.
				</div>
			</div>

			<div class="col-sm-5 form-cadastro-wrapper">
				<!-- Adiciona a abertura do Form -->
				{!! Form::open(['url' => '/auth/register', 'class' => 'form-horizontal']) !!}

				<div class="welcome-cadastrar row">
					<div class="col-md-6">
						<h3>Cadastre-se</h3>
					</div>
					<div class="col-md-6">
						<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook btn-xs">
							<i class="fa fa-facebook"></i> {{ trans('acoes.fblogin') }}
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
						{!! Form::text("username", null, ['class' => 'form-control', 'placeholder' => 'NOME']) !!}
					</div>
					<div class="col-sm-6">
						<!-- Adiciona um text field para o form-->
						{!! Form::text("username_last", null, ['class' => 'form-control', 'placeholder' => 'SOBRENOME']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6">
						<label class="radio-button radio-hidden">
							{!! Form::radio("genero", "masculino") !!}
							<span>MASCULINO</span>
						</label>
					</div>
					<div class="col-sm-6">
						<label class="radio-button radio-hidden">
							{!! Form::radio("genero", "feminino") !!}
							<span>FEMININO</span>
						</label>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name='aniversario' class="datepicker form-control" placeholder="DATA DE NASCIMENTO">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => 'E-MAIL']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::password("password", ['class' => 'form-control', "placeholder" => "SENHA"]) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::password("password_confirmation", ['class' => 'form-control', "placeholder" => "CONFIRMAÇÃO DE SENHA"]) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p>Ao clicar em confirmar, você concorda com nossos Termos e Política de Dados, incluindo nosso Uso de Cookies.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<!-- <a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a> -->
					</div>
					<div class="col-sm-4">
						{!!Form::submit("CONFIRMAR", ['class' => 'btn btn-default']) !!}
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
