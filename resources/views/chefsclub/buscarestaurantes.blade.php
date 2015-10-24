<h3 class="font-bold-upper text-center">{{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">Delícias que alimentam corpo e alma</small>
</h3>
<input type="hidden" name="_token" value="{{\Session::token() }}">
<div class="row" id="chefsclub-filtros">
    <div class="col-md-3">
        <select id="tipo-cozinha" class="form-control">
            <option value="">Todos</option>
            @foreach($tipo_cozinha as $TipoCozinha)
            <option value="{{ $TipoCozinha }}">{{ $TipoCozinha }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select id="porcentagem-desconto" class="form-control">
            <option value="">Qualquer desconto</option>
            @foreach($descontos as $Desconto)
            <option value="{{ $Desconto }}">{{ $Desconto }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select id="cidade-restaurante" class="form-control">
            <option value="0">Todas Cidades</option>
            @foreach($cidades as $Cidade)
            <option value="{{ $Cidade['id'] }}">{{ $Cidade['cidade'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select id="qtd-pessoas" class="form-control">
            <option value="">Qualquer</option>
            @foreach($pessoas as $numPessoas => $txtPessoas)
            <option value="{{ $numPessoas }}">{{ $txtPessoas }}</option>
            @endforeach
        </select>
    </div>
</div>
