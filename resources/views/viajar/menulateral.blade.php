{{-- Quero Viajar - Menu Principal --}}
	<h4 class="suave tour-pilar-viajar-step1">{{ trans('global.lbl_you_are_in')}}<br/>{{ trans('global.lbl_wanna_travel') }}!</h4>
	<nav class="menu-lateral">
		<ul>
			<li><a href="/viajar" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-casa vi"></i>{{  trans('global.lbl_homepage') }}</a></li>
			{{-- DESATIVADO TEMPORARIAMENTE
			<!-- li><a class="click-img-no-border" href="/montarviagem"><i class="icon-menu-lateral icon-vivala-binoculos cinza-morto vi"></i>{{ trans('global.lbl_travel_setup') }}</a></li>
			<li><a class="click-img-no-border" href="/verpacotes"><i class="icon-menu-lateral icon-vivala-olhos cinza-morto vi"></i>{{ trans('global.wannatravel_route_see_') }}</a></li>
			<li><a class="click-img-no-border" href="/meusfavoritos"><i class="icon-menu-lateral icon-vivala-coracao cinza-morto vi"></i>{{ trans('global.lbl_wishlist') }}</a></li>
			<li><a class="click-img-no-border" href="/minhascompras"><i class="icon-menu-lateral icon-vivala-mochila cinza-morto vi"></i>{{ trans('global.lbl_purchase_my_') }}</a></li>
			<li><a class="click-img-no-border" href="/meuspontos"><i class="icon-menu-lateral icon-vivala-estrela cinza-morto vi"></i>{{ trans('global.lbl_point_my_') }}</a></li>
			<li><a class="click-img-no-border" href="/buscasrecentes"><i class="icon-menu-lateral icon-vivala-lupa cinza-morto vi"></i>{{ trans('global.lbl_search_recent_') }}</a></li-->
		--}}
		</ul>
	</nav>
{{-- Ultimas Notícias e Chat --}}
	<h4 class="suave">{{ trans('global.lbl_connect_with_friends') }}</h4>
	<nav class="menu-lateral">
		<ul>
	    <li><a href="/paginas/ultimasnoticias" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-jornal vi"></i>{{ trans('global.lbl_latest_news') }}</a></li>
			{{-- DESATIVADO TEMPORARIAMENTE
			<!--li><a href="/chat" class="click-img-no-border desativado"><i class="icon-menu-lateral icon-vivala-chat vi"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li-->
			--}}
			<li><a  data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border "><i class="icon-menu-lateral icon-vivala-check-preenchido vi"></i>{{ trans('global.lbl_feedback_give_yours') }}</a>
					@include('_feedback')
	    </li>
		</ul>
	</nav>
{{-- Facebook Like-Page Menu --}}
	<h4 class="suave">{{ trans('global.social_network_facebook') }}</h4>
	<nav class="menu-lateral">
		<div class="fb-page" data-href="https://www.facebook.com/somosvivala" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
			<div class="fb-xfbml-parse-ignore">
				<blockquote cite="https://www.facebook.com/somosvivala">
					<a href="https://www.facebook.com/somosvivala">{{ trans('global.lbl_vivala') }}</a>
				</blockquote>
			</div>
		</div>
	</nav>
