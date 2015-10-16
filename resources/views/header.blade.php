<div class="logo-menu">
	<a class="navbar-brand logo" href="{{ url('home') }}"><img src="/logo.png" alt='{{ trans("global.alt_vivala") }}' title='{{ trans("global.title_vivala") }}'></a>
</div>

<div class="menu-principal">
	<div class="hidden-md hidden-sm col-lg-4">
		<input class="busca-geral-menu" placeholder='{{ trans("global.lbl_search1") }}' type="search">
	</div>
	<ul class="col-sm-12 col-md-12 col-lg-8 nav navbar-nav lista-intervalo-preto">
		@if (Auth::guest())
			<li class="col-sm-4"><a href="{{ url('/auth/login') }}">{{ trans('global.lbl_login') }}</a></li>
			<li><a href="{{ url('/auth/register') }}">{{ trans('global.lbl_signup') }}</a></li>
		@else
			<li class="menu-viajar">
				<a href="{{ url('/viajar') }}" >
					<i class="icon36 icon-viajar"></i>
					<span>{{ trans('global.lbl_wanna_travel') }}</span>
				</a>
			</li>
			<li class="menu-conectar">
				<a href="{{ url('/conectar') }}">
					<i class="icon36 icon-conectar"></i>
					<span>{{ trans('global.lbl_wanna_connect') }}</span>
				</a>
			</li>
			<li class="menu-cuidar">
				<a href="{{ url('/cuidar') }}">
					<i class="icon36 icon-cuidar"></i>
					<span>{{ trans('global.lbl_wanna_volunteer') }}</span>
				</a>
			</li>
		@endif
	</ul>
</div>

<div class="notificacoes">
	<button type="button" id="notificacoes-follow" data-unread="0" title='{{ trans("global.lbl_follower_") }}'><img src="/images/iconperson.png" alt='{{ trans("global.lbl_follower_") }}'></button>
	<div class="notificacoes-follow">
	    @include('_notificacoesFollow')
	</div>

	<button type="button" id="notificacoes-msg" data-unread="0" title='{{ trans("global.lbl_message_") }}'><img src="/images/iconmsg.png" alt='{{ trans("global.lbl_message_") }}'></button>
  <div class="notificacoes-msg">
      @include('_notificacoesMsg')
  </div>
	<button type="button" id="notificacoes-geral" data-unread="0" title='{{ trans("global.lbl_notification_") }}'><img src="/images/iconbr.png" alt='{{ trans("global.lbl_notification_") }}'></button>
  <div class="notificacoes-geral">
      @include('_notificacoesGeral')
  </div>
</div>

<div class="menu-usuario">
    <ul class="nav navbar-nav">
        @if (Auth::user())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <div class="pull-left hello hidden-sm hidden-md">{{ trans('global.lbl_hello') }} {{ Auth::user()->entidadeAtiva->apelido }}</div>
                <img src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
                <ul class="dropdown-menu submenu" role="menu">
                    @if( (isset($paginas) && count($paginas) > 0 ) || strtolower(Auth::user()->entidadeAtiva->tipo) != "perfil")
                        <li> <span> {{ trans('global.lbl_use_as')}}:</span> </li>
                    @endif

                    {{-- Se a entidade ativa não for um perfil lista o perfil para ativar --}}
                    @if ( strtolower(Auth::user()->entidadeAtiva->tipo) != "perfil" )
                        <li class="row">
                            <a href="{{ action('PaginaController@getAcessarcomo', ['id' => Auth::user()->perfil->id , 'tipo' => 'perfil' ]) }}">
                                <div class="col-sm-4">
                                    <img src="{{ Auth::user()->perfil->getAvatarUrl() }}" alt="{{ Auth::user()->perfil->apelido }}">
                                </div>
                                <div class="col-sm-8">
                                    {{ Auth::user()->perfil->apelido }}
                                </div>
                            </a>
                        </li>
                    @endif
                    @if( isset($paginas) && count($paginas) > 0 )
                    @foreach($paginas as $Pagina)
                        <li class="row">
                            <a href="{{ action('PaginaController@getAcessarcomo', ['id' => $Pagina->id , 'tipo' => $Pagina->tipo ]) }}">
                                <div class="col-sm-4">
                                    <img src="{{ $Pagina->getAvatarUrl() }}" alt="{{ $Pagina->nome }}">
                                </div>
                                <div class="col-sm-8">
                                    {{ $Pagina->nome }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <li><a href="{{ url('paginas/gerenciar') }}">{{ trans('global.lbl_seemore1') }}</a> </li>
                    @endif
                    <li class="subsubmenu">
                        <ul>
                            <li>
                                <a href="{{ url('paginas/criarpagina') }}">
                                    <i class="fa fa-plus"></i>
                                    <span> {{ trans('global.lbl_page_create') }} </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('paginas/gerenciar') }}">
                                    <i class="fa fa-star"></i> 
                                    <span>{{ trans('global.lbl_page_manage') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="subsubmenu">
                        <ul>
                            <li>
                                <a href="{{ url('vagas/create') }}">
                                    <i class="fa fa-plus"></i>
                                    <span> {{ trans('global.lbl_causa_create') }} </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('perfil') }}">
                            <i class="fa fa-user"></i>
                            <span>{{ trans('global.lbl_profile') }}</span>
                        </a>
                    </li>
                    
                    {{--
                    <li><a href="{{ url('config') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ trans('global.lbl_setting_') }}</span>
                    </a></li>
                    --}}

                    <li><a href="{{ url('/auth/logout') }}">
                            <i class="fa fa-power-off"></i>
                            <span>{{ trans('global.lbl_logout') }}</span>
                    </a></li>
                </ul>
            </a>
        </li>
        @endif
    </ul>
</div>
