{{-- Quero Cuidar - Menu Principal --}}
	<h4 class="suave tour-pilar-cuidar-step1">{{ trans('global.lbl_you_are_in')}}<br/>{{ trans('global.lbl_wanna_volunteer') }}!</h4>
	<nav class="menu-lateral">
		<ul>
			<li class="tour-pilar-cuidar-step2"><a href="/ongs" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-coracao-caridoso vi"></i>{{ trans('global.lbl_project_') }}</a></li>
	    <li class="tour-pilar-cuidar-step3"><a href="/vagas" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-bandeira vi"></i>{{ trans('global.lbl_ong_slot_') }}</a></li>
			<li><a href="/paginas/criarpagina" class="click-img-no-border"><i class="icon-menu-lateral fa fa-2x fa-pencil"></i>{{ trans('global.wannavolunteer_menu_create_your_project') }}</a></li>
			{{-- DESATIVADO TEMPORARIAMENTE
			<!--li><a href="/cuidar" class="click-img-no-border"><i class="icon-menu-lateral icon-vivala-casa vi"></i>{{ trans('global.lbl_homepage') }}</a></li>
			<li><a href="/paginas/porquecuidar" class="click-img-no-border desativado"><i class="icon-menu-lateral icon-vivala-usuario-em-duvida vi cinza-morto"></i>{{ trans('global.lbl_why_care') }}</a></li>
	    <li><a href="/resultados" class="click-img-no-border"><i class="icon-menu-lateral vi icon-vivala-relatorio cinza-morto"></i>{{ trans('global.lbl_result_') }}</a></li>
	    <li><a href="/mapadobem" class="click-img-no-border"><i class="icon-menu-lateral vi icon-vivala-mapa-do-bem cinza-morto"></i>{{ trans('global.lbl_map_goodness') }}</a></li-->
			--}}
		</ul>
	</nav>
{{-- Ultimas Notícias e Chat --}}
	<h4 class="suave">{{ trans('global.lbl_connect_with_volunteers') }}</h4>
	<nav class="menu-lateral">
		<ul>
			<li><a href="/paginas/ultimasnoticias" class="click-img-no-border"><i class="icon-menu-lateral vi icon-vivala-jornal"></i>{{ trans('global.lbl_latest_news') }}</a></li>
			{{-- DESATIVADO TEMPORARIAMENTE
			<!--li><a href="/chat" class="click-img-no-border desativado"><i class="icon-menu-lateral icon-vivala-chat vi"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li-->
			--}}
      <li><a data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border "><i class="icon-menu-lateral vi icon-vivala-check-preenchido"></i>{{ trans('global.lbl_feedback_give_yours') }}</a>
          @include('_feedback')
      </li>
		</ul>
	</nav>
	{{-- Redes Sociais --}}
		<h4 class="suave">{{ trans('global.lbl_stay_close') }}</h4>
		{{-- Facebook --}}
		<nav class="menu-lateral tour-pilar-conectar-step7 margin-t-2">
			<h5 class="text-center texto-maiusculo">{{ trans('global.social_network_facebook') }}</h5>
			<div class="fb-page" data-href="https://www.facebook.com/somosvivala" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
				<div class="fb-xfbml-parse-ignore">
					<blockquote cite="https://www.facebook.com/somosvivala">
						<a href="https://www.facebook.com/somosvivala">{{ trans('global.lbl_vivala') }}</a>
					</blockquote>
				</div>
			</div>
		</nav>
		{{-- Instagram --}}
		<nav class="menu-lateral margin-t-2">
			<h5 class="text-center texto-maiusculo">{{ trans('global.social_network_instagram') }}</h5>
			<p class="text-center ajuste-fonte-avenir-light">@somosvivala</p>
			<div class="row">
				<div id="instafeed" class="col-sm-12">
				</div>
			</div>
		</nav>
