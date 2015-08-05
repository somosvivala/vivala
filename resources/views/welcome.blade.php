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
	<div class="row welcome-header">
		<div class="col-sm-5">
			<a class="navbar-brand logo" href="{{ url('home') }}"><img src="/logo.png" alt="Vivalá" title="Vivalá"></a>
		</div>
		<div class="col-sm-7">
				<div class="col-sm-8">
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

	<div class="row welcome-content">
		<div class="container">
			<div class="col-sm-6 welcome-left">
				<h2>Cadastre-se na Vivalá e<br>conheça o Brasil de verdade.</h2>
				<p>Conecte-se com pessoas que tem interesse em viajar no Brasil.</p>
				<p>Compre seu transport, hospedagem, alimentação e entretenimento na plataforma de viagens brasileiras mais completa da web.</p>
				<p>Faça trabalhos voluntários e desenvolva o Brasil.</p>
			</div>

			<div class="col-sm-5 welcome-right">
				<!-- Adiciona a abertura do Form -->
				{!! Form::open(['url' => '/auth/register', 'class' => 'form-horizontal']) !!}

					<div class="form-group">
						<div class="col-md-6">
							<h3>CADASTRE-SE</h3>
							<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook">
								<i class="fa fa-facebook"></i> {{ trans('acoes.fblogin') }}
							</a>
						</div>
					</div>

					@if (count($errors) > 0)
						<div class="panel panel-default">
							<div class="panel-heading">Register</div>
							<div class="panel-body">
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
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
		      				<input type="text" class="form-control" placeholder="MASCULINO">
						</div>
						<div class="col-sm-6">
		      				<input type="text" class="form-control" placeholder="FEMININO">
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
							{!! Form::email("email_confirmation", old('email'), ['class' => 'form-control', 'placeholder' => 'CONFIRMAÇÃO DE E-MAIL']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
		      				{!! Form::password("password", ['class' => 'form-control', "placeholder" => "SENHA"]) !!}
						</div>
					</div>

					<p>Ao clicar em confirmar, você concorda com nossos Termos e Política de Dados, incluindo nosso Uso de Cookies.</p>
					<a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a>

					{!!Form::submit("CONFIRMAR", ['class' => 'btn btn-default']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
</body>
</html>
