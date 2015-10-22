
<div class="margin-t-2 row detalhes-lista">
    <div class="col-sm-12">
        <h4 class="font-bold-upper">Mais de {{ round($restaurantes_total/100)*100 }} restaurantes disponíveis</h4>
    </div>
    @foreach($restaurantes as $r)
    <div class="col-sm-6 margin-t-2">
        <div class="restaurante col-sm-12">
            <div class="row">
                <div style="background-image:url('{{ $r->imagem }}');" class="foto-restaurante col-sm-4">
                </div>
                <div class="col-sm-8">
                    <h5 class="font-bold-upper">{{ $r->restaurante }}</h5>
                    <span class="desconto">{{ $r->desconto }}</span>
                    <span class=""><i class="fa fa-map-marker"></i> {{ $r->endereco }}</span>
                    <div class="row maisinfos">
                        <div class="col-sm-4"><i class="fa fa-male"></i> 1 - <?php preg_match('/[0-9]/',$r->beneficio,$match); echo $match[0]+1; ?></div>
                        <div class="col-sm-3"><?php for($i=0;$i<$r->preco;$i++) echo "<i class='fa fa-usd'></i> "; ?></div>
                        <div class="col-sm-5"><ul><?php foreach(explode(' ',$r->tipo_cozinha) as $tipo) echo "<li>$tipo</li>"; ?></ul></div>
                    </div>
                    <div class="row text-center">
                        <button class="btn suave detalhes-restaurante" type="button" data-restaurante-id="{{ $r->id }}" data-toggle="modal" data-target="#{{ $r->id }}">Detalhes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal com iframe pra fechamento de pedido -->
    <div id="{{ $r->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="font-bold-upper">{{ $r->restaurante }}</h5>
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

