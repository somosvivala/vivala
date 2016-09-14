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
      {{-- Seção MENU SUPERIOR --}}
      <ul class="margin-t-2 margin-b-3 lista-border pesquisa-viajar">
        <div class="row row-eq-height">
          <li class="col-lg-3 tour-pilar-viajar-step3 active">
            <a class="experiencias" href="/experiencias">
              {{ trans('global.wannatravel_trip_experiences') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step4">
            <a class="ativa-modal-quimera logger-ativo" href="#quimera" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" data-url="https://www.e-agencias.com.br/vivala">
              {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step5">
            <a class="rodoviario logger-ativo" href="#rodoviario" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="rodoviario" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_bus_drive') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step6">
            <a class="restaurantes logger-ativo" href="/viajar#restaurantes" data-tipo="abasviajar_tipo_restaurantes" data-desc="abasviajar_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              {{ trans('global.wannatravel_trip_restaurants') }}
            </a>
          </li>
        </div>
      </ul>
      {{-- Fim da Seção MENU SUPERIOR --}}

      <div class="tab-content">
        <div id="experiencia" class="tab-pane active" role="tabpanel">
          <div class="col-lg-12">
            {{-- Seção de PREÇO/FREQUENCIA-DATAOCORRENCIA/LOCAL/ENDEREÇO EXPERIÊNCIA --}}
              <div class="row row-eq-height margin-b-1">
                <div class="col-lg-5">
                  <div class="foto-img-interna-desktop" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                    <div class="preco-interna-desktop">
                      R${{ $Experiencia->preco }}
                    </div>
                    {{-- TEMPORARIAMENTE DESATIVADO - ATÉ IMPLEMENTAÇÃO DO FILTRO DE CATEGORIAS --}}
                    <!--div class="categorias-interna-desktop">
                      <?php/* $contadorCategorias = 0; */?>
                      {{-- @foreach($Experiencia->categorias as $Categoria) --}}
                        <div class="icone">
                          <i class="fa-1-5x {{-- $Categoria->icone --}}" title="{{-- $Categoria->nome --}}" alt="{{-- $Categoria->nome --}}"></i>
                        </div>
                        {{-- A img do desktop/listagem só comporta 4 ícones por vez --}}
                        {{-- @if(++$contadorCategorias === 7) --}}
                          <?php/* break; */?>
                        {{-- @endif --}}
                      {{-- @endforeach --}}
                    </div-->
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="row infos-basicas-interna-desktop">
                    <div class="col-lg-12 text-left">
                        @if($Experiencia->isEventoUnico)
                        <p class="row margin-b-0">
                            <span class="col-lg-12 ajuste-fonte-avenir-black padding-l-0-5 experiencia-desktop-local">
                                {{ $Experiencia->dataProximaOcorrencia }}
                            </span>
                        </p>
                        @endif
                        @if($Experiencia->isEventoRecorrente)
                        <div class="row padding-t-1 calendario-row">
                            <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                            <span class="descricao-informacoes">
                                <input type="date" class="clndr-picker" placeholder="Escolha uma data" name="data-escolhida" readonly>
                                <div class="clndr-container">
                                </div>
                                <input type="hidden" id="json-eventos" value='{{ $Experiencia->proximasOcorrenciasJSON }}'>
                            </span>
                        </div>
                        @endif
                        @if($Experiencia->isEventoServico)                        <div class="col-xs-12 informacoes">
                            <div class="row padding-t-1i calendario-row">
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
                      <p class="row margin-b-0">
                        <span class="col-lg-1 text-center padding-l-0 padding-r-0">
                          <i class="fa fa-fw fa-map-marker experiencia-desktop-local-icone"></i>
                        </span>
                        <span class="col-lg-11 ajuste-fonte-avenir-black padding-l-0-5 experiencia-desktop-local">
                          {{ $Experiencia->local->nome }} - {{ $Experiencia->local->estado->sigla }}
                        </span>
                      </p>
                      <p class="row margin-b-0">
                        <!--<span class="col-lg-1 text-center padding-l-0 padding-r-0">
                          <i class="fa fa-fw fa-street-view experiencia-desktop-endereco-completo-icone"></i>
                      </span>-->
                        <span class="col-lg-11 ajuste-fonte-avenir padding-l-0-5 experiencia-desktop-endereco-completo">
                          {{ $Experiencia->endereco_completo }}
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            {{-- Fim da Seção de PREÇO/FREQUENCIA-DATAOCORRENCIA/LOCAL/ENDEREÇO EXPERIÊNCIA --}}

            {{-- Seção de DESCRIÇÃO DA EXPERIÊNCIA --}}
              <div class="row margin-b-1">
                <div class="col-lg-12">
                  <p class="text-justify margin-t-0 margin-b-0">
                    {{ $Experiencia->descricao }}
                  </p>
                </div>
              </div>
            {{-- Fim da Seção de DESCRIÇÃO DA EXPERIÊNCIA --}}

            {{-- Seção de INFORMAÇÕES DA EXPERIÊNCIA --}}
              <div class="row margin-t-1 margin-b-2">
                <div class="col-lg-12 text-left margin-b-0-5">
                  <span class="ajuste-fonte-futura-bold">Informações</span>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row row-eq-height margin-b-1">
                      <div class="col-lg-12">
                        {{-- Seção de INFORMAÇÕES BÁSICAS --}}
                        <div class="col-lg-6">
                            <i class="fa fa-fw fa-calendar-o pull-left"></i>
                            <span class="ajuste-fonte-avenir-roman">
                                {{ $Experiencia->frequencia }}
                            </span>
                        </div>
                          {{-- Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA [Opcional] --}}
                            @if($Experiencia->informacoes)
                              @foreach($Experiencia->informacoes as $Informacao)
                                <div class="col-lg-6">
                                  <i class="fa fa-fw {{ $Informacao->icone }}"></i>
                                  <span class="ajuste-fonte-avenir-roman">{{ $Informacao->descricao }}</span>
                                </div>
                              @endforeach
                            @endif
                          {{-- Fim da Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA [Opcional] --}}
                          {!! Form::hidden('experiencia_tipo', $Experiencia->tipo) !!}
                          {!! Form::hidden('experiencia_id', $Experiencia->id) !!}
                          {!! Form::hidden('_token', csrf_token()) !!}
                          {!! Form::hidden('user_logged_in', (Auth::user() != '') ) !!}
                        {{-- Fim da Seção de INFORMAÇÕES BÁSICAS --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {{-- Fim da Seção de INFORMAÇÕES DA EXPERIÊNCIA --}}

            {{-- Seção de DETALHES DA EXPERIÊNCIA [Opcional] --}}
              @if($Experiencia->detalhes)
                <div class="row margin-t-1 margin-b-2">
                  <div class="col-lg-12 text-left margin-b-0-5">
                    <span class="ajuste-fonte-futura-bold">Mais Detalhes</span>
                  </div>
                  <div class="col-lg-12">
                    <span class="ajuste-fonte-avenir-roman">{{ $Experiencia->detalhes }}</span>
                  </div>
                </div>
              @endif
            {{-- Fim da Seção de DETALHES DA EXPERIÊNCIA [Opcional] --}}

            {{-- Seção de DETALHES DA INSTITUIÇÃO/ONG/EMPRESA --}}
              <div class="row margin-b-2">
                <div class="col-lg-12">
                  <div class="col-lg-8 col-lg-offset-2">
                      <div class="row row-eq-height fundo-instituicao">
                        <div class="col-lg-4 text-center instituicao-secao-infos">
                          <div class="row">
                            <div class="col-lg-12 instituicao-secao-foto">
                              <a href="{{ url('/experiencias/'.$Experiencia->id) }}" target="_blank">
                                <img src="{{ $Experiencia->getFotoOwnerUrlAttribute() }}" alt="{{ ucfirst($Experiencia->owner_nome) }}" title="{{ ucfirst($Experiencia->owner_nome) }}" class="img-responsive img-circle"/>
                                <p class="padding-t-0-5 ajuste-fonte-avenir-light instituicao-nome">{{ $Experiencia->owner_nome }}</p>
                              </a>
                            </div>
                          </div>
                          @if($Experiencia->url_facebook_responsavel || $Experiencia->url_instagram_responsavel || $Experiencia->url_externa_responsavel)
                            <div class="row">
                              <div class="col-lg-12 instituicao-secao-rede-social">
                                @if($Experiencia->url_facebook_responsavel)
                                  <div class="col-lg-4">
                                    <a class="instituicao-rede-social" href="{{ $Experiencia->url_facebook_responsavel }}" target="_blank">
                                      <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x instituicao-rede-social-fundo"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse instituicao-rede-social-icone"></i>
                                      </span>
                                    </a>
                                  </div>
                                @endif
                                @if($Experiencia->url_instagram_responsavel)
                                  <div class="col-lg-4">
                                    <a class="instituicao-rede-social" href="{{ $Experiencia->url_instagram_responsavel }}" target="_blank">
                                      <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x instituicao-rede-social-fundo"></i>
                                        <i class="fa fa-instagram fa-stack-1x fa-inverse instituicao-rede-social-icone"></i>
                                      </span>
                                    </a>
                                  </div>
                                @endif
                                @if($Experiencia->url_externa_responsavel)
                                  <div class="col-lg-4">
                                    <a class="instituicao-rede-social" href="{{ $Experiencia->url_externa_responsavel }}" target="_blank">
                                      <span class="fa-stack">
                                        <i class="fa fa-circle fa-stack-2x instituicao-rede-social-fundo"></i>
                                        <i class="fa fa-link fa-stack-1x fa-inverse instituicao-rede-social-icone"></i>
                                      </span>
                                    </a>
                                  </div>
                                @endif
                              </div>
                            </div>
                          @endif
                        </div>
                        <div class="col-lg-8 instituicao-secao-texto">
                          <div class="col-lg-12 instituicao-descricao">
                            <p class="ajuste-fonte-avenir-light">{{ $Experiencia->owner_descricao }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            {{-- Fim da Seção de DETALHES DA INSTITUIÇÃO/ONG/EMPRESA --}}

            {{-- Seção dos BOTÕES --}}
              <div class="row margin-t-1 margin-b-2">
                <div class="col-lg-12 text-center">
                  @if($Experiencia->isUsuarioAtualInscrito)
                    {!! Form::hidden('_token', csrf_token()) !!}
                    <div class="col-lg-12 margin-b-1">
                      <a class="btn btn-amarelo-aviso" href="/experiencias/checkout/{{ $Experiencia->id }}" onclick="event.preventDefault();">{!! trans('global.lbl_subscribed') !!}</a>
                    </div>
                    <div class="col-lg-12">
                      <a class="btn btn-cancelar-desktop btn-cancelar-inscricao" data-id-inscricao="{{ $Experiencia->getInscricaoUsuario(Auth::user())->id }}" href="#" onclick="confirmaUsuarioCancelaInscricaoExperiencia(event)">
                        <i class="fa fa-times-circle-o"></i>
                        Cancelar Inscrição
                      </a>
                    </div>
                  @else
                    <div class="col-lg-12">
                      <a class="btn btn-acao-verde-cheio btn-inscrever-desktop btn-inscrevase-experiencia" href="/experiencias/checkout/{{ $Experiencia->id }}">
                        Inscreva-se aqui
                      </a>
                    </div>
                  @endif
                </div>
              </div>
            {{-- Fim da Seção dos BOTÕES --}}
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
