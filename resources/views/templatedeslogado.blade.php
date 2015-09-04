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
	<link href='/fonts/futura/futura.css' rel='stylesheet' type='text/css'>

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
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 welcome-content">
			@yield('content')
	</div>

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>

</body>
</html>
