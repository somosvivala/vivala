<div class="col-sm-1 menu-esquerda">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="{{ url('home') }}">Vivalá</a>
</div>

<div class="col-sm-9 menu-principal">
	<ul class="nav navbar-nav">
		@if (Auth::guest())
			<li><a href="{{ url('/auth/login') }}">{{ trans("menu.login") }}</a></li>
			<li><a href="{{ url('/auth/register') }}">{{ trans("menu.signup") }}</a></li>
		@else
			<li><a href="{{ url('perfil') }}">{{ trans("menu.profile") }}</a></li>
			<li><a href="{{ url('/viajar') }}">{{ trans("menu.trips") }}</a></li>
			<li><a href="{{ url('/conectar') }}">{{ trans("menu.social") }}</a></li>
			<li><a href="{{ url('/cuidar') }}">{{ trans("menu.ongs") }}</a></li>
			<li><a href="{{ url('/auth/login') }}">{{ trans("menu.more") }}</a></li>
			<li><a href="{{ url('/auth/login') }}">{{ trans("menu.contact") }}</a></li>
			<li><a href="{{ url('/auth/login') }}">{{ trans("menu.search") }}</a></li>
		@endif
	</ul>
</div>

<div class="col-sm-2 menu-direita">
	<ul class="nav navbar-nav ">
		@if (Auth::user())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ trans("menu.hello") }} {{ Auth::user()->username }}
					<img src="{{ Auth::user()->perfil->getAvatarUrl() }}" alt="{{ Auth::user()->username }}">
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
