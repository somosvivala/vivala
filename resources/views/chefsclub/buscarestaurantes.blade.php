<h3 class="font-bold-upper text-center">{{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">{{ trans('global.wannatravel_chefsclub_desserts_and_goodies') }}</small>
</h3>
<input type="hidden" name="_token" value="{{\Session::token() }}">
<div class="row" id="chefsclub-filtros">
    <div class="select-filtro">
        <select id="tipo-cozinha" class="form-control">
            <option value="">{{ trans('chefsclub.chefsclub_kitchen-type') }}</option>
            @foreach($tipo_cozinha as $TipoCozinha)
            <option value="{{ $TipoCozinha }}">{{ $TipoCozinha }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
            <input placeholder="{{ trans('global.date_date') }}" data-provide="datepicker" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-today-highlight="true" data-date-format="dd/mm/yyyy" data-date-autoclose="true" id="dataRestaurante" name="dataRestaurante" class="form-control" type="text">
    </div>
    <div class="select-filtro">
        <select id="horaRestaurante" class="form-control">
            <option value="">{{ trans('global.date_schedule') }}</option>
            @foreach($horarios as $horario)
            <option value="{{ $horario }}">{{ $horario }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="porcentagem-desconto" class="form-control">
            <option value="">{{ trans('global.lbl_discount') }}</option>
            @foreach($descontos as $Desconto)
            <option value="{{ $Desconto }}">{{ $Desconto }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="cidade-restaurante" class="form-control">
            <option value="0">{{ trans('global.lbl_city') }}</option>
            @foreach($cidades as $Cidade)
            <option value="{{ $Cidade['id'] }}">{{ $Cidade['cidade'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="qtd-pessoas" class="form-control">
            <option value="0"> {{ trans('global.lbl_people') }}</option>
            @foreach($pessoas as $pessoa)
            <option value="{{ $pessoa['id'] }}">{{ $pessoa['text'] }}</option>
            @endforeach
        </select>
    </div>
</div>
