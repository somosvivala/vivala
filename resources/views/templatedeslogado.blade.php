<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

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

	<nav class="col-sm-12 col-md-12">
		@yield('content')
	</nav>

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>

</body>
</html>
