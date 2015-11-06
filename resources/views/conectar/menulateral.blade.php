<h4 class="suave">{{ trans('global.lbl_you_are_in')}}<br/>{{ trans('global.lbl_wanna_connect') }}!</h4>
<nav class="menu-lateral">
	<ul>
		<li><a href="/perfil" class="click-img-no-border"><i class="fa fa-clock-o"></i>{{ trans('global.lbl_timeline') }}</a></li>
		<li><a href="/perfilviajante" class="click-img-no-border"><i class="fa fa-user"></i>{{ trans('global.lbl_traveller_profile') }}</a></li>
		<li><a href="/diarioviagem" class="click-img-no-border"><i class="fa fa-book"></i>{{ trans('global.lbl_travel_log') }}</a></li>
		<li><a href="/roteiros" class="click-img-no-border"><i class="fa fa-map"></i>{{ trans('global.lbl_travel_guide_') }}</a></li>
		<li><a href="/lembrancas" class="click-img-no-border"><i class="fa fa-photo"></i>{{ trans('global.lbl_memorie_') }}</a></li>
		<li><a href="/avaliacoes" class="click-img-no-border"><i class="fa fa-star"></i>{{ trans('global.lbl_review_') }}</a></li>
		<li><a href="/culturabrasileira" class="click-img-no-border"><i class="fa fa-paint-brush"></i>{{ trans('global.lbl_brazilian_culture') }}</a></li>
		<li><a href="/perfilvoluntario" class="click-img-no-border"><i class="fa fa-hand-paper-o"></i>{{ trans('global.lbl_volunteer_profile') }}</a></li>
	</ul>
</nav>
<h4 class="suave">{{ trans('global.lbl_connect_with_friends') }}</h4>
<nav class="menu-lateral">
	<ul>
		<li><a href="/perfil" class="click-img-no-border desativado"><i class="fa fa-newspaper-o"></i>{{ trans('global.lbl_latest_news') }}</a></li>
		<li><a href="/chat" class="click-img-no-border desativado"><i class="fa fa-comment-o"></i>{{ trans('global.lbl_chat_with_friends') }}</a></li>
                <li>
                    <a data-toggle="modal" data-target="#modal-feedback" href="#" class="click-img-no-border ">
                        <i class="fa fa-check-circle-o"></i>{{ trans('global.lbl_feedback_give_yours') }}
                    </a>
                    @include('_feedback')            
                </li>
	</ul>
</nav>
