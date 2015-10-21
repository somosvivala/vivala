
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

        <button class="btn detalhes-restaurante" type="button" data-restaurante-id="{{ $r->id }}" data-toggle="modal" data-target="#{{ $r->id }}">Detalhes</button>
    </div>
    <!-- Modal com iframe pra fechamento de pedido -->
    <div id="{{ $r->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-body">
                    {{ $r->restaurante }}
                    {{ $r->desconto }}
                    {{ $r->endereco }}
                    {{ $r->tipo_cozinha }}
                    {{ $r->preco }}
                    {{ $r->qtd_beneficios }}

                    <div class="row text-center">
                        <a class="btn" target="_blank" href="{{ $r->link }}">Entre para o clube</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

