
<div class="row perfil-topo">
	<div class="col-md-1">
		&nbsp;

		@if ($perfil->user->id == Auth::user()->id)
			<a class="link-claro edit-profile" href="{{ url($perfil->tipo.'/'.$perfil->id.'/edit') }}">
				<i class="fa fa-edit"></i> {{ trans('global.lbl_edit') }}
			</a>
		@endif
	</div>
	<div class="col-md-4">
		<div class="row perfil-title">
			<h1 class="col-sm-6 font-bold-upper">
				{{ $perfil->apelido }}
			</h1>
			<span class="col-sm-6">
				@if($perfil->cidade_atual)
					<i class="fa fa-map-marker"></i> {{ trans('global.lbl_live_in') }} {{ $perfil->cidade_atual }}
				@endif
			</span>
		</div>
		<p class="col-sm-12 row">{{ $perfil->descricao_longa }}</p>
	</div>
	<div class="col-md-2">
		<div class="round foto">
			<div class="cover">
					<img src="{{ $perfil->getAvatarUrl() }}" alt="{{ $user->username }}">
			</div>
		</div>
	</div>
	<div class="col-md-4 font-bold-upper">
		<ul>
			<li class="col-sm-4">
				{{ $perfil->numeroSeguidores }} <br>
				{{ trans('global.lbl_follower_') }}
				<div class="col-sm-6 hidden">
                        {{--		<h3>{{ trans('global.lbl_followed_by') }}</h3>
					@forelse($followedBy as $perfil)
						<ul class="lista-usuarios">
							<li class="foto-user">
								<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="{{ $perfil->user->username }}">
									<img src="{{ $perfil->getAvatarUrl() }}" alt="{{ $perfil->user->username }}">
								</a>
							</li>
						</ul>
					@empty
					    <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
                                            @endforelse
                                        --}}
				</div>
			</li>
			<li class="col-sm-4">
				{{ $perfil->numeroSeguindo }} <br>
				{{ trans('global.lbl_following') }}
				<div class="col-sm-6 hidden">
                        {{--		<h3>{{ trans('global.lbl_following') }}</h3>
					@forelse($follow as $perfil)
						<ul class="lista-usuarios">
							<li class="foto-user">
								<a href="{{ url($perfil->prettyUrl->first()->url) }}" title="{{ $perfil->user->username }}">
									<img src="{{ $perfil->getAvatarUrl() }}" alt="{{ $perfil->user->username }}">
								</a>
							</li>
						</ul>
					@empty
					    <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
					@endforelse
                        --}}
                                </div>
			</li>
			<li class="col-sm-4"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><br>{{ trans('global.lbl_traveller') }}</li>
		</ul>
		<ul class="margin-0">
                        <li class="col-sm-6"><a href="{{ $perfil->tipo == 'ong'?url('ongs/sobre/'.$perfil->id):'' }}">Saiba mais coisas</a></li>
                        <li class="col-sm-6"><a href="#" class="desativado">{{ trans('global.lbl_message_send') }}m</a></li>
		</ul>
	</div>
	<div class="col-md-1">
	</div>

</div>
