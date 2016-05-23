<div class="margin-b-2">
  <h3 class="font-bold-upper text-center">
    {{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">
      {{ trans('global.wannatravel_chefsclub_desserts_and_goodies') }}
    </small>
  </h3>
</div>

<div class="col-sm-12 col-md-12 col-lg-12 text-center margin-b-3">
  <div class="row padding-t-1 margin-b-1 restaurantes-vivala-iconesparceria">
    <span><i class="icon-vivala-logo vi fa-4x laranja restaurantes-vivala-vivalalogo" alt="{{ trans('global.lbl_vivala') }}"></i></span>
    <span class="ajuste-fonte-avenir-light restaurantes-vivala-texto"> {!! trans('chefsclub.chefsclub_in-partnership_with') !!} </span>
    <span><img clas="restaurantes-vivala-chefsclublogo" src="{{ asset('/img/parceiros/vivala-icon-parceiros-chefsclub.svg') }}" alt="chefsclub.com.br" title="chefsclub.com.br" height="40px"/></span>
  </div>
  <div class="row">
    <a class="btn btn-acao btn-restaurantes logger-ativo" data-tipo="chefsclub_tipo_entreclubeexterno" data-desc="chefsclub_desc_entreclubeexterno" data-loggerurl=" {{ $_SERVER['REQUEST_URI'] }} " href="https://www.chefsclub.com.br/desconto/vivala" target="_blank">
    {{ trans('chefsclub.chefsclub_join-the-club') }}
    </a>
  </div>
</div>

<input type="hidden" name="_token" value="{{\Session::token() }}">
<div class="row margin-t-1" id="chefsclub-filtros">
  <div class="col-sm-12 col-md-12 col-lg-12 text-center">
    <div class="select-filtro">
        <select id="tipo-cozinha" class="form-control form-control-fix">
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
        <select id="horaRestaurante" class="form-control form-control-fix">
            <option value="">{{ trans('global.date_schedule') }}</option>
            @foreach($horarios as $horario)
            <option value="{{ $horario }}">{{ $horario }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="porcentagem-desconto" class="form-control form-control-fix">
            <option value="">{{ trans('global.lbl_discount') }}</option>
            @foreach($descontos as $Desconto)
            asort($Desconto);
            <option value="{{ $Desconto }}">{{ $Desconto }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="cidade-restaurante" class="form-control form-control-fix">
            <option value="0">{{ trans('global.lbl_city') }}</option>
            @foreach($cidades as $Cidade)
            <option value="{{ $Cidade['id'] }}">{{ $Cidade['cidade'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="qtd-pessoas" class="form-control form-control-fix">
            <option value="0"> {{ trans('global.lbl_people') }}</option>
            @foreach($pessoas as $pessoa)
            <option value="{{ $pessoa['id'] }}">{{ $pessoa['text'] }}</option>
            @endforeach
        </select>
    </div>
  </div>
</div>
