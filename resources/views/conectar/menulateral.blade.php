{{-- Quero Conectar - Menu Principal --}}
<nav class="menu-lateral">
	<h4 class="suave tour-pilar-conectar-step1">{{ trans('global.lbl_you_are_in')}}<br>{{ trans('global.lbl_wanna_connect') }}!</h4>
	<ul>
		<li class="tour-pilar-conectar-step3"><a href="/perfil" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-relogio vi"></i>{{ trans('global.lbl_timeline') }}</a></li>
		{{-- DESATIVADO TEMPORARIAMENTE
		<!--li><a href="/perfilviajante" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-usuario cinza-morto vi"></i></i>{{ trans('global.lbl_traveller_profile') }}</a></li>
		<li><a href="/diarioviagem" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-livro cinza-morto vi"></i>{{ trans('global.lbl_travel_log') }}</a></li>
		<li><a href="/roteiros" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-mapa cinza-morto vi"></i>{{ trans('global.lbl_travel_guide_') }}</a></li>
		<li><a href="/lembrancas" class="click-img-no-border"><i class="icon-menu-lateral  icon-vivala-foto cinza-morto vi"></i>{{ trans('global.lbl_memorie_') }}</a></li>
		<li><a href="/avaliacoes" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-estrela cinza-morto vi"></i>{{ trans('global.lbl_review_') }}</a></li>
		<li><a href="/culturabrasileira" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-mascaras cinza-morto vi"></i>{{ trans('global.lbl_brazilian_culture') }}</a></li>
		<li><a href="/perfilvoluntario" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-mao cinza-morto vi"></i>{{ trans('global.lbl_volunteer_profile') }}</a></li-->
		--}}
	</ul>
</nav>

{{-- Ultimas Notícias e Chat --}}
<nav class="menu-lateral">
	<h4 class="suave">{{ trans('global.lbl_connect_with_friends') }}</h4>
	<ul class="tour-pilar-conectar-step6">
		<li>
			<a href="/paginas/ultimasnoticias" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-jornal vi"></i>{{ trans('global.lbl_latest_news') }}</a>
		</li>
		{{-- DESATIVADO TEMPORARIAMENTE
		<!--li><a href="/chat" class="click-img-no-border desativado"><i class="icon-menu-lateral icon-vivala-chat vi"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li-->
		--}}
		<li>
			<a data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border "><i class="icon-menu-lateral icon-vivala-check-preenchido vi"></i>{{ trans('global.lbl_feedback_give_yours') }}</a>
        @include('modals._feedback')
    </li>
	</ul>
</nav>

{{-- Redes Sociais --}}
<nav class="menu-lateral tour-pilar-conectar-step7 margin-t-2">
	<h4 class="suave">{{ trans('global.lbl_stay_close') }}</h4>
	{{-- Facebook --}}
		<nav id="menu-fb" class="menu-lateral margin-t-2 text-center">
			<h5 class="text-center texto-maiusculo">{{ trans('global.social_network_facebook') }}</h5>
			<div class="fb-page" data-href="{{ env('VIVALA_LINK_FACEBOOK') }}" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
				<div class="fb-xfbml-parse-ignore">
					<blockquote cite="{{ env('VIVALA_LINK_FACEBOOK') }}">
						<a href="{{ env('VIVALA_LINK_FACEBOOK') }}">{{ trans('global.lbl_vivala') }}</a>
					</blockquote>
				</div>
			</div>
		</nav>
	{{-- Instagram --}}
		<nav id="menu-ig" class="menu-lateral margin-t-2 text-center">
			<h5 class="texto-maiusculo">{{ trans('global.social_network_instagram') }}</h5>
			<a class="btn-ig-follow" href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank"><span class="btn btn-acao texto-maiusculo">{{ trans('global.lbl_follow') }}</span></a>
			<p class="text-center ajuste-fonte-avenir-light">@somosvivala</p>
			<div class="row">
				<div id="instafeed" class="col-sm-12">
				</div>
			</div>
		</nav>
</nav>
