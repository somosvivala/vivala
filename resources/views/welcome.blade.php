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
                    <a class="navbar-brand nav-logo" href="{{ url('home') }}"><img src="/img/vivalogo.png" alt='{{ trans("global.alt_vivala") }}' title='{{ trans("global.title_vivala") }}'></a>
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
                    <img class="brasilwelcome" src="/img/brasilwelcome.png" alt="{{ trans('global.welcome_img_alt_vivalameet') }}" title="{{ trans('global.welcome_img_t_vivalaregister') }}">
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
                    <!-- Adiciona a abertura do Form -->
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
                            <!-- Adiciona um text field para o form-->
                            {!! Form::text("username", null, ['class' => 'form-control text-uppercase', 'placeholder' => trans('global.lbl_name')]) !!}
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <!-- Adiciona um text field para o form-->
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
        <!-- Scripts -->
        <script src="{{ asset('/js/vendor.js') }}"></script>
    </body>
</html>
