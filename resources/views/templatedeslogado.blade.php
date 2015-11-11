<!DOCTYPE html>
<html lang="en" id="welcome-html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ trans('global.title_vivala') }}</title>

	{{-- Favicon e relacionados --}}
	  <link rel="apple-touch-icon" sizes="57x57" href="favicon/v/apple-touch-icon-57x57.png">
	  <link rel="apple-touch-icon" sizes="60x60" href="favicon/v/apple-touch-icon-60x60.png">
	  <link rel="apple-touch-icon" sizes="72x72" href="favicon/v/apple-touch-icon-72x72.png">
	  <link rel="apple-touch-icon" sizes="76x76" href="favicon/v/apple-touch-icon-76x76.png">
	  <link rel="apple-touch-icon" sizes="114x114" href="favicon/v/apple-touch-icon-114x114.png">
	  <link rel="apple-touch-icon" sizes="120x120" href="favicon/v/apple-touch-icon-120x120.png">
	  <link rel="apple-touch-icon" sizes="144x144" href="favicon/v/apple-touch-icon-144x144.png">
	  <link rel="apple-touch-icon" sizes="152x152" href="favicon/v/apple-touch-icon-152x152.png">
	  <link rel="apple-touch-icon" sizes="180x180" href="favicon/v/apple-touch-icon-180x180.png">
	  <link rel="icon" type="image/png" href="favicon/v/favicon-32x32.png" sizes="32x32">
	  <link rel="icon" type="image/png" href="favicon/v/android-chrome-192x192.png" sizes="192x192">
	  <link rel="icon" type="image/png" href="favicon/v/favicon-96x96.png" sizes="96x96">
	  <link rel="icon" type="image/png" href="favicon/v/favicon-16x16.png" sizes="16x16">
	  <link rel="manifest" href="favicon/v/manifest.json">
	  <link rel="mask-icon" href="favicon/v/safari-pinned-tab.svg" color="#f3702b">
	  <meta name="msapplication-TileColor" content="#da532c">
	  <meta name="msapplication-TileImage" content="favicon/v/mstile-144x144.png">
	  <meta name="theme-color" content="#ffffff">

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
				<a class="navbar-brand nav-logo" href="{{ url('home') }}"><img src="/img/vivalogo.png" alt='{{ trans("global.alt_vivala") }}' title='{{ trans("global.title_vivala") }}'></a>
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
