<h4 class="suave">{{ trans('global.lbl_you_are_in')}}<br/>{{ trans('global.lbl_wanna_travel') }}!</h4>
<nav class="menu-lateral">
	<ul>
		<li><a href="/viajar" class="click-img-no-border"><i class="fa fa-home"></i>{{  trans('global.lbl_homepage') }}</a></li>
		<li><a class="click-img-no-border" href="/montarviagem"><i class="fa fa-binoculars cinza-morto"></i>{{ trans('global.lbl_travel_setup') }}</a></li>
		<li><a class="click-img-no-border" href="/verpacotes"><i class="fa fa-eye cinza-morto"></i>{{ trans('global.wannatravel_route_see_') }}</a></li>
		<li><a class="click-img-no-border" href="/meusfavoritos"><i class="fa fa-heart cinza-morto"></i>{{ trans('global.lbl_wishlist') }}</a></li>
		<li><a class="click-img-no-border" href="/minhascompras"><i class="fa fa-briefcase cinza-morto"></i>{{ trans('global.lbl_purchase_my_') }}</a></li>
		<li><a class="click-img-no-border" href="/meuspontos"><i class="fa fa-star cinza-morto"></i>{{ trans('global.lbl_point_my_') }}</a></li>
		<li><a class="click-img-no-border" href="/buscasrecentes"><i class="fa fa-search cinza-morto"></i>{{ trans('global.lbl_search_recent_') }}</a></li>
	</ul>
</nav>
<h4 class="suave">{{ trans('global.lbl_connect_with_friends') }}</h4>
<nav class="menu-lateral">
	<ul>
            <li><a href="/paginas/ultimasnoticias" class="click-img-no-border"><i class="fa fa-newspaper-o"></i>{{ trans('global.lbl_latest_news') }}</a>
            </li>
		<li><a href="/chat" class="click-img-no-border desativado"><i class="fa fa-comment-o"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li>
                <li>
                    <a  data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border ">
                        <i class="fa fa-check-circle-o"></i>{{ trans('global.lbl_feedback_give_yours') }}
                    </a>
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
