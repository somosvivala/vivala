<div class="logo-menu">
	<a class="navbar-brand logo beta click-img-no-border" href="{{ url('home') }}"><img src="/logo.png" alt='{{ trans("global.alt_vivala") }}' title='{{ trans("global.title_vivala") }}'></a>
</div>

<div class="menu-principal">
	<div class="hidden-xs hidden-md hidden-sm col-lg-4">
            &nbsp;
		<input class="busca-geral-menu hide" placeholder='{{ trans("global.lbl_search_type_here") }}' type="search">
	</div>
	<ul class="col-xs-12 col-sm-12 col-md-12 col-lg-8 nav navbar-nav lista-intervalo-preto">
		@if (Auth::guest())
			<li class="col-sm-4"><a href="{{ url('/auth/login') }}">{{ trans('global.lbl_login') }}</a></li>
			<li><a href="{{ url('/auth/register') }}">{{ trans('global.lbl_signup') }}</a></li>
		@else
			<li class="menu-viajar">
				<a href="{{ url('/viajar') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-viajar vi"></i>
					<span>{{ trans('global.lbl_wanna_travel') }}</span>
				</a>
			</li>
			<li class="menu-conectar">
				<a href="{{ url('/conectar') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-conectar vi"></i>
					<span>{{ trans('global.lbl_wanna_connect') }}</span>
				</a>
			</li>
			<li class="menu-cuidar">
				<a href="{{ url('/cuidar') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-transformar vi"></i>
					<span>{{ trans('global.lbl_wanna_volunteer') }}</span>
				</a>
			</li>
		@endif
	</ul>
</div>

<div class="notificacoes">
	<button type="button" id="notificacoes-follow" data-unread="0" title='{{ trans("global.lbl_follower_") }}'>
		<i class="icon-menu-notificacao icon-vivala-menu-usuario vi" alt='{{ trans("global.lbl_follower_") }}'></i>
  </button>
	<div class="notificacoes-follow">
	    @include('_notificacoesFollow')
	</div>
	<button type="button" id="notificacoes-msg" data-unread="0" title='{{ trans("global.lbl_message_") }}'>
		<i class="icon-menu-notificacao icon-vivala-menu-chat vi" alt='{{ trans("global.lbl_message_") }}'></i>
  </button>
  <div class="notificacoes-msg">
      @include('_notificacoesMsg')
  </div>
	<button type="button" id="notificacoes-geral" data-unread="0" title='{{ trans("global.lbl_notification_") }}'>
		<i class="icon-menu-notificacao icon-vivala-menu-brasil vi" alt='{{ trans("global.lbl_notification_") }}'></i>
  </button>
  <div class="notificacoes-geral">
      @include('_notificacoesGeral')
  </div>
</div>

<div class="menu-usuario">
    <ul class="nav navbar-nav">
        @if (Auth::user())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <div class="pull-left hello hidden-xs hidden-sm hidden-md">
									{{ trans('global.lbl_hello') }} {{ Auth::user()->entidadeAtiva->apelido }}
								</div>
                <div class="round foto quadrado3em foto-perfil-topo">
                    <div class="avatar-img" style="background-image:url('{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}')">
                        </div>
                </div>

                <ul class="dropdown-menu submenu" role="menu">
                    @if( (isset($paginas) && count($paginas) > 0 ) || strtolower(Auth::user()->entidadeAtiva->tipo) != "perfil")
                        <li>
													<p>{{ trans('global.lbl_use_as')}}:</p>
												</li>
                    @endif
                    {{-- Se a entidade ativa não for um perfil lista o perfil para ativar --}}
                    @if ( strtolower(Auth::user()->entidadeAtiva->tipo) != "perfil" )
                      <li class="row">
                        <a href="{{ action('PaginaController@getAcessarcomo', ['id' => Auth::user()->perfil->id , 'tipo' => 'perfil' ]) }}" class="click-img-no-border">
                          <div class="col-sm-4">
                            <div class="round foto quadrado3em foto-perfil pull-right">
                                <div class="avatar-img" style="background-image:url('{{ Auth::user()->perfil->getAvatarUrl() }}')">
                                    </div>
                            </div>
                          </div>
                          <div class="col-sm-8">
                              {{ Auth::user()->perfil->apelido }}
                          </div>
                        </a>
                      </li>
                    @endif
                    @if( isset($paginas) && count($paginas) > 0 )
                    <li class="row">
                        <ul class="paginas">
                        @foreach($paginas as $Pagina)
                          <li class="row">
                            <a href="{{ action('PaginaController@getAcessarcomo', ['id' => $Pagina->id , 'tipo' => $Pagina->tipo ]) }}" class="click-img-no-border">
                              <div class="col-sm-4">
                                <div class="round foto quadrado3em foto-perfil pull-right">
                                    <div class="avatar-img" style="background-image:url('{{ $Pagina->getAvatarUrl() }}')">
                                        </div>
                                </div>
                              </div>
                              <div class="col-sm-8">
                                  {{ $Pagina->nome }}
                              </div>
                            </a>
                          </li>
                        @endforeach
                        @if( count($paginas) > 3 )
                            <li class="margin-t-1 margin-b-1"><a href="{{ url('paginas/gerenciar') }}" class="click-img-no-border">{{ trans('global.lbl_seemore') }}</a>
                        @endif
                        </ul>
                    </li>
										</li>
                    @endif
                    <li class="subsubmenu">
                        <ul>
                          <li><a href="{{ url('paginas/criarpagina') }}" class="click-img-no-border"><i class="fa fa-plus"></i><span> {{ trans('global.lbl_page_create') }}</span></a></li>
                          <li><a href="{{ url('paginas/gerenciar') }}" class="click-img-no-border"><i class="fa fa-star"></i><span> {{ trans('global.lbl_page_manage') }}</span></a></li>
                        </ul>
                    </li>
                    <li class="subsubmenu">
                        <ul>
                            <li><a href="{{ url('vagas/create') }}" class="click-img-no-border"><i class="fa fa-heart"></i><span> {{ trans('global.lbl_cause_create') }}</span></a></li>
                        </ul>
                    </li>
                    <li class="subsubmenu">
                        <ul>
                            <li><a href="{{ url('/quiz') }}" class="click-img-no-border"><i class="fa fa-comment"></i><span> Quiz</span></a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('perfil') }}" class="click-img-no-border"><i class="fa fa-user"></i><span> {{ trans('global.lbl_profile') }}</span></a></li>
										{{--
                    <li><a href="{{ url('config') }}" class="click-img-no-border"><i class="fa fa-cogs"></i><span> {{ trans('global.lbl_setting_') }}</span></a></li>
										--}}
                    <li><a href="{{ url('/auth/logout') }}" class="click-img-no-border"><i class="fa fa-power-off"></i><span> {{ trans('global.lbl_logout') }}</span></a></li>
                </ul>
            </a>
        </li>
        @endif
    </ul>
</div>
