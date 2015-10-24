<h3 class="font-bold-upper text-center">{{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">Delícias que alimentam corpo e alma</small>
</h3>
<input type="hidden" name="_token" value="{{\Session::token() }}">
<div class="row" id="chefsclub-filtros">
    <div class="select-filtro">
        <select id="tipo-cozinha" class="form-control">
            <option value="">Tipo Cozinha</option>
            @foreach($tipo_cozinha as $TipoCozinha)
            <option value="{{ $TipoCozinha }}">{{ $TipoCozinha }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
            <input placeholder="Data" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="dataRestaurante" name="dataRestaurante" class="form-control" type="text">
    </div>
    <div class="select-filtro">
        <select id="horaRestaurante" class="form-control">
            <option value="">Horário</option>
            @foreach($horarios as $horario)
            <option value="{{ $horario }}">{{ $horario }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="porcentagem-desconto" class="form-control">
            <option value="">Desconto</option>
            @foreach($descontos as $Desconto)
            <option value="{{ $Desconto }}">{{ $Desconto }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="cidade-restaurante" class="form-control">
            <option value="0">Cidade</option>
            @foreach($cidades as $Cidade)
            <option value="{{ $Cidade['id'] }}">{{ $Cidade['cidade'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="select-filtro">
        <select id="qtd-pessoas" class="form-control">
            <option value="0"> Pessoas</option>
            @foreach($pessoas as $pessoa)
            <option value="{{ $pessoa['id'] }}">{{ $pessoa['text'] }}</option>
            @endforeach
        </select>
    </div>
</div>
