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
            <a class="ativa-modal-quimera logger-ativo" href="#quimera" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" data-url="https://www.e-agencias.com.br/vivala">
              {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step5">
            <a class="rodoviario logger-ativo" href="#rodoviario" aria-controls="rodoviario"  data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
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
      <div class="tab-content">
        <div id="experiencias" class="tab-pane active" role="tabpanel">
          @if((isset($experiencias)) && (count($experiencias) >=1))
            <ul class="row padding-b-1 lista-exp-desktop">
              @foreach($experiencias as $k=>$Experiencia)
              <li class="col-lg-3">
                <a href="/experiencias/{{ $Experiencia->id}}">
                  <div class="row text-center margin-t-0 margin-b-0-5">
                    <h4 class="col-lg-12 nome-listagem">
                      {{ ucfirst(trim($Experiencia->nome)) }}
                    </h4>
                  </div>
                  <div class="foto">
                    <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                      {{-- DESATIVADO TEMPORARIAMENTE - ATÉ IMPLEMENTAÇÃO DO FILTRO DE CATEGORIAS --}}
                        <div class="categorias-experiencia hide">
                          <?php $contadorCategorias = 0; ?>
                          @foreach($Experiencia->categorias as $Categoria)
                            <div class="icone">
                              <i class="{{ $Categoria->icone }}"></i>
                            </div>
                            {{-- A img do desktop/listagem só comporta 4 ícones por vez --}}
                            @if(++$contadorCategorias === 4)
                              <?php break; ?>
                            @endif
                          @endforeach
                        </div>
                      {{-- DESATIVADO TEMPORARIAMENTE - ATÉ IMPLEMENTAÇÃO DO FILTRO DE CATEGORIAS --}}
                    </div>
                    <div class="descricao">{{ $Experiencia->descricao_na_listagem }}</div>
                  </div>
                  <div class="row text-center margin-t-0-5">
                    @if($Experiencia->isUsuarioAtualInscrito)
                      <span class="col-lg-12 descricao-listagem-titulo-pago">JÁ ME INSCREVI</span>
                    {{--
                    @else
                      <span class="col-lg-12 descricao-listagem-titulo-preco">R$ {{ $Experiencia->preco }}</span>
                    --}}
                    @endif
                    <span class="col-lg-12 descricao-listagem-lugar"><i class="fa fa-map-marker"></i> {{ $Experiencia->local->nome }} - {{ $Experiencia->local->estado->sigla }}</span>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>
          @else
            <div class="col-lg-12 text-center padding-b-1">
              Não há experiências disponíveis.
            </div>
          @endif
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
