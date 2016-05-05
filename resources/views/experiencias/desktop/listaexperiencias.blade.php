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
                <a class="rodoviario" href="#rodoviario" aria-controls="rodoviario" role="tab" data-toggle="tab">
                   {{ trans('global.wannatravel_trip_bus_drive') }}
                </a>
            </li>

            <li class="col-sm-4 tour-pilar-viajar-step4">
                <a class="ativa-modal-quimera" href="#quimera" data-url="https://www.e-agencias.com.br/vivala">
                   {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
                </a>
            </li>

            <li class="col-sm-2 active tour-pilar-viajar-step5">
                <a class="restaurantes" href="#restaurantes" aria-controls="restaurantes" role="tab" data-toggle="tab">
                    {{ trans('global.wannatravel_trip_restaurants') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="rodoviario">
                <div class="lista-rodoviario"></div>
            </div>
            <div role="tabpanel" class="tab-pane " id="restaurantes">
            </div>
            <div role="tabpanel" class="tab-pane " id="experiencias">
                <h2>Experiências</h2>
            </div>
        </div>
    </div>

</div>
@endsection
