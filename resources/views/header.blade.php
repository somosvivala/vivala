<div class="logo-menu">
	<a class="navbar-brand logo" href="{{ url('home') }}"><img src="/logo.png" alt="Vivalá" title="Vivalá"></a>
</div>

<div class="menu-principal">
	<div class="col-sm-4">
		<input class="busca-geral-menu" placeholder='{{ trans("menu.ph_searchbar") }}' type="search">
	</div>
	<ul class="col-sm-8 nav navbar-nav lista-intervalo-preto">
		@if (Auth::guest())
			<li class="col-sm-4"><a href="{{ url('/auth/login') }}">{{ trans("menu.login") }}</a></li>
			<li><a href="{{ url('/auth/register') }}">{{ trans("menu.signup") }}</a></li>
		@else
			<li class="menu-viajar">
				<a href="{{ url('/viajar') }}" class="desativado">
					<i class="icon36 icon-viajar"></i>
					<span>{{ trans("menu.trips") }}</span>
				</a>
			</li>
			<li class="menu-conectar">
				<a href="{{ url('/conectar') }}">
					<i class="icon36 icon-conectar"></i>
					<span>{{ trans("menu.social") }}</span>
				</a>
			</li>
			<li class="menu-cuidar">
				<a href="{{ url('/cuidar') }}" class="desativado">
					<i class="icon36 icon-cuidar"></i>
					<span>{{ trans("menu.ongs") }}</span>
				</a>
			</li>
		@endif
	</ul>
</div>

<div class="notificacoes">
        <button type="button" id="notificacoes-follow" data-unread="0"><img src="/images/iconperson.png" title="{{ trans("menu.follows") }}">
        </button>
        <div class="notificacoes-follow">
            @include('_notificacoesFollow')
        </div>

	<button type="button" id="notificacoes-msg" data-unread="0"><img src="/images/iconmsg.png" title="{{ trans("menu.messages") }}"></button>
        <div class="notificacoes-msg">
            @include('_notificacoesMsg')
        </div>
	<button type="button" id="notificacoes-geral" data-unread="0"><img src="/images/iconbr.png" title="{{ trans("menu.warns") }}"></button>
        <div class="notificacoes-geral">
            @include('_notificacoesGeral')
        </div>
</div>
<div class="menu-usuario">
    <ul class="nav navbar-nav">
        @if (Auth::user())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <div class="pull-left hello">{{ trans("menu.hello") }} {{ Auth::user()->entidadeAtiva->apelido }}</div>
                <img src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
                <ul class="dropdown-menu submenu" role="menu">
                    @if( isset($paginas) && count($paginas) > 0 )
                    <li> <span> Usar Vivalá como: </span> </li>
                    @foreach($paginas as $Pagina)
                    <li>{{ $Pagina->nome }}</li>
                    @endforeach
                    <li> Ver mais... </li>
                    @endif
                    <li class="subsubmenu">
                        <ul>
                            <li><i class="fa fa-plus"></i> <a href="/paginas/criarpagina">Criar página </a></li>
                            <li><i class="fa fa-gear"></i> Gerenciar páginas </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('perfil') }}">{{ trans("menu.profile") }}</a></li>
                    <li><a href="{{ url('config') }}">{{ trans("menu.config") }}</a></li>
                    <li><a href="{{ url('/auth/logout') }}">{{ trans("menu.logout") }}</a></li>
                </ul>
            </a>
        </li>
        @endif
    </ul>
</div>
