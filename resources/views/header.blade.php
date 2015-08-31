<div class="col-sm-2 menu-esquerda">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 	data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand logo" href="{{ url('home') }}"><img src="/logo.png" alt="Vivalá" title="Vivalá"></a>
</div>

<div class="col-sm-8 menu-principal">
	<div class="col-sm-4">
		<input class="busca-geral-menu" placeholder="Digite aqui sua busca" type="search">
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

<div class="col-sm-2">
	<button type="button">follows</button>
	<button type="button">msg</button>
	<button type="button">warns</button>
	<div class="menu-usuario">
		<ul class="nav navbar-nav">
			@if (Auth::user())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<div class="pull-left hello">{{ trans("menu.hello") }} {{ Auth::user()->entidadeAtiva->apelido }}</div>
						<img src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('perfil') }}">{{ trans("menu.profile") }}</a></li>
							<li><a href="{{ url('config') }}">{{ trans("menu.config") }}</a></li>
							<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						</ul>
					</a>
				</li>
			@endif
		</ul>
	</div>
</div>
