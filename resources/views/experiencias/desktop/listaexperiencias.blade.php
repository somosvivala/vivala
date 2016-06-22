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

        <ul class="lista-border pesquisa-viajar margin-t-2 margin-b-3">
            <li class="col-sm-3 tour-pilar-viajar-step3">
                <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
                    Experiências
                </a>
            </li>
             <li class="col-sm-3 tour-pilar-viajar-step3">
                <a class="rodoviario logger-ativo" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#rodoviario" aria-controls="rodoviario" role="tab" data-toggle="tab">
                   {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
            </li>

            <li class="col-sm-4 tour-pilar-viajar-step4">
                <a class="ativa-modal-quimera logger-ativo" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#quimera" data-url="https://www.e-agencias.com.br/vivala">
                   {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
                </a>
            </li>

            <li class="col-sm-2 active tour-pilar-viajar-step5">
                <a class="restaurantes logger-ativo" data-tipo="abasviajar_tipo_restaurantes" data-desc="abasviajar_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                    {{ trans('global.wannatravel_trip_restaurants') }}
                </a>
            </li>       
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="rodoviario">
                @include('clickbus.buscar')
                <div class="lista-rodoviario"></div>
            </div>
            <div role="tabpanel" class="tab-pane " id="restaurantes">
                <div>
                {{--   @include('chefsclub.buscarestaurantes')
                </div>
                <div>
                    @include('modals._listarestaurantes')
                --}}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="experiencias">
                <h2>Experiências</h2>

                <ul class="padding-b-1 lista-foto-descricao">
                    @foreach($experiencias as $k=>$Experiencia)
                    <li class="row">
                        <a href="/experiencias/{{ $Experiencia->id}}">
                            <div class="{{ $k%2==0?'direita':'esquerda'}} foto">
                                <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                                    <div class="categorias-experiencia">
                                        @foreach($Experiencia->categorias as $Categoria)
                                            <div class="icone">
                                                <i class="fa fa-{{ $Categoria->icone }}"></i>
                                                {{-- <span>{{ $Categoria->nome }}</span> --}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}"> --}}
                            </div>
                            <div class="{{ $k%2!=0?'direita':'esquerda'}} descricao">
                                <div class="container">
                                    <span class="col-xs-12 negrito-exp"><i class="fa fa-map-marker"></i> Sao Paulo</span>
                                    <span class="col-xs-12 negrito-exp">R${{ $Experiencia->preco }}</span>
                                    <span class="pull-left margin-t-1">{{ $Experiencia->descricao }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
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
