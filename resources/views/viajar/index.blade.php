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
            <li class="col-sm-4 tour-pilar-viajar-step3">
                <a class="rodoviario desativado" href="#">
                   {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
                {{--
                <a class="rodoviario" href="#rodoviario" aria-controls="rodoviario" role="tab" data-toggle="tab">
                   {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
                --}}
            </li>

            <li class="col-sm-5 tour-pilar-viajar-step4">
                <a class="ativa-modal-quimera" href="#quimera" data-url="https://www.e-agencias.com.br/vivala">
                   {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
                </a>
            </li>

            <li class="col-sm-3 active tour-pilar-viajar-step5">
                <a class="restaurantes" href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                    {{ trans('global.wannatravel_trip_restaurants') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="rodoviario">
                @include('clickbus.buscar')
                <div class="lista-rodoviario"></div>
            </div>

            <div role="tabpanel" class="tab-pane " id="restaurantes">
                <div class="tour-chefsclub-step1">
                    @include('chefsclub.buscarestaurantes')
                </div>
                <div class="lista-restaurantes tour-chefsclub-step2">
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

{{--
    <!-- section class="secao-sem-bg text-center">
        <h3 class="subtitulo col-sm-12">Explore novos ares e mares</h3>
        <small class="col-sm-12">Descubra lugares novos e inspiradores</small>
        <div class="col-sm-4">
            <div class="foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="foto-fundo foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="foto-fundo foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                </a>
            </div>
        </div>
    </section>
    <section class="secao-sem-bg text-center">
        <h3 class="col-sm-12">Roteiros populares</h3>
        <small class="col-sm-12">Os mais curtidos, comentados e compartilhados da Vivalá</small>
        <div class="col-sm-4">
            <div class="foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                    <div class="foto-comentario">
                        <div class="col-sm-5">
                            <div class="round foto">
                                <div class="cover">
                                    <img src="/img/dummy.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            Uma viagem para entrar em contato com a cultura local
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                    <div class="foto-comentario">
                        <div class="col-sm-5">
                            <div class="round foto">
                                <div class="cover">
                                    <img src="/img/dummy.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            Uma viagem para entrar em contato com a cultura local
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="foto-link">
                <a href="/rio">
                    <div class="cover">
                        <img src="/img/dummy.jpg">
                    </div>
                    <h4>Brasília</h4>
                    <div class="foto-comentario">
                        <div class="col-sm-5">
                            <div class="round foto">
                                <div class="cover">
                                    <img src="/img/dummy.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            Uma viagem para entrar em contato com a cultura local
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section-->
--}}
</div>
@endsection
