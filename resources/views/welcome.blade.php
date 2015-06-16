<!DOCTYPE html>
<html lang="en">
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

<style>
/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}


body {
	background-color: #d28020;
	background-image: url("{{ asset('/img/dummy.jpg') }}");
	background-position: center center;
	background-size: cover;
}
</style>

<body>
	<nav class="navbar welcome-navbar">
		<div class="col-sm-4">
			<a class="navbar-brand" href="{{ url('home') }}">Vivalá</a>
		</div>
		<div class="col-sm-8">
	      		<div class="col-sm-3">
					<label class="control-label">IDIOMA</label>
	      			<input type="text" class="form-control" placeholder="PORTUGUÊS">
	      		</div>
				<div class="col-sm-8">
		      		<div class="col-sm-6">
						<label class="control-label">FAZER LOGIN</label>
		      			<div class="input-wrapper">
		      				<input type="text" class="form-control" placeholder="E-MAIL">
		      			</div>
		      			<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Mantenha-me logado
							</label>
						</div>
		      		</div>
		      		<div class="col-sm-6 input-group">
						<label class="control-label">&nbsp;</label>
		      			<div class="input-wrapper input-group">
				      		<input type="text" class="form-control" placeholder="SENHA">
				      		<span class="input-group-btn">
				      		  	<button class="btn-default btn loginbtn" type="button">OK</button>
				      		</span>
		      			</div>
						<a class="forgot-password" href="{{ url('/password/email') }}">Esqueceu a senha?</a>

		      		</div>
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

			<div class="col-sm-6">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<div class="col-md-6">
							<h3>CADASTRE-SE</h3>
							<a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook">
								<i class="fa fa-facebook"></i> {{ trans('facebook.login') }}
							</a>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6">
		      				<input type="text" class="form-control" placeholder="NOME">
						</div>						
						<div class="col-sm-6">
		      				<input type="text" class="form-control" placeholder="SOBRENOME">
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
		      				<input type="text" class="form-control" placeholder="DATA DE NASCIMENTO">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="text" class="form-control" placeholder="E-MAIL">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="text" class="form-control" placeholder="CONFIRMAÇÃO DE E-MAIL">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
		      				<input type="text" class="form-control" placeholder="SENHA">
						</div>
					</div>
					
					<p>Ao clicar em confirmar, você concirda com nossos Termos e Politica de Dados, incluindo nosso Uso de Cookies</p>
					<a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a>
					
					<button type="submit" class="btn btn-default">CONFIRMAR</button>

				</form>

			</div>
		</div>
	</div>

</body>
</html>
