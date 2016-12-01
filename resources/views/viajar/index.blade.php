@extends('viajar')

@section('content')
<div id="tour-pilares" class="pilar-viajar">
    <div class="foto-fundo-bottom foto-header" style="background-image:url('/img/queroviajar.png');">
        <h2>{{ trans('global.wannatravel_title') }}</h2>
        <h3>{{ trans('global.wannatravel_subtitle') }}</h3>
        <div class="col-sm-12">
            <a class="suave padding-btn">{{ trans('global.lbl_how_it_works') }}</a>
        </div>
    </div>

    <div class="fundo-cheio col-sm-12 tour-pilar-viajar-step2">
        <h3 class="font-bold-upper text-center">
          {{ trans('global.wannatravel_trip_already_know') }}
            <small class="sub-titulo">{{ trans('global.wannatravel_trip_setup') }}</small>
        </h3>
        <ul class="lista-border pesquisa-viajar">
          <div class="row row-eq-height">
            <li class="col-sm-3 tour-pilar-viajar-step3 active">
                <a class="rodoviario logger-ativo" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#rodoviario" aria-controls="rodoviario" role="tab" data-toggle="tab">
                 {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
            </li>
            <li class="col-sm-3 tour-pilar-viajar-step4">
                <a class="ativa-modal-quimera logger-ativo" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#quimera" data-url="https://www.e-agencias.com.br/vivala">
                   {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
                </a>
            </li>
            <li class="col-sm-3 tour-pilar-viajar-step5">
                <a class="restaurantes logger-ativo" data-tipo="abasviajar_tipo_restaurantes" data-desc="abasviajar_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                    {{ trans('global.wannatravel_trip_restaurants') }}
                </a>
            </li>
            <li class="col-sm-3 tour-pilar-viajar-step6">
                <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
                  {{ trans('global.wannatravel_trip_experiences') }}
                </a>
            </li>
          </div>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" id="rodoviario" class="tab-pane active">
              @include('clickbus.buscar')
              <div class="lista-rodoviario"></div>
          </div>
          <div role="tabpanel" id="experiencias" class="tab-pane">
            @if((isset($experiencias)) && (count($experiencias) >=1))
              <ul class="row padding-b-1 lista-exp-desktop">
              <?php $contadorExp = 0 ?>
                @foreach($experiencias as $k=>$Experiencia)
                 @if($contadorExp%4 == 0)
                 <div class="row row-eq-height">
                 @endif
                <li class="col-lg-3">
                  <a href="/experiencias/{{ $Experiencia->id}}">
                    <div class="row text-center margin-t-1 margin-b-0-5">
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
                
              <?php $contadorExp++; ?>
               @if($contadorExp%4 == 0)
               </div>
               @endif
              @endforeach
               @if($contadorExp%4 != 0)
               </div>
               @endif
              </ul>
            @else
              <div class="col-lg-12 text-center padding-b-1">
                Não há experiências disponíveis.
              </div>
            @endif
          </div>
          <div role="tabpanel" id="restaurantes" class="tab-pane">
            <div>
                @include('chefsclub.buscarestaurantes')
            </div>
            <div>
                @include('chefsclub.listarestaurantes')
            </div>
          </div>
        </div>
    </div>

    <!-- Modal com iframe pra fechamento de pedido -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-body">
                    <iframe class="checkout">
                    </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('global.lbl_close')}}</button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
