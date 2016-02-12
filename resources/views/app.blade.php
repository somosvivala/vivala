<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ trans('global.title_vivala') }}</title>

    {{-- Codificação de Caracteres --}}
	   <meta charset="utf-8">

    {{-- Lingua utilizada na view --}}
		<meta name="laravelLang" content='<?php echo \Lang::getLocale(); ?>'>

    {{-- Mobile Zoom e IECompat --}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Analytics --}}
        <meta name="google-site-verification" content="U7etmc1T1SL8IEwLdDu-Aq941mJGMpSFUapaAn-7ME0" />

    {{-- Favicon e relacionados --}}
        <link rel="apple-touch-icon" sizes="57x57" href="../favicon/v/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../favicon/v/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../favicon/v/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../favicon/v/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../favicon/v/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../favicon/v/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../favicon/v/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../favicon/v/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon/v/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="../favicon/v/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="../favicon/v/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="../favicon/v/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="../favicon/v/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="../favicon/v/manifest.json">
        <link rel="mask-icon" href="../favicon/v/safari-pinned-tab.svg" color="#f3702b">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="../favicon/v/mstile-144x144.png">
        <meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
        <link href="{{ asset('/css/Jcrop/jquery.Jcrop.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
		<link href='/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
		<link href='/fonts/vivala/vivala-glyphicons.css' rel='stylesheet' type='text/css'>

	{{-- Google Analytics JS --}}
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
	{{-- Facebook Post Plugin JS --}}
        <i id="javascript-ativo" class="fa fa-times @if (env('APP_ENV') != 'local') hidden @endif" style="padding:0.2em 0.5em; color:white; font-size: 20px; border-radius:3px; position:absolute; top:5px;left:3px;z-index:10;background-color:#e55"><b class="font-bold-upper"> JS</b></i>
	@yield('pilar')

    {{-- Scripts --}}
	<script src="{{ asset('/js/vendor.js') }}"></script>
	<script src="{{ asset('/js/lightbox.min.js') }}"></script>
	<script src="{{ asset('/js/elevatezoom.min.js')}}"></script>
    <div id="fb-root"></div><script>(function(d, s, id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=1598914903686637";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Iubenda (link de Privacy Policy) -->
	<!-- <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> -->
    <!-- Modal com iframe da quimera -->
<div id="modal-quimera" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <iframe src="" class="quimera_iframe" style="border: 0;">
                </iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>
