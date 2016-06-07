<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ trans('global.title_vivala') }} - {{ trans('global.lbl_page_not_found') }}</title>

    {{-- Codificação de Caracteres --}}
      <meta content="text/html;charset=utf-8" http-equiv="Content-Type">

    {{-- Lingua utilizada na view --}}
		<meta name="language" content='{{ Config::get('app.locale') }}'>

    {{-- Mobile Zoom e IECompat --}}
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    {{-- Favicon e relacionados --}}
      <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/v/apple-touch-icon-57x57.png') }}">
      <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/v/apple-touch-icon-60x60.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/v/apple-touch-icon-72x72.png') }}">
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/v/apple-touch-icon-76x76.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/v/apple-touch-icon-114x114.png') }}">
      <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/v/apple-touch-icon-120x120.png') }}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/v/apple-touch-icon-144x144.png') }}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/v/apple-touch-icon-152x152.png') }}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/v/apple-touch-icon-180x180.png') }}">
      <link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-32x32.png') }}" sizes="32x32">
      <link rel="icon" type="image/png" href="{{ asset('favicon/v/android-chrome-192x192.png') }}" sizes="192x192">
      <link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-96x96.png') }}" sizes="96x96">
      <link rel="icon" type="image/png" href="{{ asset('favicon/v/favicon-16x16.png') }}" sizes="16x16">
      <link rel="manifest" href="{{ asset('favicon/v/manifest.json') }}">
      <link rel="mask-icon" href="{{ asset('favicon/v/safari-pinned-tab.svg') }}" color="#f3702b">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="msapplication-TileImage" content="{{ asset('favicon/v/mstile-144x144.png') }}">
      <meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
        {{-- Fontes --}}
          <link href="{{ asset('/fonts/avenir/avenir.css') }}" rel='stylesheet' type='text/css'>
          <link href="{{ asset('/fonts/futura/futura.css') }}" rel='stylesheet' type='text/css'>
          <link href="{{ asset('/fonts/gotham/gotham.css') }}" rel='stylesheet' type='text/css'>
          <link href="{{ asset('/fonts/weather-icons/weather-icons.css') }}" rel='stylesheet' type='text/css'>
          <link href="{{ asset('/fonts/weather-icons/weather-icons-wind.css') }}" rel='stylesheet' type='text/css'>
          <link href="{{ asset('/fonts/vivala/vivala-glyphicons.css') }}" rel='stylesheet' type='text/css'>
        {{-- AllCSS --}}
          <link href="{{ asset('/css/Jcrop/jquery.Jcrop.min.css') }}" rel="stylesheet">
          <link href="{{ asset('/css/all.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
       <![endif]-->
</head>

<body>
	{{-- Plugin JAVASCRIPT ativo --}}
    <i id="javascript-ativo" class="fa fa-times @if(env('APP_ENV') === 'production') hidden @endif" style="padding:0.2em 0.5em; color:white; font-size: 20px; border-radius:3px; position:absolute; top:5px;left:3px;z-index:10;background-color:#e55"><b class="font-bold-upper"> JS</b></i>

  {{-- BODY DO 404 --}}
    <nav class="navbar navbar-default menu-top header hidden-xs">
  		@include('header')
  	</nav>

    <section id="erro-404">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-lg-12 text-center">
            <div class="corpo">
              <div class="titulo padding-t-2">
                <h1 class="font-bold-upper">{!! trans('errors.page-sorry-unavaiable') !!}</h1>
                <h2 class="ajuste-fonte-avenir-medium" >{!! trans('errors.page-broken-expired-removed') !!}</h2>
              </div>
              <div class="conteudo margin-t-1 margin-b-1">
                <i class="fa fa-thumbs-o-down laranja"></i>
              </div>
              <div class="rodape margin-t-5 padding-b-2">
                <ul>
                  <li><a href="{{ url('/') }}" class="btn btn-acao">{!! trans('errors.back-to-home') !!}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer hidden-xs">
  		@include('footer')
  	</footer>

  {{-- Scripts --}}
    <script src="{{ asset('/js/vendor.js') }}"></script>
    <script src="{{ asset('/js/lightbox.min.js') }}"></script>
    <div id="fb-root"></div><script>(function(d, s, id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=(env('FACEBOOK_APP_ID')";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
    <div id="ig-root"></div><script type="text/javascript">$(document).ready(function(){igScript({igUserID: '{{ getenv('INSTAGRAM_USER_ID') }}',igATkn: '{{ getenv('INSTAGRAM_ACCESS_TOKEN') }}',igAppID: '{{ getenv('INSTAGRAM_APP_ID')}}',igAppCS: '{{ getenv('INSTAGRAM_APP_CLIENT_SECRET')}}'}); });</script>
</body>

</html>
