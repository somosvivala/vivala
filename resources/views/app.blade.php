<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ trans('global.title_vivala') }}</title>

	<link rel="icon" href="/favicon-16.png" sizes="16x16"/>
        <link rel="icon" href="/favicon-32.png" sizes="32x32"/>
	<link href="{{ asset('/css/Jcrop/jquery.Jcrop.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-61678141-2', 'auto');
          ga('send', 'pageview');

        </script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <i id="javascript-ativo" class="fa fa-times @if (env('APP_ENV') != 'local') hidden @endif" style="padding:0.2em 0.5em; color:white; font-size: 20px; border-radius:3px; position:absolute; top:5px;left:3px;z-index:10;background-color:#e55"><b class="font-bold-upper"> JS</b></i>
	@yield('pilar')

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
	<script src="{{ asset('/js/lightbox.min.js') }}"></script>

	<!-- Iubenda (link de Privacy Policy) -->
	<!-- <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> -->
</body>
</html>
