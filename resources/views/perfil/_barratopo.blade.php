
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
                <a  data-toggle="modal" data-target="#modal-seguidores">
                    {{ $perfil->numeroSeguidores }} <br>
                    {{ trans('global.lbl_follower_') }}
                </a>
                <div id="modal-seguidores" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">

                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="texto-preto">{{ trans('global.lbl_followed_by') }}</h3>
                                <ul class="lista-usuarios row">
                                @forelse($followedBy as $perfilSeguidor)
                                    <li class="foto-user col-sm-6 col-md-4 col-lg-3">
                                        <a href="{{ url($perfilSeguidor->prettyUrl->first()->url) }}" title="{{ $perfilSeguidor->user->username }}">
                                            <img src="{{ $perfilSeguidor->getAvatarUrl() }}" alt="{{ $perfilSeguidor->user->username }}">
                                            <h4 class="texto-preto">{{ $perfilSeguidor->apelido }}</h4>
                                        </a>
                                    </li>
                                @empty
                                <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
                                @endforelse
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li class="col-sm-4">
                <a  data-toggle="modal" data-target="#modal-seguindo">
                {{ $perfil->numeroSeguindo }} <br>
                {{ trans('global.lbl_following') }}
                </a>
                <div id="modal-seguindo" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">

                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="texto-preto">{{ trans('global.lbl_following') }}</h3>
                                <ul class="lista-usuarios row">
                                @forelse($follow as $perfilSeguindo)
                                    <li class="foto-user col-sm-6 col-md-4 col-lg-3">
                                        <a href="{{ url($perfilSeguindo->prettyUrl->first()->url) }}" title="{{ $perfilSeguindo->user->username }}">
                                            <img src="{{ $perfilSeguindo->getAvatarUrl() }}" alt="{{ $perfilSeguindo->user->username }}">
                                            <h4 class="texto-preto">{{ $perfilSeguindo->apelido }}</h4>

                                        </a>
                                    </li>
                                @empty
                                <p>{{ trans('global.lbl_followed_by_none') }} :(</p>
                                @endforelse
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li class="col-sm-4">@if( $perfil->tipo == 'ong' ) Projeto de impacto @else <br>{{ trans('global.lbl_traveller') }} @endif</li>
        </ul>
        <ul class="margin-0">
            <li class="col-sm-6"><a href="{{ $perfil->tipo == 'ong'?url('ongs/sobre/'.$perfil->id):'' }}">Saiba mais coisas</a></li>
            <li class="col-sm-6"><a href="#" class="desativado">{{ trans('global.lbl_message_send') }}m</a></li>
        </ul>
    </div>
    <div class="col-md-1">
    </div>

</div>
