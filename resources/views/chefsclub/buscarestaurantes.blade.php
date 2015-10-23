<h3 class="font-bold-upper text-center">{{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">Delícias que alimentam corpo e alma</small>
</h3>
<div class="row">
    <div class="col-md-3">
        <select id="qtd-quartos-hotel" class="form-control">
            @foreach($tipo_cozinha as $TipoCozinha)
            <option value="{{ $TipoCozinha }}">{{ $TipoCozinha }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select id="qtd-quartos-hotel" class="form-control">
            @foreach($descontos as $Desconto)
            <option value="{{ $Desconto }}">{{ $Desconto }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select id="qtd-cidades" class="form-control">
            @foreach($cidades as $Cidade)
            <option value="{{ $Cidade['cidade'] }}">{{ $Cidade['cidade'] }}</option>
            @endforeach
        </select>
    </div>
</div>
