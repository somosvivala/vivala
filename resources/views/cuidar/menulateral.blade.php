{{-- Menu Principal --}}
<h4 class="suave">{{ trans('global.lbl_you_are_in')}}<br/>{{ trans('global.lbl_wanna_volunteer') }}!</h4>
<nav class="menu-lateral">
	<ul>
		<li><a href="/cuidar" class="click-img-no-border"><i class="fa fa-home"></i>{{ trans('global.lbl_homepage') }}</a></li>
		<li><a href="/ongs" class="click-img-no-border"><i class="fa fa-heart"></i>{{ trans('global.lbl_project_') }}</a></li>
    <li><a href="/vagas" class="click-img-no-border"><i class="fa fa-flag"></i>{{ trans('global.lbl_ong_slot_') }}</a></li>
    <li><a href="/paginas/porquecuidar" class="click-img-no-border desativado"><i class="fa fa-question cinza-morto"></i>{{ trans('global.lbl_why_care') }}</a></li>
    <li><a href="/resultados" class="click-img-no-border"><i class="fa fa-tasks cinza-morto"></i>{{ trans('global.lbl_result_') }}</a></li>
    <li><a href="/mapadobem" class="click-img-no-border"><i class="fa fa-map cinza-morto"></i>{{ trans('global.lbl_map_goodness') }}</a></li>
	</ul>
</nav>

{{-- Chat e Notícias --}}
<h4 class="suave">{{ trans('global.lbl_connect_with_volunteers') }}</h4>
<nav class="menu-lateral">
	<ul>
		<li><a href="/paginas/ultimasnoticias" class="click-img-no-border"><i class="fa fa-newspaper-o"></i>{{ trans('global.lbl_latest_news') }}</a></li>
		<li><a href="/chat" class="click-img-no-border desativado"><i class="fa fa-comment-o"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li>
        <li><a data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border "><i class="fa fa-check-circle-o"></i>{{ trans('global.lbl_feedback_give_yours') }}</a>
            @include('_feedback')
        </li>
	</ul>
</nav>

{{-- Facebook Like-Page Menu --}}
<h4 class="suave">{{ trans('global.social_network_facebook') }}</h4>
<nav class="menu-lateral">
	<div class="fb-page" data-href="https://www.facebook.com/somosvivala" data-width="250" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="https://www.facebook.com/somosvivala">
				<a href="https://www.facebook.com/somosvivala">{{ trans('global.lbl_vivala') }}</a>
			</blockquote>
		</div>
	</div>
</nav>
