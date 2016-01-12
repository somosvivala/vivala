<h3 class="font-bold-upper text-center">TRANSPORTE - ÔNIBUS
    <small class="sub-titulo"></small>
</h3>

<input type="hidden" name="_token" value="{{\Session::token() }}">

<div class="row" id="rodoviario-filtros">
    <div class="col-sm-12">
        <div class="select-filtro">
            <input id="origem-rodoviario" autocomplete="off" placeholder="DE" type="text" class="form-control">
            <input id="origem-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input id="destino-rodoviario" autocomplete="off" placeholder="PARA" type="text" class="form-control">
            <input id="destino-rodoviario-hidden" type="hidden">
            <i class="fa-spin fa-spinner fa loading-search soft-hide"></i>
        </div>
        <div class="select-filtro">
            <input placeholder="IDA" data-provide="datepicker" data-date-today-highlight="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-format="dd/mm/yyyy" id="data-id-rodoviario" name="data-id-rodoviario" class="form-control" type="text">
        </div>
        <div class="select-filtro">
            <input placeholder="VOLTA (opcional)" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" id="data-volta-rodoviario" name="data-volta-rodoviario" class="form-control" type="text">
        </div>
    </div>

    <div class="col-sm-12" id="buscar-rodoviario">
        <button type="button" class="btn btn-acao">Buscar Transporte</button>
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
