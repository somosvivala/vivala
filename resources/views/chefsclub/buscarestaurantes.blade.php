
<h3 class="font-bold-upper text-center">Restaurantes
    <small class="sub-titulo">Delícias que alimentam corpo e alma</small>
</h3>
<div class="row">
    <div class="col-md-3">
        <select id="qtd-quartos-hotel" class="form-control">
            @foreach($chefs->num_pessoas as $num)
            <option value="{{ $num }}">{{ $num }} adultos</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row detalhes-lista">
    @foreach($chefs->restaurantes as $r)
    <div class="col-sm-6">
        <img src="{{ $r->imagem }}">
        {{ $r->restaurante }}
        {{ $r->desconto }}
        {{ $r->endereco }}
        {{ $r->tipo_cozinha }}
        {{ $r->preco }}
        {{ $r->qtd_beneficios }}

        <button class="btn detalhes-restaurante" type="button" data-restaurante-id="{{ $r->restaurante }}">Detalhes</button>
    </div>
    @endforeach
</div>

