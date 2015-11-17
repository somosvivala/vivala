<!DOCTYPE html>
<html lang="en" id="welcome-html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('global.title_vivala') }}</title>

        {{-- Facebook OpenGraph metatags --}}
            <meta property="og:title" content="Vivalá - Cadastre-se e cconecte-se ao Brasil de verdade!" />
            <meta property="og:site_name" content="Vivalá"/>
            <meta property="og:url" content="http://www.vivala.com.br/" />
            <meta property="og:description" content="Planeje suas experiências, compre transporte, hospedagem e reserva de restaurantes em todo o Brasil. Conheça Projetos de impacto social e transforme o país através de voluntariado." />
            <meta property="og:image" content="http://vivala.com.br/img/dummy.jpg">

        {{-- Twitter Card metatags --}}
            <meta name="twitter:card" content="summary" />

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

        {{-- Fontes --}}
            <link href='/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
            <link href='/fonts/vivala/vivala-glyphicons.css' rel='stylesheet' type='text/css'>

        {{-- All CSS --}}
            <link href="{{ asset('/css/all.css') }}" rel="stylesheet">

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
                <div class="col-sm-5 col-xs-12 text-center">
                    <a class="navbar-brand nav-logo" href="{{ url('home') }}" alt="{{ trans('global.lbl_vivala') }}">
                        {{-- SVG da logo VIVALÁ --}}
                            <svg version="1.1" id="logo-vivala" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 width="100%" height="100%" viewBox="0 0 87.887 48.229" enable-background="new 0 0 87.887 48.229" xml:space="preserve">
                            <g>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M11.775,36.843c0.046-0.745,0.101-1.395,0.122-2.045
                            		c0.031-0.998,0.039-1.998,0.056-2.996c0.059-3.433,0.113-6.867,0.174-10.3c0.045-2.46,0.094-4.919,0.149-7.378
                            		c0.029-1.363,0.075-2.726,0.117-4.089c0.021-0.638,0.024-0.637,0.643-0.726c1.613-0.231,3.225-0.47,4.84-0.69
                            		c0.281-0.039,0.574-0.006,0.95-0.006c0.07,0.962,0.038,1.896,0.021,2.913c-0.451,0.019-0.83,0.033-1.21,0.051
                            		c-0.567,0.029-0.633,0.085-0.655,0.633c-0.043,1.07-0.088,2.142-0.116,3.212c-0.067,2.605-0.121,5.21-0.191,7.815
                            		c-0.092,3.433-0.193,6.864-0.295,10.297c-0.091,3.092-0.186,6.182-0.281,9.273c-0.006,0.186-0.039,0.373-0.063,0.593
                            		c-0.189-0.008-0.334,0.006-0.468-0.024c-2.873-0.638-5.742-1.291-8.619-1.908c-0.479-0.104-0.688-0.299-0.764-0.789
                            		c-0.345-2.235-0.728-4.463-1.093-6.694c-0.513-3.12-1.021-6.241-1.533-9.36c-0.464-2.832-0.93-5.663-1.395-8.495
                            		C1.65,13.01,1.141,9.889,0.627,6.77C0.423,5.522,0.21,4.276,0.006,3.028C-0.01,2.937,0.012,2.842,0.019,2.69
                            		c0.203-0.029,0.386-0.075,0.57-0.076c1.218-0.007,2.437-0.009,3.653-0.001c0.646,0.004,0.659,0.031,0.762,0.701
                            		c0.718,4.712,1.445,9.424,2.156,14.136c0.707,4.69,1.397,9.381,2.1,14.07c0.208,1.395,0.445,2.786,0.637,4.186
                            		c0.062,0.451,0.269,0.696,0.697,0.803C10.963,36.601,11.326,36.714,11.775,36.843"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M75.291,25.673c0.196,2.559,0.389,5.051,0.578,7.533
                            		c-0.474,0.248-4.132,0.576-5.109,0.445c-0.051-8.35-0.223-16.71-0.201-25.134c0.551,0.03,1.007,0.037,1.46,0.083
                            		c2.179,0.222,4.354,0.457,6.533,0.68c0.726,0.075,1.455,0.127,2.182,0.194c0.563,0.051,0.649,0.123,0.751,0.686
                            		c0.632,3.519,1.26,7.039,1.887,10.558c0.705,3.951,1.407,7.902,2.11,11.853c0.711,3.999,1.422,7.997,2.132,11.996
                            		c0.089,0.5,0.174,1.001,0.274,1.579c-1.435,0.689-2.853,1.371-4.329,2.083c-0.085-0.269-0.173-0.464-0.205-0.667
                            		c-0.456-2.883-0.9-5.766-1.354-8.65c-0.416-2.643-0.837-5.283-1.258-7.926c-0.252-1.585-0.5-3.171-0.765-4.754
                            		c-0.104-0.622-0.123-0.629-0.742-0.633c-1.097-0.008-2.193-0.006-3.289,0C75.779,25.601,75.614,25.636,75.291,25.673
                            		 M74.937,13.457v7.469c0.646,0.25,3.521,0.269,4.241,0.033c0-0.201,0.024-0.417-0.004-0.626c-0.18-1.274-0.368-2.548-0.561-3.82
                            		c-0.131-0.864-0.274-1.727-0.406-2.591c-0.034-0.232-0.086-0.457-0.365-0.46C76.902,13.45,75.959,13.457,74.937,13.457"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M42.075,40.048c0.342-0.022,0.579-0.049,0.817-0.053
                            		c0.487-0.008,0.976,0.011,1.462-0.009c0.569-0.021,0.625-0.083,0.658-0.636c0.15-2.65,0.298-5.3,0.448-7.95
                            		c0.194-3.427,0.387-6.854,0.588-10.283c0.123-2.089,0.262-4.179,0.396-6.269c0.013-0.193,0.037-0.384,0.056-0.562
                            		c0.498-0.258,8.938-1.667,10.212-1.701c0.053,0.234,0.14,0.482,0.161,0.737c0.116,1.382,0.212,2.767,0.324,4.149
                            		c0.127,1.553,0.265,3.105,0.395,4.657c0.112,1.334,0.219,2.668,0.329,4.002c0.184,2.232,0.369,4.464,0.552,6.697
                            		c0.111,1.357,0.217,2.715,0.328,4.074c0.13,1.602,0.268,3.202,0.396,4.803c0.051,0.629,0.085,1.26,0.132,1.977
                            		c-1.43,0.281-2.861,0.416-4.38,0.539c-0.436-4.512-0.863-8.957-1.297-13.446h-3.423c-0.022,0.321-0.057,0.603-0.057,0.884
                            		c-0.005,3.168-0.003,6.336-0.003,9.504c0,0.17-0.012,0.343,0.001,0.512c0.027,0.363-0.147,0.541-0.498,0.578
                            		c-1.379,0.148-2.757,0.299-4.136,0.449c-0.727,0.08-1.451,0.167-2.177,0.24c-0.383,0.038-0.769,0.051-1.256,0.081
                            		C42.014,42.021,42.056,41.087,42.075,40.048 M49.614,25.835c0.797,0.201,3.633,0.184,4.231-0.014
                            		c0.008-0.129,0.042-0.271,0.023-0.408c-0.32-2.362-0.646-4.723-0.976-7.084c-0.074-0.527-0.151-0.596-0.717-0.608
                            		c-0.658-0.014-1.316-0.01-1.975,0.001c-0.186,0.003-0.37,0.061-0.588,0.099V25.835z"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M33.172,14.649c0.112,0.941,0.227,1.853,0.329,2.767
                            		c0.234,2.079,0.467,4.158,0.695,6.238c0.214,1.958,0.419,3.919,0.629,5.878c0.049,0.46,0.089,0.921,0.163,1.378
                            		c0.067,0.412,0.198,0.46,0.994,0.457c0.739-0.004,0.832-0.048,0.916-0.461c0.024-0.118,0.026-0.242,0.032-0.363
                            		c0.112-2.48,0.215-4.963,0.337-7.443c0.113-2.31,0.25-4.619,0.367-6.927c0.08-1.583,0.139-3.163,0.214-4.745
                            		c0.033-0.705,0.094-1.409,0.124-2.113c0.013-0.313,0.127-0.51,0.447-0.564c2.489-0.431,4.979-0.862,7.47-1.291
                            		c0.018-0.002,0.04,0.022,0.137,0.075c-0.097,0.729-0.182,1.494-0.305,2.254c-0.2,1.234-0.21,1.222-1.486,1.238
                            		c-0.526,0.007-1.07-0.111-1.658,0.187c-0.488,8.295-0.978,16.623-1.465,24.919c-0.59,0.203-9.261,0.256-10.255,0.074
                            		c-0.052-0.224-0.141-0.474-0.164-0.73c-0.313-3.417-0.606-6.836-0.923-10.252c-0.312-3.368-0.643-6.733-0.961-10.101
                            		c-0.015-0.141,0.011-0.284,0.018-0.416C29.367,14.553,32.053,14.513,33.172,14.649"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M76.761,42.175c-0.236,0.033-0.419,0.078-0.604,0.083
                            		c-3.942,0.104-7.885,0.206-11.828,0.309c-0.098,0.002-0.194,0.007-0.292,0.005c-0.673-0.005-0.702-0.042-0.749-0.683
                            		c-0.186-2.597-0.382-5.193-0.564-7.79c-0.164-2.354-0.308-4.71-0.476-7.064c-0.171-2.401-0.366-4.803-0.54-7.206
                            		c-0.119-1.625-0.213-3.252-0.328-4.879c-0.126-1.772-0.27-3.543-0.396-5.315c-0.104-1.453-0.191-2.907-0.292-4.444
                            		c1.839-0.529,3.705-0.911,5.67-1.406c0.014,0.425,0.032,0.753,0.035,1.083c0.024,2.557,0.04,5.114,0.07,7.671
                            		c0.043,3.481,0.097,6.962,0.146,10.444c0.049,3.433,0.096,6.866,0.147,10.298c0.021,1.436,0.052,2.872,0.084,4.309
                            		c0.005,0.189,0.04,0.377,0.063,0.595c0.503,0.167,0.986,0.071,1.462,0.037c1.698-0.126,3.396-0.269,5.093-0.401
                            		c0.728-0.057,1.456-0.104,2.184-0.167c0.38-0.034,0.617,0.103,0.662,0.494C76.46,39.47,76.606,40.792,76.761,42.175"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M26.598,41.41c-1.963-0.072-3.835-0.304-5.771-0.492
                            		c-0.026-0.243-0.068-0.453-0.068-0.664c-0.004-8.18-0.005-16.36-0.001-24.54c0-0.701,0.047-0.746,0.748-0.752
                            		c0.948-0.008,1.898-0.011,2.848,0.002c0.618,0.008,0.648,0.044,0.688,0.669c0.15,2.355,0.29,4.711,0.443,7.066
                            		c0.176,2.719,0.368,5.438,0.54,8.155c0.119,1.895,0.21,3.791,0.325,5.686c0.072,1.213,0.17,2.426,0.245,3.639
                            		C26.617,40.541,26.598,40.903,26.598,41.41"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M22.376,11.511V8.177c2.868-0.358,5.701-0.71,8.587-1.069
                            		c0.042,0.271,0.095,0.456,0.097,0.641c0.007,1.048,0.012,2.095,0.001,3.143c-0.007,0.632-0.059,0.695-0.652,0.697
                            		c-2.509,0.008-5.018,0.003-7.526-0.001C22.741,11.586,22.6,11.545,22.376,11.511"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#F16F2B" d="M79.846,0c0.323,1.708,0.623,3.294,0.94,4.962
                            		c-0.371,0.063-0.647,0.138-0.926,0.151c-2.136,0.101-4.273,0.183-6.41,0.293c-0.405,0.021-0.631-0.088-0.753-0.488
                            		c-0.238-0.785-0.511-1.561-0.795-2.415C74.552,1.668,77.137,0.854,79.846,0"/>
                            </g>
                            </svg>
                    </a>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="col-sm-10">
                        {!! Form::open(['url' => '/auth/login', 'class' => 'form-horizontal form-login']) !!}
                        <div class="row hidden-xs">
                            <div class="col-sm-4">
                                {!! Form::label('idioma', trans('global.lbl_language'), ['class' => 'titulo']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('email', trans('global.lbl_login'), ['class' => 'titulo']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                {!! Form::select('idioma', array('pt' => trans('global.lang_pt-br'), 'en' => trans('global.lang_en-us') )) !!}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                {!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('global.lbl_email') ]) !!}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                {!! Form::password("password", ['class' => 'form-control', "placeholder" => trans('global.lbl_password') ]) !!}
                                <span class="btn-submit">
                                    {!! Form::submit( trans('global.lbl_ok'), ['class' => 'btn-default btn loginbtn']) !!}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 hidden-xs">
                                &nbsp;
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <label class="rememberme" for="remember"><input type="checkbox" name="remember" id="remember">&#8192;{{ trans('global.lbl_login_keepme') }}</label>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <a href="{{ url('/password/email') }}">{{ trans('global.lbl_password_forgot') }}</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 welcome-content hidden-xs">
            <div class="container">
                <div class="col-sm-7 welcome-left hidden-xs">
                {{-- SVG do mapa WELCOME --}}
                    <div id="brasilwelcome">
                        <svg version="1.1" id="mapa-welcome" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        	 width="100%" height="100%" viewBox="0 0 355.389 373.08" enable-background="new 0 0 355.389 373.08"
                        	 xml:space="preserve">
                            <g opacity="0.8">
                            	<path fill="#FFFFFF" d="M108.928,173.171c-0.119-0.06-3.289-4.218-3.408-4.276c-2.84-1.426-3.635-1.066-5.674-3.021
                            		c-2.04-1.955-5.502-3.984-6.824-3.984c-0.574,0-1.896,0.133-3.332,0.133c-1.886,0-3.971-0.229-4.824-1.284
                            		c-1.511-1.87-4.615-3.455-5.597-5.854c-0.964-2.396-1.322-4.162-1.236-5.682c0.086-1.492-0.973-3.012-0.973-4.87
                            		c0-1.86,0.887-2.218,0.973-3.549c0.082-1.28,0.086-4.443-0.855-4.443c-0.037,0-0.076,0.005-0.117,0.016
                            		c-1.058,0.264-2.396,0.888-4.344,0.888c-1.953,0-6.38,1.5-7.975,2.396c-1.604,0.888-1.69,1.946-3.993,2.397
                            		c-2.304,0.436-3.37,2.126-4.428,2.568c-1.066,0.443-2.123,0.076-3.55,1.502c-1.416,1.425-2.737,2.927-4.428,2.927
                            		c-1.688,0-2.312-1.238-5.144-1.238c-2.231,0-5.448-0.116-7.196-0.116c-0.477,0-0.845,0.01-1.053,0.031
                            		c-0.974,0.085-1.861,0.708-3.106,0.794c-0.061,0.004-0.121,0.006-0.18,0.006c-1.158,0-2.033-0.758-1.953-1.433
                            		c0.103-0.715,1.194-12.557,0.555-12.573l-5.655,4.3l-8.608,0.537c0,0,0.248-5.204-6.135-5.646c-6.39-0.445-2.841-0.981-2.841-0.981
                            		s2.663-2.739-0.792-5.853c-3.464-3.104-3.814-6.286-5.154-8.053c-0.66-0.901-1.077-1.278-1.081-1.781v-0.013
                            		c0.004-0.494,0.405-1.115,1.363-2.472c1.953-2.748-0.282-5.316,2.389-5.947c2.662-0.613,3.455-2.559,3.012-3.098
                            		c-0.444-0.536-0.614-3.898,0.707-4.878c1.332-0.974,0.709-5.58,2.928-7.26c2.21-1.682,8.778-5.154,12.94-5.418
                            		c4.082-0.251,3.908-2.485,6.494-2.485c0.052,0,0.105,0.001,0.16,0.001c2.739,0.096,2.842,1.868,4.692,1.868
                            		c1.86,0,1.689-3.018,2.927-9.929c1.246-6.919,3.276-16.943,3.276-18.623c0-1.674-1.682-2.927-1.682-4.428
                            		c0-1.51-4.077-4.259-4.077-5.417c0-1.145,0.179-4.241,0.179-5.571c0-0.623,1.715-1.723,3.55-1.783
                            		c0.046-0.001,0.093-0.002,0.139-0.002c0.538,0,1.084,0.061,1.597,0.122c0.512,0.06,0.99,0.12,1.394,0.12
                            		c0.729,0,1.213-0.197,1.213-0.948c0,0,0.699-3.012-3.813-3.012c-2.22,0-2.577-0.265-2.476-1.776v-3.897h8.6
                            		c2.739,0,5.4-2.396,6.911-2.396c1.501,0,1.245,0.623,2.559,0.623s2.359-2.222,3.583-2.222c0.023,0,0.046,0.002,0.069,0.003
                            		c1.236,0.094,1.944,0.896,2.822,3.559c0.896,2.644-0.265,5.4,0.811,5.4c0.318,0,0.723-0.063,1.213-0.063
                            		c1.14,0,2.734,0.343,4.718,2.63c0.799,0.923,1.438,1.258,2,1.257c1.441,0,2.39-2.191,4.304-2.314
                            		c0.063-0.005,0.123-0.006,0.183-0.006c0.967,0,1.364,0.563,1.61,1.126c0.245,0.563,0.339,1.127,0.7,1.127
                            		c0.179,0,0.424-0.138,0.784-0.479c1.858-1.768,5.408-5.761,8.684-5.761c3.285,0,1.954-4.691,4.172-4.691
                            		c2.219,0,4.956-2.039,4.956-3.813c0-1.783-5.93,0.264-5.93-2.229c0-2.037-1.51-3.274-1.51-5.22c0-1.964-0.085-4.342-2.047-5.768
                            		c-1.944-1.424-3.533-3.275-2.56-3.275c0.956,0,6.995,2.303,8.676,2.303c0.561,0,1.27-0.068,2.033-0.068
                            		c1.523,0,3.26,0.276,4.443,1.937c0.434,0.604,0.813,0.845,1.144,0.845c1.026,0,1.582-2.307,1.781-3.242
                            		c0.265-1.245,4.429-1.51,6.731-1.688c2.271-0.177,5.412-3.371,7.537-3.371c0.03,0,0.061,0,0.09,0.003
                            		c0.033,0,0.065,0.001,0.098,0.001c2.1,0,4.165-2.669,4.423-3.014c0.271-0.354-1.456-3.364-0.235-3.372h0.012
                            		c0.014,0,0.029,0,0.045,0c0.215,0.015,0.499,0.018,0.828,0.018c0.094,0,0.19,0,0.293,0c0.101,0,0.205,0,0.311,0
                            		c1.723,0,4.047,0.054,4.251,1.042c0.265,1.33,1.06,5.861,1.416,6.389c0.367,0.531,3.454,3.455,2.133,5.666
                            		c-1.348,2.227-3.199,5.331-3.199,9.23s3.276,7.712,3.464,10.016c0.18,2.303,6.201,4.343,7.626,4.429
                            		c0.023,0.001,0.049,0.002,0.073,0.002c1.411,0,3.356-2.59,7.188-3.637c3.251-0.879,4.531-3.35,6.95-3.35
                            		c0.496,0,1.041,0.104,1.659,0.346c1.886,0.729,4.68,1.202,6.856,1.201c2.016,0,3.502-0.404,3.242-1.38
                            		c-0.527-2.039-1.235-4.086,0.889-4.086c1.764,0,5.105-1.455,7.109-1.455c0.419,0,0.78,0.064,1.055,0.217
                            		c1.597,0.879,3.634,3.626,5.588,3.626c1.944,0,5.136-1.767,6.552-1.767c0.892,0,3.262,0.984,5.401,0.984
                            		c1.263,0,2.445-0.342,3.198-1.427c2.048-2.935,3.548-7.892,4.879-10.28c1.322-2.396,3.813-8.079,5.759-8.079
                            		c1.953,0,3.199,5.238,3.199,7.626c0,2.398,3.806,12.149,4.606,13.13c0.802,0.973,4.615,3.362,5.588,3.626
                            		c0.98,0.265,1.236,4.087,0.709,5.503c-0.529,1.408-1.416,3.106-3.361,3.984c-1.963,0.887-6.568,4.786-6.824,6.21
                            		c-0.078,0.41,0.164,0.566,0.594,0.566c1.049,0,3.197-0.927,4.457-1.368c1.565-0.55,3.61-2.409,5.166-2.409
                            		c0.207,0,0.404,0.032,0.59,0.105c1.599,0.614,6.922,4.881,8.867,4.958c1.942,0.093,4.521,1.245,3.367,4.077
                            		c-1.15,2.85-4.529,7.89-5.945,8.25c-0.541,0.137-0.496,0.207-0.152,0.207c0.554,0,1.884-0.183,2.814-0.567
                            		c1.51-0.613,6.203-7.703,11.61-7.787c0.058-0.001,0.113-0.002,0.173-0.002c5.488,0,17.309,4.798,18.979,6.553
                            		c0.714,0.749,1.3,0.959,1.881,0.959c0.367,0,0.736-0.085,1.132-0.17c0.396-0.086,0.821-0.171,1.304-0.171
                            		c0.068,0,0.137,0.003,0.206,0.005c1.861,0.095,5.759,6.477,5.759,7.27c0,0.802-2.037,1.867-2.217,4.786
                            		c-0.046,0.774,0.124,1.078,0.44,1.078c0.878,0,2.876-2.362,4.438-3.467c1.024-0.729,2.817-1.459,5.385-1.459
                            		c2.75,0,6.389,0.837,10.927,3.403c3.084,1.745,5.991,2.308,8.579,2.308c2.354,0,4.439-0.466,6.151-0.933
                            		c1.711-0.466,3.047-0.933,3.896-0.933c0.022,0,0.049,0,0.073,0.002c2.575,0.085,13.571,6.653,17.472,10.382
                            		c3.907,3.72,9.751,9.572,18.452,10.366c8.676,0.803,9.753,5.331,9.932,7.285c0.179,1.946,4.427,11.781,3.011,19.238
                            		c-1.416,7.439-6.467,13.743-10.724,18.351c-4.258,4.606-8.25,8.163-10.109,10.996c-1.859,2.824-7.089,12.413-9.033,14.187
                            		c-1.438,1.294-2.729,2.266-3.415,2.266c-0.246,0-0.414-0.126-0.483-0.404c-0.234-0.884-1.487-1.827-2.313-1.827
                            		c-0.17,0-0.321,0.041-0.442,0.129c-0.699,0.537,0.98,2.841,1.075,3.106c0.076,0.264-2.175,1.604-2.234,3.463
                            		c-0.078,3.362-0.529,13.821-0.257,17.916c0.257,4.07,1.501,6.278,0.257,7.969c-1.237,1.688-2.561,6.041-2.476,9.4
                            		c0.095,3.369,0.104,6.383-1.501,8.507c-1.604,2.122-3.283,6.124-3.283,7.976c0,1.869,0.621,5.598-2.748,10.655
                            		c-3.37,5.042-1.331,4.686-3.54,6.909c-2.229,2.202-5.597,6.109-5.512,7.893c0.094,1.768,1.954,3.977-1.06,5.929
                            		c-3.018,1.946-2.303,0.614-4.35,2.748c-2.039,2.124-2.738,2.832-3.011,4.427c-0.217,1.268-0.586,1.311-1.734,1.311
                            		c-0.043,0-0.087,0-0.133,0c-0.047,0-0.096,0-0.146,0c-0.242,0-0.515,0.002-0.82,0.014c-2.039,0.102-8.334,0.367-10.987,0.367
                            		c-2.31,0-3.752-0.397-5.017-0.397c-0.194,0-0.384,0.008-0.572,0.03c-1.426,0.188-5.061-0.161-4.965,1.255
                            		c0.086,1.416-1.51,2.756-2.576,3.634s-3.104,1.766-3.104,3.199c0,0.421-0.094,0.566-0.295,0.566c-0.228,0-0.594-0.188-1.119-0.377
                            		c-0.526-0.188-1.211-0.373-2.075-0.373c-0.074,0-0.151,0-0.229,0.002c-2.663,0.088-5.495,3.276-9.042,4.703
                            		c-3.542,1.406-10.547,6.287-12.771,8.686c-2.211,2.389-4.344,3.54-4.259,5.492c0.095,1.955-0.264,2.492-0.264,6.383
                            		c0,3.898-0.351,2.926-0.351,4.871c0,1.953,0.699,5.689,0.699,5.689s0.633,5.399,0,6.996c-0.615,1.586-1.859,6.022-3.184,7.092
                            		c-1.329,1.072-9.664,13.125-11.618,16.76c-1.955,3.636-3.104,3.986-5.408,7.176c-2.256,3.131-3.75,4.891-4.725,4.891
                            		c-0.021,0-0.042,0-0.063-0.003c-0.98-0.091,2.833-3.989,3.635-5.937c0.778-1.926,1.131-5.961-0.273-5.961
                            		c-0.029,0-0.057,0.002-0.084,0.007c-1.501,0.187-3.275,3.897-4.967,6.481c-1.688,2.578-3.189,4.608-4.426,7.006
                            		c-1.256,2.396-2.227,3.72-2.143,5.322c0.014,0.238,0.135,0.342,0.331,0.342c1.123-0.002,4.735-3.322,5.267-3.635
                            		c0.037-0.021,0.066-0.033,0.086-0.033c0.289,0-1.396,2.258-3.106,4.213c-0.631,0.709-3.104,2.295-3.463,3.986
                            		c-0.358,1.688-3.361,8.163-4.787,9.75c-1.425,1.596-2.927,2.662-4.085,2.662c-1.152,0-1.059-2.843-1.059-4.352
                            		c0-1.473,1.726-4.43,3.221-4.43c0.021,0,0.041,0,0.063,0c0.471,0.028,0.907,0.063,1.299,0.063c0.86,0,1.5-0.179,1.799-1.035
                            		c0.445-1.245,0.445-4.077,0.537-5.853c0.02-0.363-0.037-0.516-0.145-0.516c-0.411,0-1.561,2.271-1.986,3.262
                            		c-0.343,0.819-1.688,1.282-3.053,1.282c-0.712,0-1.428-0.127-2.008-0.395c-1.672-0.802-1.852-5.408-5.665-7.099
                            		c-3.804-1.682-1.339-3.898-5.144-4.606s-5.324-2.654-7.089-4.078c-1.183-0.949-2.009-1.226-2.69-1.226
                            		c-0.343,0-0.648,0.07-0.944,0.16c-0.33,0.101-0.501,0.272-0.694,0.272c-0.326,0-0.719-0.495-2.053-2.672
                            		c-2.099-3.423-4.204-6.825-6.223-6.825c-0.024,0-0.049,0-0.074,0.002c-2.029,0.094-3.021,1.424-4.343,1.424
                            		c-1.338,0-3.634-0.803-3.634-0.803s13.472-15.604,15.689-18.359c2.218-2.746,11.092-10.015,13.83-10.554
                            		c2.746-0.536,6.833-3.36,6.737-7.088c-0.086-3.722-0.264-4.353-1.065-7.099c-0.771-2.697-1.903-4.789-3.034-4.789
                            		c-0.021,0-0.041,0.002-0.063,0.004c-0.723,0.059-2.243,0.744-3.171,0.744c-0.552,0-0.894-0.243-0.727-1.01
                            		c0.434-2.039,2.746-9.044,2.746-11.354c0-2.211-0.824-5.51-2.944-5.51c-0.081,0-0.162,0.006-0.246,0.016
                            		c-2.313,0.264-3.992,1.508-5.494,1.595c-0.026,0.001-0.053,0.003-0.079,0.003c-1.491,0-2.939-2.354-2.848-5.496
                            		c0.086-3.166-1.062-11.007-2.99-11.007c-0.01,0-0.019,0-0.029,0c-0.042,0.003-0.083,0.005-0.126,0.005
                            		c-1.934,0-4.324-2.471-5.377-2.471c-1.058,0-1.944,2.135-4.513,2.219c-0.058,0.002-0.115,0.004-0.174,0.004
                            		c-2.479,0-4.309-1.778-6.651-1.778c-2.396,0-2.312-2.302-2.218-3.378c0.094-1.059,1.407-4.957,1.237-7.354
                            		c-0.171-2.396-0.802-3.011-1.237-4.606c-0.444-1.594-0.887-3.188-0.357-4.172c0.527-0.98,0-3.098-0.266-3.098
                            		c-0.264,0-0.264-0.622,0.266-1.594c0.527-0.975,2.66-6.126,2.84-8.165c0.171-2.048,2.039-3.729,1.415-5.493
                            		c-0.615-1.754-0.798-6.92-3.141-6.92c-0.02,0-0.038,0-0.059,0.002c-0.063,0.001-0.127,0.002-0.192,0.002
                            		c-2.347,0-5.042-1.507-4.943-4.695c0.086-3.276,2.219-6.021,1.596-6.117c-0.205-0.032-2.144-0.043-4.64-0.043
                            		c-4.989,0-12.2,0.043-12.2,0.043s-0.716-0.265-0.632-3.105c0.103-2.83-0.794-5.844-1.5-6.295c-0.694-0.436-1.479-2.4-0.42-2.4
                            		c0.022,0,0.045,0.002,0.068,0.003c0.068,0.006,0.132,0.007,0.19,0.007c0.953,0,0.943-0.653,0.774-2.404
                            		c-0.18-1.86-1.416-3.361-1.321-5.05c0.084-1.68,0.356-4.164-0.982-4.615c-1.332-0.436-2.482-2.476-6.022-2.476
                            		c-0.315,0-0.625-0.012-0.934-0.033L108.928,173.171L108.928,173.171"/>
                            </g>
                            <path fill="#F16B21" d="M221.125,306.591c0,3.396-2.754,6.152-6.151,6.152s-6.152-2.756-6.152-6.152
                            	c0-3.398,2.755-6.152,6.152-6.152S221.125,303.192,221.125,306.591"/>
                            <circle fill="none" stroke="#D56A27" stroke-width="1.1718" stroke-miterlimit="10" cx="215.035" cy="306.653" r="9.143"/>
                            <path fill="#F16B21" d="M307.25,185.897c0,3.398-2.754,6.152-6.15,6.152c-3.397,0-6.152-2.754-6.152-6.152
                            	c0-3.396,2.755-6.151,6.152-6.151C304.496,179.746,307.25,182.501,307.25,185.897"/>
                            <circle fill="none" stroke="#D56A27" stroke-width="1.1718" stroke-miterlimit="10" cx="301.16" cy="185.961" r="9.143"/>
                            <path fill="#F16B21" d="M115.08,156.018c0,3.398-2.755,6.152-6.152,6.152c-3.397,0-6.151-2.754-6.151-6.152
                            	c0-3.397,2.754-6.151,6.151-6.151C112.325,149.867,115.08,152.62,115.08,156.018"/>
                            <circle fill="none" stroke="#D56A27" stroke-width="1.1718" stroke-miterlimit="10" cx="108.99" cy="156.08" r="9.143"/>
                            <line fill="none" stroke="#D76A27" stroke-width="1.1718" stroke-miterlimit="10" stroke-dasharray="1.8022,1.8022,1.8022,1.8022" x1="127.693" y1="153.175" x2="283.81" y2="175.394"/>
                            <line fill="none" stroke="#D76A27" stroke-width="1.1718" stroke-miterlimit="10" stroke-dasharray="1.7577,1.7577,1.7577,1.7577,1.7577,1.7577" x1="287.916" y1="194.396" x2="219.953" y2="292.823"/>
                            <line fill="none" stroke="#D76A27" stroke-width="1.1718" stroke-miterlimit="10" stroke-dasharray="1.7577,1.7577,1.7577,1.7577,1.7577,1.7577" x1="207.649" y1="293.409" x2="126.211" y2="162.17"/>
                            <image overflow="visible" width="1161" height="255" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABI8AAAECCAYAAAB34/ejAAAACXBIWXMAAC4jAAAuIwF4pT92AAAA
                                GXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAYZRJREFUeNrsvTF0HEXy+N93j/e+
                                ylCGMi8RyqwM/SLpIusi6yKLyCLCPAL7IpsIESEiRMBDRMgRcoQcIUe3RL91JqKfiFgyXbbO9I3+
                                /ymp2h4vu9qume6Znt3P5715wJ12d6a7qrqqprraOQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAMiJvzEEAAAAAGG8+uz9peIfveJaCfjzi+IavvvdH5eMHAAAAHSZdxgCAAAAgGAkafSkuO4H
                                /O3T4torriHDBgAAAF3m7wwBAAAAAAAAAABMg+QRAAAAAAAAAABMheQRAAAAAAAAAABMJWnPo1ef
                                vb9W/GO3uG4H/Lk0lXz67nd/nDItAADzR7EmbOqacMvwsefFdVSsDaPMn23bXffAWQ78iKx3R0gF
                                AAAAAHSB1A2zxYmWBNJGwN8Oi+sFUwIAMLcM9Z+bhs/IqaBnxdXP9aFeffa+NFDeKq7twI/I84wQ
                                BwAAAADoCmxbAwCARnj3uz+Gzp44kcrVtcwfbb24PjT8/cviGiARAAAAANAVSB4BAECTSNLkpeHv
                                pYJ1/dVn76/m+DDFfS256+RW6P0NZQze/e6PC0QBAAAAALoCySMAAGgSqTySBNKl4TMfuPDkTNPI
                                fUnyaCnw73/TMQAAAAAA6AzvMAQAAOnRCpUHxfW4uFYMH5VEw5fvfvfHyTyMQ/Ecl8VYyDOdu/Dt
                                aPJ3Un10Kp/P7JEsW9Zku16/eIazCfKx4t5UMC3p+FChBFVtzRO1NUuGj0pz+r1J8gkAAABA5REA
                                QANo0uOwuL5216dLhiIJhe0iIOzN0XD0i+tX42fWXGa9j0oJn9Bk4F+qjmQ7XnGJXPy/4vqluL4p
                                rq+K62f53+T/y3XLHmSLJDQ3HYkjAAAAiAjJIwCAhqiRQNpwthPKch8HqcCRIHVo+NiHGhTnFqRb
                                GmUPXKlR9qvP3pfE035xfeKuezuNs6z/377+LcCNFHIiMrPtwk659ZA4AgAAgJmQPAIAaJCKCaSe
                                u64+mqcEggSqvxn+XoLitVwqsCo0yr7q9eS33WnVkmxjvBvw2TvFtaOJAYCb2A6UKQ+JIwAAAAiC
                                nkcQEiBJsBayLUOqCYZaVQAAU9C+P4f6n6E9kHz10dmcjMFZMQZ9fa7QpMhtd52wGWbwCNZG2XLC
                                3KD035suvDpEfuOOfv4EDYIp63VP5aoX+BESRwAAxFIAwZA8glmIoZPGm/cD/lZ6mOy5634mAHAD
                                FRJIV9tRpNl08dl50TFffRSaRMmpcbZly9rQ/bX59aqznSBn/XtYPCxVRySOAACIpQBMsG0NAKAl
                                Kmxhk2TFpr7FmgfOnL2SqvXG2XUbZWuFSM/4s0vO1gAZFohCpjbddfIopIqPxBEAAACYIXkEANAi
                                xgSSJA+ksmBrTp796uh6Z0sg5dA421J1dPWMBOqQCk0mbwbKpGx9PEQeAQAAwArJIwCAljEmkKTi
                                ZXOOmidXaZy9qtU/bQXqlkbZb1UdKRfOdtoewE1IMlmSyksBuvZ1YW9OGTIAAACwQvIIACADjAkk
                                CRS35+S5hxrUWppDtll9ZG2UPXBvN8r2c31hfOZzvQBeo1sgt93srZyiY18WskfDdQAAAKgEySMA
                                gEwwJJAkYNzM5dj6CPTddZPIUK4SOC31frJsWZOAfTClubf1mcdPawMQpOroToAckjgCAACAWpA8
                                AgDICEMCaW6qj9x1RY0EuKEnqFm3jkWhQqPsqQkf7Tlz7MKqieRvT7RKC8DLo8ji1gx5JHEEAAAA
                                USB5BACQGYEJJOn9s1UEkOtz8rwDl3/jbEvV0dBdVx3dlACUgP7LGc8t4/I5wT+U0ao7SR7fVHVE
                                4ggAAACiQfIIACBDAhNIG+76lKV5QJIkLw1/f1UF1HDj7FVXr1H2X+a4uKT66J/F9VFxPXXX29nk
                                kv/94+L6Fw2OYQKi95I4mrZ1k8QRAAAAROUdhgAAIE80gXSg17w/6+jVZ+9LwDt01z2dQvDVR8kD
                                ZN0itO7CGmVLI+x+6HHoWp10rBdAiMxIQpGkIgAAADQGlUcAAJAL1uqjJhtnS/LoduDfzqw6AgAA
                                AADoEiSPAAAgC9797g9pHi0JpNAj7BtpnP3qs/eX9Xd6gR8ZOE5GAwAAAIA5guQRAADkhFTs/Gb4
                                e6kGWkt8T5ZG2XL/A91yCAAAAAAwF5A8AgCAnLBW7fTc9da15YT3tObCE1QvHVVHAAAAADBnkDwC
                                AIBs0IodSb5Yegb5xtnRMTbKHrrrqqMLZhIAAAAA5gmSRwAAkBvWrWuWyiArNMoGAAAAgIXnHYag
                                W7z67P2e+2vT1uG73/0xXJDnl60pq+5Nk9xbxTW+XUWa7f5ZXOcayJ3LMeBzPi4yFlvuugJjVWWk
                                PC4XOh6/F1ffXR8jftGw3K7rffl5G8fPmcjyYFFkemycVnSM/LU0JtdDP0bz3FNH5r4YC6k+ulNc
                                KwEfkXFalyqh4rNnke1NaKPskeoVyaO09r+sH2UbdzmmHyNsxfzbCtaf5L7mJJ/Ty9ewaV0r2YC1
                                0r1Nm09/j2ddsQl6cmhvbN271Pu/QJcataOXY3J+MUf6TSw1WfdkLDYDYqnfNJYaLGIsRfKoG0mB
                                bQ2i1iYot/+7SxWWX4vrVAVmNCdj0NMxuHvTGNwU1BXfIYbvWXGdzMsCoMZfxuUTHZebttWs6LWp
                                f39RfF7G41BPuEphhNdK87Za4TvE4L0ormM3pw2Ix8bpjo5TyPaoC02uPBd9n9NtUvJ8L1V+QvCN
                                s2MmbyyNsqk6SqMjXj82DPbf2/znavOH2Iq5thWTxkp0d0fHqlfhO869/Ihez3sCrvQCakPHbiXw
                                o5c6Vsl8z1A/ONAmvFCbcN41vS7+dqRrjB/r5HIZSZey8eU0WbRZkvWe8Tn82Pe7ZksjxVIDjaVO
                                5zCWeuhmV7CXYyn5e3nR+bT451EKPyNX/ftb4gmRwd1TBZ2FPNyXxUMdjX2HfP6LgM+LQu8Vn++3
                                dP9y73sxPltymB+pkldZKGVh/EGEZZaCq0GR37/fgJ5OnOcbgoY6YzDR+KlDeNDVCgE1JrLwPXb1
                                +7zIfHyrhm8U4d4sCS0LZ3qfJ/OQFDUuViFz+JfFq64NymScnqj9D5Wjb3UdGLXw+1/rb18avn9X
                                v78XMMfP9e/uGh7hB72ni4RyvKdyHMpzvaezGd+7pXZkvaYdmWjzjeveU73nYd3PYis6Y1dfJ0d0
                                /flhXtafsUB6W+U41nrtbdVRHR9L51Lk8oHK5VLER7/UmOFQkwCjivdosd9v+b3qx22qj1vl+S7H
                                /KLLDuhSK75caT25r+tJjHhipAH5oQ/IjXa067HUher5IbHU65j7a425L+dd/6g8ylOYd1WYezW+
                                St5efFNc94rvFIE+7cqbM3XMH6mhj32C0rJ+713NFh906a20OnsPNKhaifCVMtZfibwU371fI8Dx
                                jtCTRAunGM8f5bm7Js8NLAg9dWDvdHlsbljozgwLu2+cfRphriyNss9c+jeqZ+owbhjsoh+Pk0T3
                                ZO01dePWvggB1U02f6P4/miJcmzF3AYB4/g3v3LtyjqpMnzZ4fHqqZ95v6afOU3GRGbvF79jflGX
                                eC7Lc3pHr0HTuqB+3CP145ZryqXYhh313waZ61KjvlzCANyvK/c0IfNr8VsHCxZLraj8+ljqsIOx
                                VF0dHI+5v3fXJ//uV31h1xX9o2F2fsK8r0mfWAv6ugr0AxXK3MdAlOYnNfYpj95e1t/4qfjN7Y6M
                                zYomZx5HShyVnRAxoAcaMFe5rz2dt9RvXNb1dw50YeySfsvYHvoFJtHYdEbXA/Fb11IlM2Z9V2ij
                                7Jd6r6npu+s35pZn2FQnOlXy6Lbh73/VZ5jm6O6rft9xcSsNfFArifI9tVnYijmwFSo3Byo364l/
                                bkN/J3sZmhZMF5e8fPrFhVXM1PWx7utavRl4f6sq903M5bhPcai/35RuP47k4y5pAuN78WUj+Jh7
                                GlyuNzDu8jv7sX05sWk6Fr/ob6wlfA6fiJS4bTsTPZfnl21OPzcQS62oLP+k8VtXYu0nCcZmSb/z
                                sGYslb3+kTzKT5g/SeA0e+XO1lFUY/eoIaXpnBOdWD48d9UpXjPcV2xHKNRAf6IGer0Duu0XcpHt
                                ewnn7y1dT/w7jaAVIpKUOTfIxlrdIMDYKHvoGmqaqG/wJfliqZxJchKd6v6mQe+nVh2pHh824Oh6
                                2/HExU3AYyvaGS+RwYPE6+KkpMjjqgFCy2N1qEHuaqZyL0mc+y3I45L+7s+yFS2VL6hzsOdsW48t
                                dv6Lqgmklnw5/xL3IJYulV5CNB1LLOVgR1V2H6ieN2mfrpIREscRS3UmlqqsfySP8qAJYfaO4m6O
                                DrMau9gVNWYnOkejp/e000AwYTJ6iR2hEORtT+23bXO4kHt5FnvyP3NgHyXZ8Jvh729HGOucG2X3
                                na36SJ5jM4Fti1J1pPr7vepzU06+6MajBp00bEX88drWALGt9cccIGQwVk34EF0JdichSTWpTnyU
                                oFqzCX9JfuOxtQIkA1/OV05t1ZSlpl5C5JwY2VcZJpaabGskBm4iQd2lWEp+d9/yMp7kUR7cd828
                                ORPF3gktIW7YcWgrcdQFoycKvd3g+NxROVnO2NiVnaVHOcl0JrItv7eVgTNeGz0VR6qPQqttJABY
                                r+n8h1br3NjDJ9F4WKuPyr0xYjqp/rhYV3WcNKj9ogU59Vs97mArumcr1Ml9kME9Z51AKlV0f5/j
                                /Ja2aXzh8qkEXNH7ibk18XV/mIb8xZ3QrSgZ+XLr6n+vVZSlpl9CLHJipKux1KaL2zQ8JJba6oj+
                                yb0+CdU/kkd50GS5o+zZ307YA8OKVNQ8zMRxyK46q9Q8baOhn5QgT5rKHkxrKltq2n03k2GSsXmU
                                oQPvT51bWQC7kprGeh8ZG2U3XXXk6Tt79VHMEn5LZZZzE6qONOH7qMWgNif9wFaE6+eqyk0uQeJd
                                XX96mY1TLi/mbrq/HZemmW8MfZD7irWFrWn9uusC+u+UGirfzUiXnli3nbf4EiIndl0+FVcrei87
                                Gdkbf+JeU1sZfSx1NI/6x2lri4kE2+K4n7SszJtq8Ko6XUMNSoala0W/b1Wf0/rd8nk5JWT47nd/
                                nGYwV9Yg+FLHwQfat3UMQhYU6dki3fcPp3XfL73duFfDoPptSH7ORqU5u+2qHaUqgcSwzikHCWT7
                                gavXW2JUGqM/1fm8pWPVc/OTGArBn7oWGjD6rWv9ijoXuh1r4JpplP0WUsFTyFjfhZ+8dnXstXym
                                bpWU2gBLJdNfqo5Kpz3VSYpfjumH66J+YCvMAcBuDWe7vP6c63i5sfVnrcL6c6+0/lxmME5ZJ46U
                                WC8OvdxfqOyvjMl+VXw/EJGZw46pykx7n9iXW6uhS3dLujQKkPWFTxzpdr/7NXTJx1LnJV2qG0td
                                rfEaS/UzGKaqsZTXn1VDLDXUWOqo4VjqMsJaFqR/JI+6wYUKxu8qMLdceDPXaUrkF5aRfr/skz2a
                                kkzZDQzaRJCfupvfxF+qYK6o87BRQWGe62J+dpOjpsp5ta1JFSLUgfZlv+cZHD1pCWTP1WAdl8dF
                                He7NUrC2PGXuviw+NyuhuKXGzmqQ5Pt/KK6TWckdlQ3/Jj7U2C/pfZ237ejVkG2v689VF89uWHj8
                                GN3XMZrrRJKMQ/HMA5WjEJkQ+ZSta6u67c0SnIbaVrmXQYvBoq/GCk2o+eqjswg2yeKEvVV1VNNp
                                Gun3HWlCanTDPPqkzEau+oGtMLPtqvXtEZn/Vtef0Yw56Tn7Mfbl9ec4g3GqG0yWX0KdlRID3rb6
                                AOVD/eeSUe69P9KreG9nKvsnN9l3lX0/FusV5KbJl4lDlR+fCP9Ax7bqHPqXxGc3yMjdirrUlC93
                                NOP711SO1mqO+3jixN+HNRCXsTmY8ncpY6ltZ6+o8bHUwawXSrpmb2osZVlPN0oJpLZjqVXVqVAZ
                                /1pl/NLoVww0lpplL+qsZRb921H9W42pfySP8uVSDdrhNCdZS8se6ESvVFCk1VLwc+4mnGikjlRo
                                E7tX6sT2A5yHUCM6HoTshWax9bkG+luiqI8Ni8zd0kLQJiuBcyvP+mw8caTjILIjSaET7RXxxL19
                                FPZzHddZC0hPx9GyUF+ooTsMrQjSv5OTbE71XkP3cF85ipJkaLIHzZRF4W4FfZf52w9JdpTG6Ni9
                                eYO76uYbnywJlT/v8J0bfsOyHeula6HqaDx5ZXDmVjShdlrTkbOM0aReR5tj9ie6/fc2T23IptqR
                                jQxlGlsRnnDo6VxaEg4XmjQ6DKli0PES3djT8XpicPBlTKUlwJklYZ1gnOoE1EOVraPQZ7AmJ2sm
                                TAca1J2GJO1V9o90LqvagZQvE298GVrjBajTBMaqjPe479UBX65X0qWzG+SoavuE4JfQExIHu276
                                S9jRDfebUyz1QtfSQeA8yvicarXzjsZSoWvIHdXbwxZtok8EhsZSz8cTRxNiqbI9WSp9bj8wltoy
                                rsNV9U9OUjuJrX/0PMoTmfAvRUmlEmSa0yOLe3HJovKps79N/qAtB7KiEyhK+ahK+aMYgOI61jEN
                                HSdf9ttaKayOU88gM8NZi6AuFjslmRHH+kFgsmXT6Hj5bXCVtpKpo/ZEvyO0OfDMBnUNOO5bzpbM
                                lbH5XOfh3DhG4qzIovyR6sjcojJ05t68GQwJ5qyNs0OrakQ2B21ukVRd7ztbLyj/NrqqfK8627bS
                                8aqjKn0HLtVO7Vjtv9r+U3X4f9DvyiUZgq2wYV1/xFb8293Qv2/GeJ3r+mORm7bXn2Vd363BpF+r
                                /1E89xOLbIkNVLn6R3H9y83uxbZV4f4udR4+Up/4sqId2FFbYrUDQT2EjJypHya6PLGCVe97oPbr
                                c8PaV14DVzPx5faMujRrraqTeBc535027jfYT5G9bZX1Z22vJxViKa9HD0ITRxPk8UhlMTSW8i91
                                29xWGPoS3vt25wGxVF9l8FNNjn2rMWqusVRU/SN5lB9DTXIcGN6UnRgTI87V3w/epBMYVBkTOE6i
                                gOcxlCcz/nRv+jeELgD/R5zjEGNk3M5TNnaHdbb1qA6IY/o00OgtacJgrSOyfeVAFs95UHOcznRx
                                mOsEkrM3zp7mPE8L5nNvlD1pPPoGh0D0d63GgQkxqo6sTtPnoXYqsvOErciECkHSha4ZJzXHym/p
                                fxr4kdfbZVsaqipbkbxcPalTWVNK0EhA9e9J/kiN6rGv1Qcc1hkcnc8nFRIxsV8mit3+XF5qBlZQ
                                Xaof9LXxvm+Nj3WFkzJj+XJel0Jt8NQx16qPHWdLvA9VLncjxBLy+d3i+rhlP8C6hrzQeayrR9ZY
                                KvaBHSn5b6iOlWKpf6h9ComlqqxlWekfyaP8GOnEHlV4s3Kin7UsLL2mTwipkIS46iEQcRuSjNMz
                                g/KsRjyuNSXvGRdSb/hC5cy6SD13E7bQ1TB6UjkWerpUKwuVGtlNF16V4QOcKL0UFiGBpM84MCQA
                                LLIQ2l9s4rHzLY1HY9VHFWz3pKqjTRe+VWLqVtyGEgHYinywJC0vdayOWlp/brsWmvdW3Aoh8/9x
                                QK9Dy3hJhYZs9/dv5Ov4Ed4GHMaq8iwlYqyJ5FgvE8Wn/dbaQ0nv+8iFv0hzbvJLYutJmbF9uRPD
                                evUXXSr137E8w1UVolTIxepRWNrR8LFroQqpwno8UD1qI5aS2GStI7HUu87Y09UYS1n62Latf1N3
                                KJE8you6QtJ3tuOb2zie19ps9UUsh7m0AJ/o92brCFag59JWkgVXcOhCfRpzS4+W2J66sO1rskCt
                                1qiuqCPboYtC1ABnLCg8drY+P13DUn20rE5LL6IjlkvVUXk8+gbn1R+YYNWPulVHVYKWw8h25EID
                                sBctzxm2IjxI8n1fQtefl7r+jFrSsVW1OU37VtbEjOjAfqokuCZHPlV/q0rFi9Pg9CD29uBSIuaZ
                                4WMxqsp8Muyk4n2PVA4tc7Y0Jott+3J9ff4Q/eypL7c0to5sGmKXq4NkYiZIJ9hRaR/SdFWrNaH+
                                wlU7ffYmHeq7GonARYulKqxlbevf1LWM5FE+iJCc1CwbPlcnJ9RpsuwDjZmEsHS870d2Av1ichZo
                                6FMnZWIhyn1Xj+yMbfBWne2Unl9jLlIVkwaNzluFt0ApAhyP5Y1QV22lxXkOcVosjtjAtdsou64T
                                55MXawb5XtIxWqthAyxBy1D14zzBeA1UR1rpV4WtqOQzWAL26PrpD98w2J2m1x9rYubqJJ0qfU8q
                                BNaHOnbWN+7ymeNUpzTp954Y15K6vUJfuJpbKZ196/ZrP7+jvty4/ltfYjx1FZN1Blm6UDk/cc1h
                                TQKmOBnWklTvSiwl6/O2bo2MTc/ZTqfMNpYieZQPsd5mTzw1LQfUabYcPZrkNCM1oGeB4yT32mvh
                                LaJ3biyOkyyqXxX3GruxoxiOW4F/K4voeaJAx5I0uNXwQmVZyH2wP0gkN1WSCZ1BZWtgsHNXvYxm
                                6HBoMiWVE9akE+fU+d402DVL0PGXqiMNblddxUbbCTh17VUfYSvSrT8p9fNM/TRTwN4Q1kq25y5i
                                RfcsGdP5sMr9i8Q2wDl7tb41kTn+TKF+56z179xVS35bXt6eqy6l8OUsccrrlgzGvoTORdzyY5Dz
                                pmKpnmE9TVItXSGWamvb2oVRXzY0lor9Mr6L+jcxlnqHnE0WiHCcRXrDIgry34ydwJ5hTM4TnmYk
                                ivN7YMAoBu9JYUjuN5SQ+LJ47r0xoxdqdOV5ftQE0kGkknTLvCXb0iMLVfFcw8DxWHbGfctzEuCU
                                f+PM5Xk8eaxkyUuDI++TQ4MJjpjFIU2S0I6kGxIIbQbOebl8OvbpIJMSPxYbcqH6MUw4XkM5htZd
                                NxduensrtiLd+hN8cEQFmbmQ49rVN5klMzm/vEhV0R0z2D13gUeo103EqN3cCPQFxW7KNqpeBfsU
                                85msfmGVAD6lLo1Ul0KeoXzPluB7qHI+dPNHTrHUUGUlRH/kRbzENo3GUuofXQTabo/4hD8Vn3ve
                                Uiz1u0tUCFJD/15D8igPYlYLjVz4trWmEQF8z/D3mwn71iwbFiG577YqDfzbzhXjs4lxlm1s8vbu
                                yNXLYFscDpnfnRTb50rOQ2wj3fRinrxnjnFx6BwVgn/fOHtS4if0rf1Q9egi02Hx1UcfurBEmG8A
                                ezYj8OvpGIWM87Rm4paESVMJOr/uNt1cH1uRLung15/tRLcUum2zsZcXFar62kiAW9fjJu/R+1hr
                                xmexJiViBoNiZ1913JcLrWQty05WtpNY6rWtu2X42+WWxqzKej8eSx26ii9ztMp7xfD8Mqa7xedG
                                LesfyaOMiZnhzz15tGJQ2rt6tU0bjcXLjs1AAz3rPcgY3tPrrDBC/ujiYFnTwNHi9FkboqdkWRbM
                                1G9YdVFYduFbes4bSkD46rq5Sx6VkiUSZNwJ1IW18TfGHW+UPZ4EsFYf+aNYZ50cZ9kSM227mcX2
                                D12iN95T9KOx5BG2olJgYgk21l0eR0I3GSRZdEtkathk1VGF8WhS7v2LCJH/y0C9rFpVFtOumf38
                                jvtyS6X7tzTKnteDQ7oaS7WZPPL+4nrF+64VSzn7tr1c9G9i/EvPozy4dJEqW9QpyDV51KbhqMMt
                                F55Zjx4Qujg9KcQIfVNc/7cwfIe6VWfeaUrecgyMm/6tNvCJ1VDbOalxdmjzzWkVNblh7X10YzNx
                                Ta5tBjoxN41RqC42FtxW6CmHrWgea8Cb1frT0ImfliqEtua5Z/Ch2rhHy29WfZkYsydOFT+/q/63
                                l/E1g+280HVkXg8NabN/UB3ec7aKqZjrveiLNDT/teZXVY2luqx/vfETi0ke5cFwTvflzpPytIYe
                                rXgUyaGSBeeT4vpPYQyOAgxfl533NivGpvFf19ApTy0Fx03qhbUB6aRjR0Pf7nSiBL5Csll0e3Pc
                                MagwPs5NqTrS8Q7VwwvX7CloTf8etmJxyPHlxSuX78vFxuV+zA78N8F4v/bxM9Cvrvvf1uq1kZtf
                                cvRts79vjaWOI9kXayw1V/EvySOANM5CbMTgfRvRqfJ7eX8pjN7+DcEj8xYWgIeOX87BahexHDla
                                bhJtbZQd/fjvxGMiTpLl5LVppdwxKrMseth04Bit6hdbkSzY+B/MXDRySGLkKPfoWv6+XM9gC/7L
                                fGZrz9tOeh0V19cJYqmfpRn4osRSJI8AOmDw9BjQg+JfP3VxKyDEIDx216cKbBuO7oZuMNdOsfbF
                                GBgConKiJLSXTxMnXkW1Fc5ekbU+vsXGmFyb1usod+b9DXXXbUVXt2c411zVblO/M8/z2HQSGew+
                                eM/Nb//GYCr0rsIO/NU/ksbX/44cS8mcfKGx1NYc6t9bfiDJI8DgdStYlj27HxXX08jOjgSJ3xfX
                                AxJIc8UiOMX+tJxQ50W2rl1tYQu0SW2cTlSXvrPt7fcnr5UJTa51pR/UtHt/hZkggIZmgw8AgJbi
                                KHkZf5wwlvqx8DEfjcVS4mvempcxJHkE0D3DJxUFD9TwxQxqJbD+qriezEkC6T3Hm6q57zOmSYu+
                                C68g+VD1J6SXz9BdVx1ddGxMRjomoQmdqyojr/d6/Pe6C0uudbXqyNu89xwshK2A1mBbGNThfxzb
                                VyFdLPWxS7OjY25fxr+D+ECGzsNIA5KzBR2rmYGYll6e6NHc28X10MU51lEM3Sc6V4fGz57pvOWy
                                DeTqyN8GfifnN/aLEhD66qOQI+pXdXEPWdQ70Sj7BjuyabAL/pjzvpu/U+husndNOnfYirQ2IKf1
                                Z+ia6S/kZWopQ3nvgty3OS7oUrgv12NaKo1bbrHUqLTe5BJLHRex1GnkWMonkPw2OVkL/gyU4xz1
                                7617mafkUYoqA5o1RkIUtFDOS4OgnhSfOWLkZo6rjJV0+j9Rw/eJGr46jpDo0U7xndbEiwTaBwty
                                cmAZS2K0sQDNeMrVPDi7coUkj5YC14pOJ0bENmhyeSPQGZJkkZy8Js+7HviZmVVHYg+K7wy1Ce82
                                nMBoWkewFdXGK8ThXvT1J2SMfM+R84yfx9/jsIXfhEx1SfvIfBgo57fcnCabjOspsVT7sdS2+lRz
                                FUvN07a1FM4PC0o7UD5fwfDpAvGP4vpncT1z9bLWN53AhL5Up8mtdAszHxW2aYUu4F2vfpQxCe19
                                5E+j23FhiaMUybWmZTZnHcFWXL+1/d8WfUDWnzhYkqZt3KNl++oiNNnP0R5YbAExBDaxy7FU9vI7
                                T8mjFMYOxWvHgRClWaFxcyXDJ43gJKDbUeP3tKLhW1KDJ3MxzNwxbXvMh4Yx6rnm3og1+Vs5YGmc
                                HcLAda9R9l8cIWdLqkmV0mMXtmXN0usoVEeujmRuwva3cYgDtqJSwBhasbyoLy8siZm2xsjSmL4N
                                WbT8ZleTRxY5aboCNPa4L+s6Mq8JpNCx4IVu+7HUcimWyjmBbmLeKo+WIzudKF57jmBjDoTIjDSI
                                nbeFRioCimvXXWfPnzt7z4FbKv9ZOu86Z7nop2UxX21I1qS3zwcLtNhLUH4WybGX7xnofviu03fh
                                1UfLaneXA+TdUnVkcfybsv1t6Qe2Ik3A2+hWlYzWH0tiZlllaiXjeWz0HvV3ei78RbH0LRnOccKh
                                Uf/boEvWpuuNPkPOc6kvSpqYx2Wdy7l68V+Kpf5VXC8aiKVy1L+3SJ086rnwo+mmJRYsBiPagOtA
                                kjiKy1AX3hA+UIe2CSSz/B93vd91fd4GvTB6Uj0hJwp8bVx8l1UnLW81Gwl2VD/3iuv/Fv/+JAMn
                                fmhwKFdTy7bOweoC2jBLouQmXrqOVx2V9D/Flj7rCWtiQ/4b+Le3XZyGla3rIbai0aRDT9efpqrW
                                9nX9edTyiyeLPDWpX2UblPM9hh4OUDWJkcs6YK1Qa8qXC9Ilvf+hIQCvsl2IWKoe2xpLHc9pLCU+
                                z25xfetsLyl94mjYVf0bJ6fKo/9OMWyWapWYb556hu+yLoyLitVpXkvtCBbfL7+zpb93t7h+yiQZ
                                kcJxOHDXpZfW7Ldl3tYacvpkzu7o/X2li9VmRxbzJpwaGYuNBbQx55okuaw5lwPVmXlBnJ5fI31X
                                lV5H5y68Sa/Y4vWUjlPx3WuqI8vYinxthVb+DQ1BbxPJNvFJdtRf8OtPay+eKgTVa6pfTVcHWGxA
                                I/eo3x96OMDr59AjvufdB2/Dl/vGXZ8ivBnh/ldUhnpu/rAkAhuZR11Tt4mlpsriyhzo32uaqDwK
                                VdxpZXgWJYnpOMik3Q7829yPIc1F6SyK45u3JnMEx5zAssz6ZMTWPJVfagWCHEf5soLT97sh2NlM
                                OW5q2HbHbIsEPz8X/99BS86CxTFe1jFaSzQ+fo/16gLaGLHDZ67eaULz0Ch7ku73Iz2XterI//7Q
                                hb+t29CkxjwmTLAV6QLe1HLjZeeue5N4XNL/lvVnr6VgySJTSxosbDZxY6UtERY/oql79IFTinHO
                                VZcsiesmfLkd93bV44YmHvYn+HIWGXI6t1sNyXmvQd/TGkutp1pDSuvIzpgulWOpTTdHaALp1OBP
                                +f7JFv1LXn1ZQf9e8/eEN2Xd9jUtSWTdz71WV4ErlHFPq5qCeouvGKLthIuXKM19N3mv+5UCFdf+
                                nL25sCw6VR3TTZfobbnalZ0pgZ/o7UM1fNtNJv4qJC1SyvaWBjOL2nC+76pX2aQ4QWwexiXG+Fga
                                movTtJUiENcKkS3XUkNYbEVSuVlWuUm1/ohfuDtlfRNZ/cJdJ5G2G37xZD0sQO5/J6Vvo70kH7nr
                                t/Srzl4VmvQe9Xu3jQFa118s5OTL9VSXNqbo0uMJvpw1ebeiMpQ0eSH36K6rNhpJklRYQzbULrYV
                                S7X5YjelLv2eUP+Wdd3fzEj/XvP3gB9Yqihw1iqgiynbBKzBbow3T9a3EVUC8kXF+vbprkvw5kCN
                                vSQaejOU96Eavp22q5BUF3eL6ye9/yqY9+tr1cC54XMbumCvRH5++b4nukjNcjol8Xeozn6usn1P
                                ndeYY+SPWl9dVAOj8npW0SbPXdXR2Lj0az6fuepoLMC1/Lbox25Muzsj+eywFVnK7YWOl6VqbTv2
                                tkeVnQfu7UrlaevPj67BF08VDwsQmXqUKEErzy1Jo680EKlaFSr3+CDBXC5p4HTP8DEZ20GHt6xV
                                1aVUvtyjgPF/y5dTGRoY15ENlfO1BHIuVXV7xb9+7xruI2ZcQ5bVbm0mGANZlz5xNxdbtPZiN2Es
                                ZeFqd1IF/ftQ17I29U/WsoPxWOrvAc7FkX6wZ5kYFdIPDUpwfoOxGzpbn5bNqou2DtC2waGS+zrX
                                xRtmL15navwt+/N3Yxp+NRZfGIz9mipRawav5Ix9rw7/FxWNnqUisJxokjmzbHeLGviVEkefBM7D
                                ktqftYZlu29YGMTGPI61eOkYiUN8B0tjltfy5wZzPC5911JVVoXklXc4H8SwI6WA8b5rudIGW2HG
                                UlmzpHPc5vqzrOvPasa6vaTPE60viQZl2xrwTxqrKvd4P2YCSWXigWEuPXUS511eG+9qAikXX67K
                                GibPsBc5jtjU+Pixa+ewgSqVfA9ajqXWNTfQZiwlNvmwFEvtptzSVzOW8i+OdnJby/4e4Fzc1R85
                                MAywtRT6d3fz2whrqWKlNyoaoD9ys98s1bk3qLZ41Tb86tjsGI2ddxpONPhp2tBNc8bWKiaQLEcy
                                v+5DViHp5wO/2ifRVDB2Tu/zubvel5xzcF51HictiPsVHOK5RN8OD5ztTfyVjOvbzXkdl5GOS5U1
                                K0bwZNUPXz5dK4FUsiEPXUvb1bAVtX2GvrM1KK0tNyW/cK/C+vOiyWRDhYSkD05EJ2r1eFQ/Rfz+
                                E/VV1m+wP6fOlqD32wH3I7Sk8Ke0fmEM+OdpO7PVl4upS1V9uWcqW3UqaH0T51qJSIlDikuSRj+7
                                6+R7KzZU/ZQ+sZQ5lpJKmvILJBmTHyusq5a+yOWezm3qX9W17C+x1N+nDbL7a2beK97Utzk1BGpW
                                AsaabPBvVA5D9r6XFr6jCg7V3G5zyMgRLCt4pQxsadH6xiibki0+1iMamzZ23tH5cYozJs/xTejx
                                ivp9W4bnl8Zuw5qBn9iCg6rbx/TtzrE6uJZ5f6Hz1ugiVdGBl/n4Xk+mWK44Rocug4qKDJ1kSx+Q
                                l26+q46qrqfRgqeKjr/Yka+csQJ6QrKkrTfE2Ip2AqVaSYeAKpqbkGD3qIVE9Ik6+lY2NBg+0W0l
                                y4FjJNt2JFb4jyGY7uv6bBkb79NX2vZS8vGP1Q5Ydee5T150nRq6VNkG1/Tlnqsvd1lThoRVjQF+
                                0STSSuC9L6vcnais33d5vISoGkt9X3X7WCkBYY2lhmoT24ileuoDzIqlghI0FWKp132RW9a/KjmO
                                Sfrn3glMHJUVTwZfyqd/VcEVgejpIPrSQsuNzXzbK1vXit8buDfHyYUuNqIkG/rZF6Uk1YV+z6re
                                750K9+2Voc+WNfviVczJqSqxpWx+TeVPEpgHOvaXAUru9+Ras+3y3U91wWva2G2qgZ7Vm6OnRmXr
                                pjHRAEqSZ/cMcj4sJ4+K7x3ovH1oWDh92bno4VNdPIYBzy9z5asArYv0mf5OW0ndE5W1+4bP+MXh
                                XvHsP7jrtzMXNznD+hsPKo7RIuC3oG0EyvrgpjGfI/s7LOSnr+MSup7G3LJx6t6cpLlksCNiw+8U
                                9+4D8/OApNGu2rxeptOBrbAHSh8a5MZXwG6EjFWk8fo1dJ1LpNsiU1VO6vEnnMklPresn35XwFD9
                                oZWS7/yh/vuS8R7F/zvW77hnvEffA+dM7cDJTeNcCvLuu+qtBwYaPM2Nny8BfElOLL6ct8FBvlwE
                                XRpMsvXyEkLvf83Zt94uqSzI9VXxPfLdv5XkfKT36eX8tv5zOcN5vNS1fNPZ+vj5XjbPi8/Ly4Sz
                                BmKp19VjGcdSkhDbnhFLrWksVWeH0kD9oE7q38TkUcnQ3pSR9c2wP4kwt6FOqVcQqxO4rM+U4rjG
                                edkD3YbRG6gD8YFxTssOzvlYErM85965WXfV3zaLsTtsunqlwj7iSWNyUfr/bus4WAzHhS4oFxGC
                                HW+Y5ZkeqlP6UpM8F2N/s+7e7K+t4ujJ9/1Q3PdJi7I9LMm29aSSq8oCdWp85cxowlhuuHwD4pwc
                                K99cc5YuLVoFqWU9jbplo2bwKPf7WO3IudqRiwnJlTo2BFuRrz5XlZvyWA3UdxtvXOrXnw1XvVfR
                                ufoMbfqFp/os1hOPx3Uold98ta1Yt/7cqiD35eBfqgWG6v+JHfhT7/1WKdFVxwbIdz4t7vfUzR8x
                                fLlZulTXl5s69hpDeBmqqq/LJVnqql3sl9aQFeOz39drViy1USGGKCPJjoMWYim/E2rVYFtix1JD
                                jaVGU9ayXPVvqLHURP17Z2ygxZl85JprMnumTukoQEHqOFkpmLu3ES0tXiLYDysKd8wk5jjP1dgN
                                W5KtXysqvfWUw2lM3MKjenhUCkqqLNabLs2RpmLkv3bXpZltL+inWl7aq+jApxynRcIH1WtNJUc6
                                4nBaqo+ivySpGTx6R27NNX/CDbai3bGqKzcpXyZevbhwLW9vKgUmPZdxXyuV+yVnb3MxKZjqJZrP
                                LPyJhGtAXV8upS6FjP2Je9MTZsUtLl7fc42lDluq6u7rurhaY0zqMtF/ipDTSK1/37obdt287nlU
                                2ibS1BG2VRraygQ8c8ajxhMN7DNH1VHdxUuCNikPfJrZrYlc7rUVTKqRlUXzRUvPP3TX5eBnU+6v
                                r/OWU7DtnY3DjBoeH+k9tWWvLp29J8DcOcjuOgl60xwsat+6vpvdwyxZYk3faH3d4tjnpB/YCpvc
                                PM3AD8x2/VEfQnp8/JDzvGqF8JcZ2t8c/YkU499pX07//8OWbWcusdShxqXEUm/bwUNXrQ9crFhq
                                amsbXcskSXPeNf0rN8yW7NWdhoXq2GKY9W+PVUHaMui+D87RPC8qC6TcWRm70rjI7++1MC5Be5Mz
                                c/qydPRadmyGOo8vHcxqEO17Iy2a7b1ybNzbZerjJN2a3aIdGek6/hxb0UlbcZRRwJjr+kMCaY7m
                                MyE5JWPNY08C6a31/IBYqluxlP7/P3RN//4+ZkCaqnT4VW/uvIIgtLkg+oE9aOOowTk2eqLcj1p2
                                cnxS8Eku21daMnryW0eBW0lzcPrEhnyeq6PXkmMzs+R0wThXGZ0kHzMPbJhz+m569VEj2/lasCOv
                                XwDlFFRjKyqNlcjNsMVbEZn9d8brz4X6EF/mHFirDfjYtftiWJCXCB8X93OwKGtCSZf+3VVfrvQM
                                n7u8qjjaihnaLrCQWO7RgsdSQX2euqp/fx8b3Cf6wCmFTozzfp2GgrogPtEHbWpBHOoCvL8IJ/K0
                                oNxDVe623rx+rsbuPLNxaUovfZZ83zIG6vR96trZYidB76fFPWRdBSj3Js6oOsepK1zOdEwO3IJv
                                WRtbnAdTFuaXbgGrjsbsbn9KAN7YgRANBo8Xauuf5BhMYyvMY3WoY/Vrwz/v10tJNBxnvv6Mimu/
                                IZmaNE6iZyEvo0QeH6h+Dhu+T/9i+KM5bY4dokvHGsC2oUvPVZcq+3L6DEcq589dO8UFFxnMpX8Z
                                32Ys9SS3fsANJtb8y6mD0FxBF/Xv72MPcK5Cl8J4+8X20xjGueRk/SuxofD3/S9xVNiqllS5L4pL
                                lPujhhTIK81H+qZplOm4pNTLsuNU6U2BnHrhro/EbsrpG6qR3W75VBvrOJ2qbKdY1P2C9VGbJ81l
                                zKStayJHA14GTKw+aryJeCl4FN0+T6AfL0q2/hJbMR+2QtcAWX++DUlSROBcZfRBl5rsq0z9q6F1
                                eqR+8z9lbkLHSRNd4tf/o6H59NtX/1n87pNFPwBHdUlOqGqqUs0nG3bVj4zxDAN9BkkipdbPS10/
                                P1IZOs1kHv0OnaYS6+U4OedYyifWUlWs+ljqScWdVZ3Rv3cmGe/iHwd6EosM8l1X/Xi+8g3KQnAU
                                W6j0uEYZ7E33puF3jNMlRupsHrrF3tbQygKmx9XLJacHxD5R51IN6oEGSJcdGJMUeunHYb9uEsYv
                                VsX9nUa8v0l2xPcbG3ZUtuW+n+gpCw90nOqcEjLSOTzsiiy3pT96rKn09fMnaCxqo+y/yOSEk9ca
                                qzqaYOcO1Y5IQuC+q3eS0qXO8dUpWF3abo6tMI/VIz09ivVn9jp9rEHKfRfnRKGyrj1TXRtGmM9D
                                vc97Ee9TONf7PM6t2jwTGdkrxv6kq7rk++PqOiJxxCcaRyxFknORmec5y4+Owan6PcRSaWOV2LFU
                                9vr3t1l/UDzAqhrvu852dHi0hcSC3u+WOsLrRmdLJm2gRuGUN9LtU8znss7jjgZ+dZxnb/BFKc+6
                                7DyrnG+rXloXxQsdh6NU46BHT2+r01dn0R6pTj6bR50sxmlF7dVdg70aqW19obYV5zdcZ/ZUJmUM
                                v9S33IzNtb7uaTCZzdiU7P+22v+QRJJ37l/Mg63HVjS+Pk5af57q+jOas3Fa0vHx+mX18c/dm0Rz
                                sirOsfvc0PtcNs7jmd7r6bzYhAbXhs77ciWbcEefwyI/w5Kc97uYPE4USx13qfoyco7Dy8XVOCxa
                                LPW3Cg+xrg6cDPKtCUHpnypYWSiY3nP5mjT5V9eil6x2xPitqgKtq/zdNK/nKo/+NKXhPDoMRr1s
                                fBw06FnX64PSnC1PMG5+3n53b5oZXyyIfC+V5nB8fC5LYzOkYX/lMZY3OV+466qjvS5te2xgbHZ1
                                bP7MdWzU1nn9WJli84fzbjOwFWaZ2VS/4VZpzJYmrJPeH/xN18qzRRo/9bF6N6zRF2M+82XL8t+b
                                Ygvw7dP6mmtd9uVm2M/y/Q/n0Yaqnq+Vrg+m6NFlaRx8LNWfV33qQCxVRf98hf1ZTP37mwMAAFgM
                                51cW3j1dTPd4+/wXx8Q3kt5nbAAAAACgDMkjAABYCPSNo5QAX9JYfOL4XPUVYSskAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAwHT+xhAAAABAV3j12fu94h+bxdUL+PP+u9/90WfM3t/UMZvFSMfsDEkDQJeB+QEo
                                8w5DAAAAAB2iV1y7xbUR+Pd9huwqmPki4O+GGtQQ0ACgy8D8ALzF3xkCAAAAAAAAAACYBskjAAAA
                                AAAAAACYCskjAAAAAAAAAACYCj2PAAAWCG3muOfC+8WEcOmu9+9f6PW7u97HP3j3uz8uGHUAAAAA
                                gG5D8ggAAOqyVFyrepW5fPXZ+5JEelZcJ+9+98eQoQIAAAAA6B5sWwMAgFRIUmm9uL4prv+8+uz9
                                PT1mHQAAAAAAOgTJIwAAaIKeuz6+9pdXn72/W1xLDAkAAAAAQDcgeQQAAE0iW9u+L679V5+9v8Jw
                                AAAAAADkDz2PAACgaaTq6BP5l1efvb9PU+3FRpOIm+7tnlkiE/1CNs4ZIQAAAID2IXkEAABtQAJp
                                wSnmfbn4x25xPXTX2xrHGRV/80PxzwPkAwAAAKBd2LYGAABtIQmk+8VFD6QFQxNHT4rrKzc5cSTI
                                30hi6QlbHAEAAADaheQRAAC0iSQI7rrrbUuwOGwX1z13nUC8iSWVjy2GDAAAAKA92LYGAADTkK1C
                                T4vrdMr/33PXfWo+KK714qpaHSKf3Xr12fuDd7/7Y8SwzzdaRbTuplccTZKz9eJzp2xfAwAAAGgH
                                kkcAADCNy+I6LwL2fkBCQCqIpJpEthmtVfitDXddfXTCsM89q+7t5tiWz5A8AgAAAGgBtq0BAEBt
                                pGKouI6Kf/1ncX1ZIciXhNM6vY9gCu+56pVtAAAAAFATkkcAABAN3Va0X1xfO3sCqUpFCiwGl3oB
                                AAAAQAuQPAIAgKi8+90fEuQfFtcPxoD/lgvvgwOLxavioh8WAAAAQEuQPAIAgOhoAkn6F70wfGzF
                                sTVpETjXK/VnAAAAACASJI8AACAJ7373x1nxj74LrxghebQYciHbGQfFNQz8iPzdgJPWAAAAANqD
                                5BEAAKSEihGYxHFxPXWztzXK///McQofAAAAQKuQPAIAgJQMi+tPw9/3Xn32fo9hm290W6M0Vv+3
                                m16BJP/75/J3cpofowYAAADQHu8wBAAAkBBOyYKJ+Mbqrz57X6qK1t31SXtL+n9LtVqfrWoAAAAA
                                eUDyCAAAUiYIhq8+e3/ISMANMiIJIralAQAAAGQM29YAACAnqFQCAAAAAMgMkkcAAJCMV5+9L9uQ
                                lgwfuWCrEgAAAABAXpA8AgCAlKzoFQJVRwAAAAAAGULyCAAAUmJJHg3d9JO3AAAAAACgJUgeAQBA
                                SnrFdSvwb/90JI8AAAAAALKD09YAACAJ2u9ozV0fwR7CuV6Q31wuu+tE4LL+T9KXavjud3+wzRAA
                                AABgASB5BABVAkkJItc1mJQtSbfGgso/9Z+SCDjLuQGyBsVrpcs/SzlQlgB5qM8k1+/6bAM5ih6J
                                mMpmcW0E/q0fz1HDc98rXculuZb7Gca4nzF96amMLY3pi/zmmfxuk2Mw5X590m9L52+tpAvjfyv3
                                PSiuF8V1SrPzqDZ2bUxm/ByMSjKTtY3V59hU+b+l60VvTJ4u3Jstq7+pHpwhS9nNpdiFVZ3L8fks
                                H4rg5/JPtQ1Z2LU27L+O2SRdztb+L5L/Z3ie7Ocn0NYOS77sb14/c5c5yAuSRwBgCSZ3iuuuLkih
                                jIrPywL1bFpwqYteyHeOIjl08lvb+ixTA+MS3mlenfBd4iA9L64TXYSpxHgzxjvqyITwa3H1Ax3x
                                kB5KEytjNGCQpMh9vbeb5v6y+PszP7/Fd50b9GVdn/9ORX15qvoyakpfdGxELz5RvQg5Jc/fizzr
                                sPgOue+jWUnVGHM5pzbW26XVmDLT8LOsqjzcC3wO3xfN60x2z1RDdhuT4eK+JiVybuJS7+kiQC53
                                VS5XDDbBqZ29ev7iuyTBfOSuXxJcJh73Nu3/8pj9N8lJ8XlZC49lPcxB7iPYpjP1/04y8f/mydaW
                                /fJVo25mb2uB5BEAdC+g8cHkQ11sq+CdtS0NLr/V4LK8QIlj+kVggmFvVpJhhsPwQBfa5UjD5JNK
                                MkZnxe/8oE7SaIHlRpzlRxo8hjCY5lhOCDKflAKSm3iqsjIsyfKOzlOos+iTQHI9Lr5DgoiD4j7P
                                GtKXM9WXk9T6UvzOuo7tHUPwOckxlfu6U3zfl8U9n6aYyzm1sZaE3U0yc64yc9y0DdJA5lEk+zq+
                                bgQlJRtiSdeRh4bPvFAZHiQM8OWeHhtkyNuHiynft6nzuVHDJpT1/b5e0+xayHfUsf9W29yG/V/R
                                dVOuQfGdX2tAf9lh27Sp12P1j47G1vrk/l/D63MTc1PWzZi29lzn6JjKT5gGDbMBYKIjWlyykEg1
                                zY81FtpJweU3sjBpsNpkUHNYXL+o47mc4Ge8oynj9Uvxm9vqgC+a7IhTc6wOWsjzi4PyrKpDaJz/
                                b5ztLeO4g9WbJDuqL9sqXzH1Rb7ne3G2U+mL3vuu3vfdCEGi83pQfO+jRdSBCrryvY5ZjLFaVTk/
                                asrGSuVAcR0U//qfRPa1p8Hlz8Xv7LQtUxooir06M3zsQxdehVl13i0B/qU+w2DCfK6rXP7s6iWT
                                b7JrYm9OVAeaWv+/r5k0+MBNqCJSG7qj8h/T/ss8/FRcB1qd05b/F8s2yTN8pf7fZsPPk3J9PlQZ
                                a9LW/uzivgQdXz9+XlQfFmZD8ggAxhcncY721GnZSPQz4pB+rwt6ymdZlgBWF9pUSaObnL5D3cIx
                                7zIj47xVXD7gCJUbCWAkcXSc6s2qOnUiz/dqOsATgy116vdLTnZsltRJjK4vpWqFr1z1pNo0VjTg
                                31ObAiUbW1zexqYIzpPJzIRn2dLneNiAffVJhxzsqtiCX43Jh82EQeamcb1+6a63RV2OBdkPdD7v
                                JpDLceR+fxJdSGUjItv/F27sJYfK4WHkpMS4Lkvlz0ETCYqG/D/53m9S26ax50m5Pots/Thntta/
                                CN1vMnEJ3YBtawAwydG628DPyW99Ufxmymd50pATPM2pkITVbd3Cc9JBkRDHS0rN78/4m16FMZaK
                                IymPPkxYHl3u1VEXCRxOxoKtruuLjM1jZ+vJYWFZHV0JSvcpg2/cLiWzsZp49PLTZHDh7aokrPem
                                bSFKjVQfFb/fd28ayofgq4/OIs9Fz4X17isnQuTeB2NB9iNNVCw3OJQrKkPLCWxEavsvwfwXLm1F
                                meeu/uYe/t9iPc/YltQmX8T49bvXpq2F/CB5BABtLLTlBfdxgmdZ12e5k8HQXpU2q4N/2LGmv1Mb
                                hddEnJCvx53xyPTcm54AdRnqvZ6VZGxbA4e1hmXpQSQd8U1jVxqQIQlIRxocLmxD+XmxsS0GM+PB
                                9K2WE/N9d13xE2oDrpqCF/d8Grl3k/z+bcPfv1V1pImjJ6qnbb1oiR2kzqP9T2Y35sn/K61vTSX2
                                ys/zaE5trSOBBB62rQFAW46DZz3mAq9OnexDv5PREPu3qw8WfA+5nFbzeXH9q3BCjhMnEjZcvLL7
                                q2PoxxzTxw0HDp47dWW7dOJQU4617we2tqiCP0821qWvWLMEa7tN9RsZp2LvI7FJmxHlyjckDh2D
                                t6qOSsFpW4mjcdu2G2kLW0r730biKJr9n3Pb5HvJPXHNJo6iy10miSOPyMZeW7YW8oLkEcCCo3v2
                                n7TkOKQI0HYzDVIXOYEkQZacVCPVRseZnJgUylsnwamMPWjJMY3FpkvXz2JSsCp9rZ4UYzhwC8ic
                                2dimKtYsQc2jFvty9J2t95Hc55omfWKwZlzvxnsdyXqZQ+LIuTdVijmtkeP2X2znoxZ9jKWYczVP
                                tqm0PseqOGubHG3tA3oYAtvWABYYdWB3azoOF+pg/a6BokcWGCmlF+dkuYFn6bk3x0TXCXSH6mCP
                                JziW9XnWajyPP65YvvtkgURtWefFlz9LBZIkk44zL4N+q0mqOk0PasrYUPXlzzb0RYMySxWQ3OOZ
                                6sRIA5cP9DtmOZHy99LX6mBR+x1FsrHeLp2V5Ea+95bOY6+hZ1nVZ1mv+Axnmmg5c389Hr6n37vh
                                7NtkpWHtsI1tkRV7H/nqoxhrgIzZh4Y56Ls3VUd1gtORfo/M57n+dznB0XNvktSW718qrZFHmdn/
                                nsp/ncTESJ/tt5KPsaI2dbXJRME8+X+l9Vme507NOR+3tY3PT80XoaMxWzuaYGu9blrXDm9rDxZ5
                                C/qiQ/IIYLHZdtVOIRmpUyWnjAxuWkR0QZff+cQleltXat56r+JXiPPrT/06D3C4NjWJsFFh7PxW
                                i+EC7x/3fZQ+KcbhuSYXmhyLSQ5vb4IzNd4kdbuio+0rr0RfzlrWF0sPq0tN/vylkW2AHsjfS6XZ
                                4YI7mVVt7KXK6NPiOr0p+VYKNO66RIkktbHbFQIzL/shOn6kciW/89Ag//7EI7Hdxy3Mcd/Zto7J
                                38nJa33d+lYnwLQco/666qhkZ6yJwKHK5FFABelhKeFy3yCbvdIa2c/B/tf0MS41kD/U8R/doGO+
                                sjXFMexz6f81ZWtL87OTqa29UD/2cJYfW8PWLpds7SK9AAWSRwCgjud2hQVQnKC9UKdOF+JDPcb9
                                gS5Usd/ebLlqpxddqMNwGLqVSh2/E2l6qgHDE2d/EylOwZlU4Cx4YL2sQcWdYixSn7wWNN9aXSHO
                                4Yeu1CRVtyvsVJDdF6ovA6O+nLg3vUhi6ot813uGez+aNCcz9EDGrKsnDOZgY8Ux91s8LwNkRsZb
                                tm4d6jzUPZZ8EutqZy0BrWmtKMnVkcqVpYmz6O1W8blB09tiK1Yf+e1mdZIjlkbZ4yesbRmDU/m8
                                JAH3LYl+nYs9tWd7Ljz5LvZ3U+cz1hpZ2f6rjbtTQa9EB/bd21sFp42VT2IM9NCPJxV/M1f/b1f9
                                v16C56m6Pg/U1p4a5yelra3iz9axtX19lvuBv3klO8XnzjrWggBIHgFAjYW2ypuNqVUIhoVqX7cs
                                RWs2qW82tyt8X60AVx2JU30ey8Lr9O/u6j3w9uZNP6iebj05T/AbQfOtv703QV82Xfj2kBj6ciFj
                                oYmEmM25VwwO9oX76/aiaXog4/tAv/tw0U9lUZnZcvbE8nMNAs4qyMx58bsPVNajNVmtKP+Vn2NM
                                /p0hgeS3gx21MOV9Z6s+qpUc0YqOdUMgXq466um9hn62li3T+TwrHTMfkkCKvUbWsf9VDhioa/8H
                                qsvRT8GraJvkeZ7q8wwrPI/4fwdSTeYiNxuvsT6bk6FjtvaRrs/RXohWaIAfw9YOVTcvO2JroWVo
                                mA2wmFjL3Ws7j6WFSpy3L53thJqb2KwYoH0cozLCv1nV8bk0zsFmxMapXcf3uthPcKJH3UqYdZWz
                                RvVFAj05lS6yvli4CL1/+bviEgf2Acf5vtFvZ6vUqRUEeJlx19tJ5G16rCo+q/zL2/naCUSVvX0N
                                WkPoqU3tNT3ZGhwPNJgMtXd1TiCs3Ouowpr53EWoClV5kPl8EfgRqQJai9A8+6qSr4b9t45XLPvv
                                5d/qW8S2Tf559upWmiTw/+qsz49q2tqrhFgCW2tJgr1wFRNgE2RNnuWZwdau0zx7MSF5BLCYWBco
                                WVCiNb1VB+Jrg6M9kQpvX6MFNjWDHE/UY5sT4PuVfDnjEkfs1E1uzmgl9okeI5Xf0wb15amLkGgd
                                05dv3V+buKdmBeewMZmpnTgqyYtPIH0bQR99sHnbom/FPZxGkn3RIUmghp5odtu1dxKWrC0vDX//
                                oavQfLxC0/ty1dGyszVZF3k8jlUNqtt3jwNtme8xs1rjJ0dqjysljipWgkSz/4kSSHPh/9W0tYeR
                                5sfb2ljzYzk9cai6OYg0L0PVk9A1qE1bCy3CtjWABUP39MtiG/rWSZz2owR7m0/UKXzsqpdkW50G
                                eYYfYgU2405eMbZH6pSHbge8qgCT/h6Z9j666mtT3NuRUcZkDPy+fYuseaQC6SLS6Ukiv5XHt0JT
                                2l/VobtIpC8PXXPHavvm2gt5UlqDNvbcRT55UBMFxzp/92s8y4qznZj03MXfiivBUV9t/VKgzDaO
                                bv+Q+ww9xegqMaGNsy1zbwkwx6uOrA3zZT5jr5d9F75tzp9yVVU3atn/CvI0tU9cTd/C6/Kdhm3T
                                QG1Tjv5flfV5oPNzHnF+yrb2Xs25WTP6Gv1Eurlm0I3o/jTkDZVHAIvHqjpkocmD05LjGdPRvlQH
                                4kXNZ7E4dikCm/IzDfT7LxI+Q/aIo1lc8mbvn8V//sNdv4m1VED405O2a96K/Ga/ZlBu1ZeTFCcE
                                aYm86OLLBqdSguAdqo+SyozYwWcp7FKFN8nTEhWWqqPoTVRLjWrPAm1Hr0WZ7bvwKinnqr29t7w0
                                eV11VGE+z92M0yFryOUgcJ3sueoNlmPYf6v8n8aqBJngW5y6+pWEVtv0IkGCIpb/l9Pz+NPHzht6
                                lqHKdmxbO9LxCdGZZbW1tF5YMEgeASxmYBOarBh3PGMvuGe6UJkdIq1uWXXhb2nO3A3H5LYYPHzg
                                5ix5NGGOpfHnp8Yg1p+e1Kvx8y9d/cSnRV9SvAksj2VfA4g6+ijO5p+Gv5eqlUM9/Qfiy4zoxCBh
                                5aHVHtUJ3mPo202JjN8T3HNsHR3qmA8N9xrcp8lYOfJW1ZFud5PfWclgPkXufwv4uzrJwFr3r0Hx
                                qmG8ktr/CLo8N/5fjs8TYX4sz/KbS9cHsRO2FtqD5BHAAqEOWM/ZEi6pm99a+0RUXbRSO3beITrX
                                Zwp1iOau8mjCmFRt/Czb3upUH527Gm8CNaALlbFLTQKk1pe6Ojl0tt5J/tSjn+REljaaEc+5jU0Z
                                oFdp5Fx+FmuywSpbluewfPd7LtLpRw0FkZbeR3Wqjqz2bJhg+61n5kmOJVYqzmct+28crxhVTrN0
                                oFaypYJtGqS0TTX9P+v6nPx5VFcGVWygJipXDHOTzNYav3vZ2dsSQMeh5xHAYmFxwpKUrN/g4Fn3
                                8ovTcMvgqJ43UHU0/kyhAYG8We0l6CuQFdIoU52kL1x4T5C1imMz0uCnzpxbnNO6gUoo/o39esU5
                                kL4s5xocLhnHQubtYfF5Kf2XJqGDTHt1dcXGNmWXvMysJnwWpzb8g0I+Uo5tiNy2GtBU6H10VU2k
                                ve9GMwLM0GbX472Oqszn/eI37yQcqlDb6ufToicx7L+M1XuZ2X+rbzGv/l+V9bmJ5/G2tpdwbgR5
                                oXM7oa0Nvf9bjsqjhYPkEcDiBTahztDvTThD4twVC+BQnb1l47Os5PQsNQL8RXp7c6IB0MPAv/dv
                                5YfG3xm5+v0hZE7ezUxfLlRfrMmfMv5t70bFMbmn11lxL1cnGc174tM4Pss5yYyr/pbaEpxV+fuU
                                61zbfbr6LrwptHNvTt68qfdVnaoj6/ovtiWXqlhfSWaR4Rj23yJHf7pmTsP0W4qqJI+ys001/D/r
                                +tzU/FS1tVablYutXXLNHeABmcC2NYDFwrJAVV0Eq2ApYa+yaDX5LL582fI8C5M8MjZkdBq8rOkW
                                GgsxnEXLvOSuL2ViNV+VJOA3xfUftrS95dTfyklmNIFw3qQNXPSApkLvI3/y5sT71v993YU1155U
                                ddTlQK/Kfcew/6ZKnZgneM2Qq6rPlZ1tqvlb2a3P6t8MK6ytlsRuV2MKmBNIHgHANEYNbvOSQPi/
                                oX+s5fuWZMuwhcoIi7PSdo+OprE0ZPRObxuJiVA5Ez25aHAL19DZml5PSiYcuetT8GLcs8yNbGkj
                                iWS3excZ/5Yl2MyN5QxOAeo7W++jdTe9osRyjPe0xsBt2dGuBqihSasYVU6pfIsu+H/yO68Szo/T
                                9TlnW0sFD3QGkkcAi0XoAtWEc1LH+epCpc6lITBfKMdB39Ba3tJWCR5ibVtbbui3mp4DcW73i+sH
                                FyeB5INTn0R6xBG+s21EgwlH+Z3/XaCxbX2NqFB9JFvSNqdUH226sG2m06qOFsFvacsmd87+z6DJ
                                pHad3wv1C5qeH9PL0DlgpeJpiNBRSB4BLBa5lpimXNyHrp3tGovmQKSclypNGefNoY/u3GsCac9d
                                n4IXM1iQufqquI4Kp3J9weQ6VxtrSWZDPPouvPpIEiRSXfRWnyGt5JP/PSQZlvo48q4wz/Zf1s0q
                                lac9F95svUn5Sf17XZCFLr9ApGpqwSB5BAAABLMLOnayNaG4pALpI2fbYhPiUMqJMN8Xwe82U9Z6
                                QNN0NUHbZFGdWqH6yDfOLiOJo9uBdkF+a8B8AnQKegdBZyB5BEDAQhABbWCpzOo5joNN6mgWQa4E
                                nZLk+diFNzMPQQLfLxYogRSapGnaLi1acJKT3Rfd+tVw37J17aoxtm793HRhjbLnueqIdbw52wRg
                                gcqjBeMdhgBgofDJo9ycMGtywJIEa8vplOe5hch1Gl/hk5tjlMRZ0wapstVMgt2d4rrv4hzVLYHv
                                g+J7pWnpALGaSwdfmq8fZbbWDXO4Eak+KmRf5P6OC0vg3VadOdN/1jlhrWqSQebzNKP5JOlR37cI
                                rVhtOhlQNbEd6s9a/cs2GOoVcp852lr0c4EgeQQAOSy24qj8jyXILZxxU4NteYPb4OkhVgdsESvC
                                THPeYsByEaALTVd1iLP8bspgt/jHfqEzh+66GulhYAB7E7IdZ6v4zjP6sbyRG2k02tApQKn1TZ5h
                                wNxORZI6Uhl0N3D93dQkrvQM+zDgM7GrjoZajZgNLZziGPryoAvJCZNdang9q5qssrwMXZJG9A3Z
                                Jxm79xJ+f3a6CYsF29YAFgtLkqLJExSqOCuWvi+NOkN6Wk7P8Juv3OIljyxzknt/JJnv5SmnJHXW
                                udd+SEfFv/6f4vpncb2oMQ8yNptu+lHk84Jla0iTdin1iYX07LhZl6SKqG8YT6k+2lV9mWVXQquO
                                QueTubTr8nKDp0v2XLVklck2Nej/ybOkrKRqWqZTV7tzuhm0CskjgMVipImK3BbbKs6QxRGqclpX
                                k8+ziL0ILA5WW+MzdOGn2qy6OFu8bqRCYjJG4CtHyp8W11bxn/8orueuWhLJb8fBxjZvl6rY2FzX
                                i67Sd+G9j0RPpOJvI+BvQ6uOcn15lLMujxLqVxX7X0fPRD7+N6fnqflblr6JH2S+Plt8Dfp/QauQ
                                PAJYLIYuvA9EU4tt1aA7u8B+7Pc+MDpBC5M80je0PYMD1FblUY4JyqZl+S20Z5H0Q5LT2az9Va7m
                                vcE39C5zmWkq4Vj1d7JM0EuAVlyyratTVWwVqo9CgkRLryPLfPYanM8Vnc/VDHU5q+RETZth8f8a
                                0ecatilLW1vjdyw+TlOy5m3tum/gDyCQPAJYLKyL7XoDgV7oMcR1nmVZn6WpN0/rLrzCQhyGi4b7
                                MbWNNTD5r2snuWbVl7UGtq5V1ZeYQbBUIp0U//qpu65CsjDXb021X1RogLakdim1Y25NZmedbFD7
                                uldcPxdjt9exCpm+C68+CsHS6yjHZIggFY0/6nzuNrj9dxYWXc7dX7Lapqaep6ptss7Psq7PvUzn
                                J1dbu1lc36huPqEaEQSSRwALhDqYQ8MiFXrSSyXUMVmv4qQWz3Lurk+jCX1b86Frpt/KuvF3zvVa
                                JMQh2TD8vcVJjKkv/sSmkMRe8p4+qi9rLpPmrFpJse+ueyGF0nPz1Vy2rk4n3cpnPOq9rvwnT4Rp
                                8LKj9kP+/QsNbLYzSjrM0pm+i9PjznrCmsWO9jTYXk48n+s6nz31A74vruMcqsq0kf3Q4GNsqK6l
                                Gque6nGdObHIQBP+32bV36jgz6aen8rrszGx18jLUJW3HfVp5N+/Ut3cdLDQkDwCWDzEef0t8G8l
                                4bKZ0Cm3JhHqBGmy+G2nDG50nDZd2Ok4nt/dAiWPNCjYcrYta+fqXOWeCEitLzJudzILhgcawHLK
                                1tsy83smdqmujbUENUmDM0VO/xs/sUxsilSu7LdwIlcVRF9iVB+ZTlgzJgObCra3x+RzSef3p0wq
                                HSz2f03t/3Kmumy1Tbn7f1Z/tqfPk8pG1F2frb5GyhdVMuc7E2ytzJck6w86YmshASSPABYzsAld
                                oGQBuacOXuzFqaffWydosjgOThf2nYTO3baOV6izJU78QKuo5p6xqoEU8poCi4wtqYxtJtIXcU5X
                                E3z3Us0AYREbvseUWZGZ6JUzqm9bNW2sJdgUu7qVqmpEqouKf3ziJjejld+WBtO/ZLb16S9Eqj6y
                                Vh1VTYZspUjg6PzsFtf9Keul2LscKh2sPsbdRP5SuUIL/6+6rb2rPuBSguepuz5bXzpsJaw+2tK5
                                X77B1v7UlYpPiAvJI4AFQ98+DgwL7qouttHejN/wVsP6LEN17kKd8CV1VncTOA/i4D4wOg+/6f3P
                                PRqAPNHgzzL2LysESDH15UJ/fxj4EXHyHyTQl1115lwCuT0troOG3vK31fy8SZm5VJkJ1W1vl3Yy
                                tLHW7cEbul6sRJbTNdWBWXrltz4dZd7kte/qVR+Zqo5qJkN2EgSIWyrzKwHyJJUO+66F0/wq+BgS
                                1H9S3O9W5LXT+tJl7v2/is+zrHK3neHz5JIIk7H5IsDWiq/zk/oOPaKrxYHkEcBiMlDn07JI7cVw
                                IHShkyTLQxenca7VCRdH7LEG+FEWXR2XR0bnruqb486hb00PnT1xJI77QBM4bVKlwm03RgBd0hfr
                                2M0MSKTZsDp/G+pQV90msmS4t0WpUrLaJXG+H6rjHoObqnRSrhe+WmEnsn3dMwRnSyUbmyU1q48q
                                rx0VkuErahtiJkNCg9NywL/U4nxadTnaC4RSYsJS0bxI/l+V55GE2OMYtjbm81R86fBJZF92U33Z
                                NcM9LI3ba0n2FpdUgf5HL0kAPyLJNB+QPAJYQPRtWt/ZmhDXdiBKC+3jSEGNd8JPjM/iG63WOqlH
                                t/uIY/ejs791kibDJxXeHHeC0nHax8V//qLjY3Vwnuvc5hDonRqSHkvqTB7W1JdldeSi6Yt+r0/m
                                lb/XO6IHlnvWe1w13N/IxWkWnLuNHamNtVQWyrh/ITalajCgerer9i3WloYz43P4BP2juluEtYLj
                                e6N9PVfbmvt2YGtSwlO16qg8n781KZcl2ZT1/xtn2670q64Do5Z0uUqi767a0s3c7H8N/2+/zpbU
                                FP5fjefxMr2d2fNYbUKUl6ElX1Z0c8NoS8TWDksvpH7RexLbvanXtntzatu2g07zDkMAsLBIMLyu
                                AaPFgfigMP7fFv88thwvr3uzZdtSzDdodZ5lWRe4DX2eU+Pz+Gqju87+xmmoC27uW9ZknlYNDvCK
                                Bqy3dT7qOFS/6hiNMtOX+xX05WvVl0ujfD1x1ZJuNwUjkliQxFZvynyLft7Sez696Z4rbKe7atgr
                                c9rAEdC5JAf8aZKhc7imyRI5TefA0ihe3+o+UhmNNr46XyL/liatPkF/9Rbaaus0qe8r7ix2ROT1
                                mcsg6RySlCies6/BmuUAAfnMoObvnqid7hnk8hudz0PrAQY11n/5naPi9/otVy2c6BhY7L/M64/q
                                XxxV8C+i2v8IPtMdXRty8//K8/PQmED63r9MycjWepsQmmAV+/hVydaeG3Wzp7Y2ZBvp+HoutvZ0
                                LJG2NGPMJWknz5q9jQaSRwDw9iJ1UXIgLW+TfE8J2df/gwb4FzcEl7JY+P3gvYTPcqz3Zu0LsK6X
                                ONTP1TE/m+QY6SIriZRto8PfyeDGvXmr9bjh371Q57Sfkb4MVcY+qKEvTwP15YGrlpSM5bz706ue
                                S6Co+nAZweEcOtvb4a7b2JHa2DVnO4XHNyS9pzbp+Aab1IiNdW8SYWuG4M8nIz/U5zialUQqNdK9
                                76o1032mv9OVis6+rimhlVV1q47Gf9ciL349uFOyZcOAJMhuRdmUZ3yq8p+D/ff+kkUu5Zm/Ufvv
                                1/3zSfOnCfV1Ha87Me3/PPt/E2ztRgWZHre10+an/DypenCd6u9YXjr4vnkbKmdHs5JI6hPsqo2u
                                qptXtlarlkITg/Js0mj7rMVTdIHkEQDUcCBXdeGwLoT+Dfk3xSIgC4AsVH+667cRPQ2yq3xvVeeh
                                r4Hue67ado01vb7QhbUc6C7rs8Rw5nwQNUL88g4YpuiLd+ossrDk3iQpG9cXreLwb0ktCYz7ekng
                                NND7XdaAY7WCPrTa/LyloHNQjN1R8a+3KtglmbdP9LpUubkYm6NYdmnWc1yWEvTWxu1yj5IMe6jP
                                8Kv7axJRnvVDY8A0ybYedCkg0SqggSYLZj13tD55NZLh5bXyq+I7zlWvLybM+UaNhIE8qyQnDjNK
                                BJ6W/CWrzq2qbyHXSPVgNCb/PZemKmeaDJxqsrbz/l/JB/S2tlfVRk2Zn6ZtrU+E3a3wHI9LtvZl
                                Ilv7Qv3Yi1LS07K++SrWzthqeAPJI4AFphQQ9Fz1hrxLumisZvBIJ+7Nm6S6TkvPxX9TJsHNfgd6
                                cbSFDxgOckyuqb4clYL6TuhLzcq8WLogTmIOzc+7apdat7Nit0rBWdXeJynsqnDmAiqbMsU3/J2l
                                m7GqjmIkD7xM+kRSbF4Hp3Nm/30iIpeTAI9LiZOu+3/+ebytXe7q/GhS2dvatczmRfzYvZKtrWLT
                                U60D0AA0zAZYcNQ529egvY03fNEa6KpTLdVH0q8ltyB1fMGFt/GJo/2cEwx6b4c6n21Q6bQy3QJ4
                                4GyNj2PL/0L2OMjALl3Gsu2ScCj+IT1PckqAi0x/2eEeGpI86s+Yo1Sncx7pfOaUrM92rczAXxq6
                                iNUa+pLmYB78v5KtFZl+2tLzxDxN9FSfIyd/SKpGD8Z0c9nZE3WWE1ohM0geAUCbDpHfovQsQaD2
                                eSYBjn/GJySObnSI/61jdNEBfTlXfXnWgr48c9UTV205o1JFcLzIWzVbTCD5pOzTiN95ot+Zg65K
                                MPPvLjdfVdnou5uPG49adZRRsN25tbJFf0l+99uY/tK8+X9jz9OGra2zPueyZkxDnutRTr0ooR1I
                                HgHA+ILb1FvI15UmsRdGWXSLSxzijzVwbYsLXfifsFVtqgyIQ/JRMT6HHWpy649vftSgw11bX1pK
                                rMo4ydwOFl3YWxj/JDZW7atUK3zq2qtk84HavAQzN1Ufpao6Kq/9T1Qu2wpSR+p7dGKt1DHbK64v
                                Gxoz70scplhv5sn/G3semZ9hg/MT3da69l+GzkrqDiuM8cjlVe0IBkgeAcAkh+jfiReq1wttykoT
                                DVh39HmGDQ6lT4r8q7iHvQXt8zLLcbgaH5mfriYWSkFXavm6UCe4tiyVEqv/dumbV8v3f86RvBPH
                                /2PVgVSJx6FLXM2n8yoJpKYT9H79eDQv1Zwzqo+SVB1NCVI/dc03tT9XWe3UWimVlMUlyYKP3HUF
                                XCrOdHwOE8vAvPl/YmsPdX5S29ovUz1Pac34NLGcTXu2z9XWnk+5v6HKqCUZ9Jtr78UD1ISG2QAw
                                yYk80hNgpLJCTtaJdcLEpS5++029LfZ7+vX0il13fXpUL9HP+ec7SO3sd5ALDUpkfE7npRLLB12F
                                fPW7pC/aLPfcvTmFbTmyHjxzNIe/afwHerzxlrtu7roecexf6NgPGnwOsa0PXdomqI0+Wwv46iM5
                                iWip9Mx910BCR23ZiRyhncgujCNrs1Q0HHT5yG495Wu7+Ndt1YG1iOPzTMfnvKFnmSv/r2SjdhPM
                                j39JuN9EElvlzNvaTxLbWv+C7yDw2U51DbsXOG6N2DRIA8kjAJi2UImz8qBYrOTNzQN3fWRo1ZOC
                                ZiVVhrqYzOI3V7HUVZ3TPT3BYlsXuTUXp2nfUBdaOenjLPOkkYyfOAP/X8LfkETRn/rPoY5JjOBA
                                xvU8UFbOXYP9G8b05ZHqy3LO+qJz8kh1ou49h9x3rLm0yHC2QWkpWBfHe1Pt7EbFORhpYkXkb1BD
                                ZswNXxtI0I9Urg7dHCfl9TSvvsqCP3ntZdPPnMAuTJIxWS8PjUF3zvZ/pEkX0YEtDe7XK/oXs8Yn
                                mS4n9v+8/o5a8P/K87OpdqqOrX2uz3PWsK292o6np6emsrU3rSNT5aW4p32V97szZOEHl7iKDtLy
                                N4YAAEIoFoYVXXS3dNGdtWBdaIAnTsNJjhUIxTOt6vN8qI5e6CIszsFAnZl+BxJG0A19abUyS/Vh
                                W50/S2L13L05TQ1dqC836yo7H7jro5Z7U+TlvGSDBrls+SmeYVnl/p4+S5Wg81LXj+e5rh+Jxk50
                                TrbCPtb/yW/vuWzxnnpjdqFqwC327Znat4sFmMue6vF6SZdXpvgTIuu/l3R5lKFdmjf/r2xrb98w
                                Pznb2hWdk7s1bK1/GfOi7lypzEuy8f6EexE5l8TREa0cug3JIwCoEyD0JjiS4uQOu7g4qOPeu2EB
                                vtBnIziGudaX0v2u3ZC8EGfwvMtbTqAxm7quwdmtKfZV9OBPDdLkOlvUAKMYMwlm9/Q/93JqCK52
                                YVXtgp/P5SkBqZ/PM7UTNMhlPYO0tnZ1zNYuz7C1Z2prR4nlA995jiB5BAAAAACQTxD4SP/zgIAL
                                AAAAAAAAAADeQt7c69t7AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgA7x/wswAEzDEje+
                                hX8+AAAAAElFTkSuQmCC" transform="matrix(0.24 0 0 0.24 40.8105 75.5)">
                            </image>
                        </svg>
                    </div>
                    <div class="balao-flutuante balao-1">
                        {{ trans('global.welcome_floatingballon1') }}
                    </div>
                    <div class="balao-flutuante balao-2">
                        {{ trans('global.welcome_floatingballon2') }}
                    </div>
                    <div class="balao-flutuante balao-3">
                        {{ trans('global.welcome_floatingballon3') }}
                    </div>
                </div>
                <div class="col-sm-5 form-cadastro-wrapper padding-b-2">
                    {!! Form::open(['url' => '/auth/register', 'class' => 'form-horizontal']) !!}

                    <div class="welcome-cadastrar row">
                        <div class="col-md-6">
                            <h3>{{ trans('global.lbl_signup1') }}</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/fbLogin') }}" class="btn btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> {{ trans('global.fb_login') }}
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
                        <div class="col-sm-6 col-xs-6">
                            {!! Form::text("username", null, ['class' => 'form-control text-uppercase', 'placeholder' => trans('global.lbl_name')]) !!}
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            {!! Form::text("username_last", null, ['class' => 'form-control text-uppercase', 'placeholder' => trans('global.lbl_name_last')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-xs-6">
                            <label class="radio-button radio-hidden">
                                {!! Form::radio("genero", "masculino") !!}
                                <span class="text-uppercase">{{ trans('sexorient-gender.gen_opt_male') }}</span>
                            </label>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <label class="radio-button radio-hidden">
                                {!! Form::radio("genero", "feminino") !!}
                                <span class="text-uppercase">{{ trans('sexorient-gender.gen_opt_female') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name='aniversario' class="mask-data form-control text-uppercase" placeholder='{{ trans("global.lbl_birthday") }}'>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => trans('global.lbl_email')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::password("password", ['class' => 'form-control text-uppercase', "placeholder" => trans('global.lbl_password')]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::password("password_confirmation", ['class' => 'form-control text-uppercase', "placeholder" => trans('global.lbl_password_confirmation') ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 welcome-privacy">
                            <p>{{ trans('global.welcome_aboutprivacy1') }}
                                <a href="/paginas/termosecondicoes"> {{ trans('global.lbl_legal_terms') }}</a>
                                {{ trans('global.welcome_aboutprivacy2') }}
                                <a href="/paginas/termosecondicoes"> {{ trans('global.lbl_data_policy') }}</a>
                                {{ trans('global.welcome_aboutprivacy3') }}
                                <a href="/paginas/termosecondicoes"> {{ trans('global.lbl_cookie_use') }}</a>.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <!-- <a href="{{ url('/auth/login') }}" class="anchor-tour">Fazer um tour pela Vivalá, sem se cadastrar.</a> -->
                        </div>
                        <div class="col-sm-4">
                            {!!Form::submit( trans('global.lbl_confirm'), ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- Scripts de carregamento no fim do body --}}
        <script src="{{ asset('/js/vendor.js') }}"></script>
    </body>
</html>
