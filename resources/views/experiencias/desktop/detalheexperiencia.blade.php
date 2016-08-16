@extends('viajar')

@section('content')
<div id="tour-pilares" class="pilar-viajar">

  {{--- Seção Quero Viajar - Foto de Capa --}}
    <div class="foto-fundo-bottom foto-header" style="background-image:url('/img/queroviajar.png');">
      <h2>{{ trans('global.wannatravel_title') }}</h2>
      <h3>{{ trans('global.wannatravel_subtitle') }}</h3>
      <div class="col-lg-12">
        <a class="suave padding-btn">{{ trans('global.lbl_how_it_works') }}</a>
      </div>
    </div>
  {{--- Fim da Seção Quero Viajar - Foto de Capa --}}

  {{--- Seção Quero Viajar - Miolo --}}
    <div class="col-lg-12 fundo-cheio tour-pilar-viajar-step2">
      <h3 class="text-center font-bold-upper">
        {{ trans('global.wannatravel_trip_already_know') }}
        <small class="sub-titulo">{{ trans('global.wannatravel_trip_setup') }}</small>
      </h3>
        <ul class="margin-t-2 margin-b-3 lista-border pesquisa-viajar">
          <div class="row row-eq-height">
            <li class="col-lg-3 tour-pilar-viajar-step3 active">
              <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
                {{ trans('global.wannatravel_trip_experiences') }}
              </a>
            </li>
            <li class="col-lg-3 tour-pilar-viajar-step4">
              <a class="rodoviario logger-ativo" href="#rodoviario" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="rodoviario" role="tab" data-toggle="tab">
                {{ trans('global.wannatravel_trip_bus_drive') }}
              </a>
            </li>
            <li class="col-lg-3 tour-pilar-viajar-step5">
              <a class="ativa-modal-quimera logger-ativo" href="#quimera" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" data-url="https://www.e-agencias.com.br/vivala">
                {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
              </a>
            </li>
            <li class="col-lg-3 tour-pilar-viajar-step6">
              <a class="restaurantes logger-ativo" href="#restaurantes" data-tipo="abasviajar_tipo_restaurantes" data-desc="abasviajar_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="restaurantes" role="tab" data-toggle="tab">
                {{ trans('global.wannatravel_trip_restaurants') }}
              </a>
            </li>
          </div>
        </ul>
        <div class="tab-content">
          <div id="experiencia" class="tab-pane active" role="tabpanel">
            <div class="row row-eq-height">
              <div class="col-lg-5">
                <div class="foto-img-interna-desktop" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                  <div class="categorias-experiencia">
                    @foreach($Experiencia->categorias as $Categoria)
                      <div class="icone">
                        <i class="fa-1-5x {{ $Categoria->icone }}" title="{{ $Categoria->nome }}" alt="{{ $Categoria->nome }}"></i>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-lg-7 descricao">
                <div class="row">
                  <span class="col-lg-12"><i class="fa fa-fw fa-clock-o"></i> {{ $Experiencia->frequencia }}</span>
                  <span class="col-lg-12"><i class="fa fa-fw fa-map-marker"></i> {{ $Experiencia->local->nome}} - {{ $Experiencia->local->estado->sigla }}</span>
                  <span class="col-lg-12"><i class="fa fa-fw fa-money"></i> R${{ $Experiencia->preco }}</span>
                  <span class="col-lg-12">{{ $Experiencia->descricao }}</span>
                    {!! Form::hidden('experiencia_tipo', $Experiencia->tipo) !!}
                    {!! Form::hidden('experiencia_id', $Experiencia->id) !!}
                    {!! Form::hidden('_token', csrf_token()) !!}


                </div>
              </div>
            </div>
            <div class="row">
              <span class="col-lg-12 negrito-exp margin-t-1">Data</span>
              @if($Experiencia->isEventoUnico)
                <div class="col-lg-12 informacoes">
                  <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">{{ $Experiencia->dataProximaOcorrencia }}</span>
                  </div>
                </div>
              @endif
              @if($Experiencia->isEventoRecorrente)
                <div class="col-lg-12 informacoes">
                  <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">
                        <input type="date" class="clndr-picker" placeholder="Escolha uma data" name="data-escolhida" readonly>
                        <div class="clndr-container">
                        </div>
                        <input type="hidden" id="json-eventos" value='{{ $Experiencia->proximasOcorrenciasJSON }}'>
                    </span>
                  </div>
                </div>
              @endif
              @if($Experiencia->isEventoServico)
                <div class="col-lg-12 informacoes">
                  <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">
                      <input type="date" class="clndr-picker" placeholder="Escolha uma data" name="data-escolhida" readonly>
                      <div class="clndr-container">
                      </div>
                      <input type="hidden" id="json-eventos" value='{{ $Experiencia->diasOperacionaisJSON }}'>
                    </span>
                  </div>
                </div>
              @endif
            </div>
            <div class="row">
              <span class="col-lg-12 margin-t-2 margin-b-1">Informações</span>
              <div class="col-lg-12">
                @foreach($Experiencia->informacoes as $Informacao)
                  <div class="col-lg-6 informacoes">
                    <div class="col-lg-2"><i class="{{ $Informacao->icone }}"></i></div>
                    <div class="col-lg-10">{{ $Informacao->descricao }}</div>
                  </div>
                @endforeach
              </div>
            </div>
            @if(!empty($Experiencia->detalhes))
              <div class="row">
                <span class="col-lg-12 margin-t-1 margin-b-1 negrito-exp">Detalhes da experiência</span>
                <span class="col-lg-12">{{ $Experiencia->detalhes }}</span>
              </div>
            @endif
            <div class="row">
              <div class="col-lg-12">
                <div style="padding:20px 15px; background-color:#ECEBEB; border-radius:15px; min-height:170px; height:170px; max-height:170px; min-width:450px; width:450px; max-width:450px; margin:40px auto 0; overflow:hidden;">
                    <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center; padding-right:10px;">
                      <a href="{{ url('/experiencias/'.$Experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                        <p style="margin-bottom: 0;">
                          <img src="{{ $Experiencia->getFotoOwnerUrlAttribute() }}" alt="{{ ucfirst($Experiencia->owner_nome) }}" title="{{ ucfirst($Experiencia->owner_nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px" style="border-radius:50%;"/>
                        </p>
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0; font-size:14px; line-height:18px;">
                          {{ $Experiencia->owner_nome }}
                        </p>
                      </a>
                      <p style="margin-top:10px; margin-bottom: 0;">
                        @if(!empty($Experiencia->owner->url_facebook))
                        <span><a href="https://facebook.com/{{ $Experiencia->owner->url_facebook }}" target="_blank" style="color:transparent!important;">
                          <img src="{{ asset('img/icones/png/cinza-mini-fb-circulo.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                        </a></span>
                        @endif
                        @if(!empty($Experiencia->owner->url_instagram))
                        <span><a href="https://instagram.com/{{ $Experiencia->owner->url_instagram }}" target="_blank" style="color:transparent!important;">
                          <img src="{{ asset('img/icones/png/cinza-mini-ig-circulo.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                        </a></span>
                        @endif
                        @if(!empty($Experiencia->owner->url_site))
                        <span><a href="http://{{ $Experiencia->owner->url_site = preg_replace('#^www\.(.+\.)#i', '$1', $Experiencia->owner->url_site) }}" target="_blank" min-width="17px" style="color:transparent!important;">
                          <img src="{{ asset('img/icones/png/cinza-mini-link-circulo.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                        </a></span>
                        @endif
                      </p>
                    </div>
                    <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
                        {{ $Experiencia->owner_descricao }}
                      </p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="row text-center padding-t-1 padding-b-2">
                @if($Experiencia->isUsuarioAtualInscrito)
                  {!! Form::hidden('_token', csrf_token()) !!}
                  <a class="btn btn-amarelo-aviso" href="/experiencias/checkout/{{ $Experiencia->id }}" onclick="event.preventDefault();">{!! trans('global.lbl_subscribed') !!}</a>
                  <a class="btn-cancelar-inscricao col-lg-12" data-id-inscricao="{{ $Experiencia->getInscricaoUsuario(Auth::user())->id }}" href="#" onclick="confirmaUsuarioCancelaInscricaoExperiencia(event)"><i class="fa fa-times-circle-o"></i> Cancelar Inscrição</a>
                @else
                  <a class="btn-verde btn btn-inscrevase-experiencia" href="/experiencias/checkout/{{ $Experiencia->id }}">Inscreva-se aqui</a>
                @endif
              </div>
            </div>
          </div>
          <div id="rodoviario" class="tab-pane" role="tabpanel">
            @include('clickbus.buscar')
            <div class="lista-rodoviario"></div>
          </div>
          <div id="restaurantes" class="tab-pane" role="tabpanel">
            {{-- @include('chefsclub.buscarestaurantes') --}}
            {{-- @include('modals._listarestaurantes') --}}
          </div>
        </div>
    </div>
  {{--- Fim da Seção Quero Viajar - Miolo --}}

  {{-- Modal com iframe pra fechamento de pedido das Experiências (VERIFICAR COM O ZORD USO DISSO) --}}
    @include('modals.experiencias.desktop._iframe')
  {{-- Fim da Modal --}}

</div>
@endsection
