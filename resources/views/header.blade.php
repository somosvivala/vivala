<div id="logo-vivala" class="logo-menu tour-pilares-step1">
  	{{-- SVG da logo VIVALÁ --}}
    @if( in_array(Request::url(), $arrayRotasInstituto) )
	<a class="navbar-brand logo click-img-no-border" href="{{ url('home') }}">
        <img src="{{ asset('vivala-instituto-logo-135x50.png') }}" width="100%" height="100%" title="{{ trans('global.title_instituto') }}" alt="{{ trans('global.title_instituto') }}"/>
    <a>
    @else
	<a class="navbar-brand logo beta click-img-no-border" href="{{ url('home') }}">
        <img src="{{ asset('vivala-logo.svg') }}" width="100%" height="100%" title="{{ trans('global.title_vivala') }}" alt="{{ trans('global.alt_vivala') }}"/>
	</a>
    @endif
</div>

<div class="menu-principal">
	<div class="hidden-xs hidden-sm col-lg-4">
		{{-- BARRA BUSCA - TEMPORÁRIO pra mostrar só em CONECTAR, mandar uma variável pra view pra dizer em qual pilar estamos seria o mais ideal --}}
		@if(Request::url() === url('/conectar'))
			<input data-url="{{ url() }}" id="busca-geral-menu" class="busca-geral-menu" placeholder="{{ trans('global.lbl_search_type_here') }}" type="search">
				<i class="fa fa-spinner fa-pulse loading-search soft-hide laranja" aria-hidden="true"></i>
		@elseif(Request::url() === url('/perfil'))
			<input data-url="{{ url() }}" id="busca-geral-menu" class="busca-geral-menu" placeholder="{{ trans('global.lbl_search_type_here') }}" type="search">
				<i class="fa fa-spinner fa-pulse loading-search soft-hide laranja" aria-hidden="true"></i>
		@elseif(Request::url() === url('/paginas/ultimasnoticias'))
			<input data-url="{{ url() }}" id="busca-geral-menu" class="busca-geral-menu" placeholder="{{ trans('global.lbl_search_type_here') }}" type="search">
				<i class="fa fa-spinner fa-pulse loading-search soft-hide laranja" aria-hidden="true"></i>
		@endif
	</div>
	<ul id="tres-menus-vivala" class="col-xs-12 col-sm-12 col-md-12 col-lg-8 nav navbar-nav lista-intervalo-preto tour-pilares-step2">
		@if (Auth::guest())
    		<li class="col-sm-4"><a href="{{ url('/auth/login') }}">{!! trans('global.lbl_login') !!}</a></li>
  			<li><a href="{{ url('/auth/register') }}">{!! trans('global.lbl_signup') !!}</a></li>
		@else
			<li id="menu-viajar" class="menu-viajar tour-pilares-step3">
				<a href="{{ url('/viajar') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-viajar vi"></i>
					<span>{!! trans('global.lbl_wanna_travel') !!}</span>
				</a>
			</li>
			<li id="menu-conectar" class="menu-conectar tour-pilares-step4">
				<a href="{{ url('/conectar') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-conectar vi"></i>
					<span>{!! trans('global.lbl_wanna_connect') !!}</span>
				</a>
			</li>
			<li id="menu-cuidar" class="menu-cuidar tour-pilares-step5">
				<a href="{{ url('/instituto') }}" class="click-img-no-border">
					<i class="icon-menu-principal icon-vivala-quero-transformar vi"></i>
					<span>{!! trans('global.lbl_wanna_volunteer') !!}</span>
				</a>
			</li>
		@endif
	</ul>
</div>

<div id="menu-notificacoes" class="notificacoes padding-l-2">
	<button type="button" id="notificacoes-follow" class="tour-pilares-step6" data-unread="0" title='{{ trans("global.lbl_follower_") }}'>
		<i class="icon-menu-notificacao icon-vivala-menu-usuario vi" alt='{{ trans("global.lbl_follower_") }}'></i>
  </button>
	<div class="notificacoes-follow">
	    @include('_notificacoesFollow')
	</div>
	{{-- DESATIVADO TEMPORARIAMENTE
		<button type="button" id="notificacoes-msg" class="tour-pilares-step7" data-unread="0" title='{{ trans("global.lbl_message_") }}'>
			<i class="icon-menu-notificacao icon-vivala-menu-chat vi" alt='{{ trans("global.lbl_message_") }}'></i>
    </button>
    <div class="notificacoes-msg">
          @include('_notificacoesMsg')
    </div>
  --}}
    <button type="button" id="notificacoes-geral" class="tour-pilares-step8" data-unread="0" title='{{ trans("global.lbl_notification_") }}'>
      <i class="icon-menu-notificacao icon-vivala-menu-brasil vi" alt='{{ trans("global.lbl_notification_") }}'></i>
    </button>
    <div class="notificacoes-geral">
    	@include('_notificacoesGeral')
    </div>
    {{-- Botão de HINTS [TODO] para o TOUR interno da plataforma (?) - senão remover --}}
    <button type="button" id="notificacoes-ajuda" class="tour-pilares-step9" data-unread="0" title='{{ trans("global.lbl_help") }}'>
      <i class="icon-menu-notificacao icon-menu--notificacao-fontawesome-fix fa fa-question" alt='{{ trans("global.lbl_help") }}'></i>
    </button>
</div>

<div id="menu-usuario" class="menu-usuario tour-pilares-step10 tour-pilar-cuidar-step5">
    <ul class="nav navbar-nav">
        @if (Auth::user())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <div class="pull-left hello hidden-xs hidden-sm hidden-md">
									{!! trans('global.lbl_hello') !!} {{ Auth::user()->entidadeAtiva->apelido }}
								</div>
                <div class="round foto quadrado3em foto-perfil-topo">
                    <div class="avatar-img" style="background-image:url('{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}')">
                        </div>
                </div>

                <ul class="dropdown-menu submenu" role="menu">
                    @if( (isset($paginas) && count($paginas) > 0 ) || strtolower(Auth::user()->entidadeAtiva->tipo) != "perfil")
                        <li><p>{!! trans('global.lbl_use_as') !!}:</p></li>
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
                    @if(isset($paginas) && count($paginas) > 0)
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
                            <li class="margin-t-1 margin-b-1"><a href="{{ url('paginas/gerenciar') }}" class="click-img-no-border">{!! trans('global.lbl_seemore') !!}</a>
                        @endif
                        </ul>
                    </li>								</li>
                    @endif
                    <li class="subsubmenu">
                        <ul>
                          <li><a href="{{ url('paginas/criarpagina') }}" class="click-img-no-border"><i class="fa fa-plus"></i><span> {!! trans('global.lbl_page_create') !!}</span></a></li>
                          <li><a href="{{ url('paginas/gerenciar') }}" class="click-img-no-border"><i class="fa fa-star"></i><span> {!! trans('global.lbl_page_manage') !!}</span></a></li>
                        </ul>
                    </li>
                    @if(count(Auth::user()->ongs) > 0)
                        <li class="subsubmenu">
                            <ul>
                                <li><a href="{{ url('vagas/create') }}" class="click-img-no-border"><i class="fa fa-heart"></i><span> {!! trans('global.lbl_cause_create') !!}</span></a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="subsubmenu">
                        <ul>
                            <li><a href="{{ url('/quiz') }}" class="click-img-no-border"><i class="fa fa-comment"></i><span> Quiz</span></a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('perfil') }}" class="click-img-no-border"><i class="fa fa-user"></i><span> {!! trans('global.lbl_profile') !!}</span></a></li>
										{{--
                    <li><a href="{{ url('config') }}" class="click-img-no-border"><i class="fa fa-cogs"></i><span> {!! trans('global.lbl_setting_') !!}</span></a></li>
										--}}


                    @if(Auth::user()->isAdmin())
                    <li><a href="{{ url('gestao/home') }}" class="click-img-no-border"><i class="fa fa-lightbulb-o"></i><span> {!! trans('global.lbl_management') !!}</span></a></li>
                    @endif

                    <li><a href="{{ url('/auth/logout') }}" class="click-img-no-border"><i class="fa fa-power-off"></i><span> {{ trans('global.lbl_logout') }}</span></a></li>
                </ul>
            </a>
        </li>
        @endif
    </ul>
</div>
