<h3 class="font-bold-upper text-center">{{ trans('global.transport_transport-title') }} - {{ trans('global.transport_bus') }}
    <small class="sub-titulo"></small>
</h3>

<input type="hidden" name="_token" value="{{\Session::token() }}">

<div class="row" id="rodoviario-filtros">
    <div class="col-sm-12">
        <div class="select-filtro">
            <input id="origem-rodoviario" autocomplete="off" placeholder="{{ trans('global.lbl_travel_from') }}" type="text" class="form-control">
            <input id="origem-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input id="destino-rodoviario" autocomplete="off" placeholder="{{ trans('global.lbl_travel_to') }}" type="text" class="form-control">
            <input id="destino-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input placeholder="{{ trans('global.lbl_travel_departure') }}" data-provide="datepicker" data-date-today-highlight="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-format="dd/mm/yyyy" data-date-autoclose="true" id="data-id-rodoviario" name="data-id-rodoviario" class="form-control" type="text" data-date-start-date="0d">
        </div>
        <div class="select-filtro">
            <input placeholder="{{ trans('global.lbl_travel_return') }} ({{ trans('global.lbl_optional') }})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" id="data-volta-rodoviario" name="data-volta-rodoviario" class="form-control" type="text" data-date-start-date="0d">
        </div>
    </div>

    <div class="col-sm-12" id="buscar-rodoviario">
        <button type="button" class="btn btn-acao">{{ trans('global.lbl_travel_search-for-bus-ticket') }}</button>
    </div>
</div>

<hr>

<input type="hidden" id="departure-schedule-id">
<input type="hidden" id="horario-ida">
<input type="hidden" id="horario-chegada-ida">
<input type="hidden" id="classe-ida">
<input type="hidden" id="from-ida">
<input type="hidden" id="to-ida">
<input type="hidden" id="session-clickbus">

<div id="clickbus-resultado-busca">

</div>
