<!DOCTYPE html>
<html lang="en" id="welcome-html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vivalá</title>

	<link href="{{ asset('/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap-social.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/Jcrop/jquery.Jcrop.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:800,400' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar welcome-navbar">
		<div class="col-sm-4">
			<a class="navbar-brand" href="{{ url('home') }}">Vivalá</a>
		</div>
		<div class="col-sm-8">
	      		<div class="col-sm-3">
					<label for='idioma'>IDIOMA</label>
	      			<input type="text" class="form-control" name='idioma' placeholder="PORTUGUÊS">
	      		</div>
				<div class="col-sm-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
			      		<div class="col-sm-6">
							<label for='email'>FAZER LOGIN</label>
			      			<div class="input-wrapper">
			      				<input type="email" class="form-control" placeholder="E-MAIL" name="email" value="{{ old('email') }}">
			      			</div>
			      			<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Mantenha-me logado
								</label>
							</div>
			      		</div>
			      		<div class="col-sm-6 input-group">
							<label>&nbsp;</label>
			      			<div class="input-wrapper input-group">
					      		<input type="password" class="form-control" placeholder="SENHA" name="password">
					      		<span class="input-group-btn">
					      		  	<button class="btn-default btn loginbtn" type="submit">OK</button>
					      		</span>
			      			</div>
							<a class="forgot-password" href="{{ url('/password/email') }}">Esqueceu a senha?</a>
			      		</div>
					</form>
				</div>
		</div>
	</nav>

	<div class="row welcome-content">
		<div class="container">
			<div class="col-sm-6 welcome-left">
				<h2>Cadastre-se na Vivalá e<br>conheça o Brasil de verdade.</h2>
				<p>Conecte-se com pessoas que tem interesse em viajar no Brasil.</p>
				<p>Compre seu transport, hospedagem, alimentação e entretenimento na plataforma de viagens brasileiras mais completa da web.</p>
				<p>Faça trabalhos voluntários e desenvolva o Brasil.</p>
			</div>

			<div class="col-sm-5 welcome-right">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<div class="col-md-6">
							<h3>CADASTRE-SE</h3>
							<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook">
								<i class="fa fa-facebook"></i> {{ trans('acoes.fblogin') }}
							</a>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">Register</div>
						<div class="panel-body">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
		      				<input type="text" class="form-control" name='username' placeholder="NOME">
						</div>						
						<div class="col-sm-6">
		      				<input type="text" class="form-control" name='username_last' placeholder="SOBRENOME">
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
		      				<input type="text" class="datepicker form-control" placeholder="DATA DE NASCIMENTO" data-date-format="mm/dd/yyyy">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="email" class="form-control" name='email' placeholder="E-MAIL">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="email" class="form-control" name='email_confirmation' placeholder="CONFIRMAÇÃO DE E-MAIL" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="password" class="form-control" name='password' placeholder="SENHA" autocomplete="off">
						</div>
					</div>
					
					<p>Ao clicar em confirmar, você concorda com nossos Termos e Política de Dados, incluindo nosso Uso de Cookies.</p>
					<a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a>
					
					<button type="submit" class="btn btn-default">CONFIRMAR</button>

				</form>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
</body>
</html>
