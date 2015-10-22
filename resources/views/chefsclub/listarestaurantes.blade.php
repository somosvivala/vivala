
<div class="margin-t-2 row detalhes-lista">
    @foreach($restaurantes as $r)
    <div class="col-sm-6">
        <div class="restaurante col-sm-12">
            <div class="row">
                <div style="background-image:url('{{ $r->imagem }}');" class="foto-restaurante col-sm-4">
                </div>
                <div class="col-sm-8">
                    <h5 class="font-bold-upper">{{ $r->restaurante }}</h5>
                    <span class="desconto">{{ $r->desconto }}</span>
                    <span class=""><i class="fa fa-map-marker"></i> {{ $r->endereco }}</span>
                    <div class="row">
                        <div class="col-sm-3">{{ $r->beneficio }}</div>
                        <div class="col-sm-3">{{ $r->tipo_cozinha }}</div>
                        <div class="col-sm-3">{{ $r->preco }}</div>
                    </div>
                    <button class="btn detalhes-restaurante" type="button" data-restaurante-id="{{ $r->id }}" data-toggle="modal" data-target="#{{ $r->id }}">Detalhes</button>
                </div>
            </div>
        </div>

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

