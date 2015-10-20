<div class="hotel-detalhes">
    <div class="foto-fundo foto-header" style="background-image:url('{{ $data['extra']->pictures[0]->url}}/720x400?truncate=true');">
        <h2>{{ $data['extra']->name }}</h2>
        <div class="quarto-destaque">
            <span>{{ $data['data']->roomClusters[0]->roompacks[0]->rooms[0]->name }}</span>
            <h5 class="font-bold-upper">R$ {{ $data['data']->roomClusters[0]->roompacks[0]->paymentTypes->prepaid->priceDetail->nightly->subtotal }}</h5>
            <a class="btn btn-primario" href="#">
                Comprar
            </a>
        </div>
    </div>

    <div class="fotos-detalhe">
        @foreach($data['extra']->pictures as $foto)
        <img src="{{ $foto->url}}/50x50?truncate=true">
        @endforeach
    </div>

    <div class="descricao padding-t-2">
        <p>{{ $data['extra']->information }}</pre>
    </div>

    {{ count($data['data']->roomClusters) }} Opções disponíveis

    @foreach($data['data']->roomClusters as $roomCluster)
    <div class="row">

        <div class="room-cluster col-sm-12">
            <div class="col-sm-6">
                <div class="col-sm-4">
                    <img src="{{ $roomCluster->roompacks[0]->rooms[0]->roomDetails->pictures[0]->url }}/100x80?truncate=true">
                </div>
                <div class="col-sm-8">
                    <h4 class="font-bold-upper">{{ $roomCluster->roompacks[0]->rooms[0]->roomDetails->despegarName }}</h4>
                </div>
            </div>

            <div class="col-sm-6">
            @foreach($roomCluster->roompacks as $roompack)
                <div class="row padding-t-1 padding-b-1">
                    <div class="col-sm-7">
                        <ul>
                            <li> {{ $roompack->mealPlan->description }}</li>
                            <li> {{ $roompack->cancellationPolicy->text }}</li>
                        </ul>
                    </div>

                    <div class="col-sm-5">
                        <span class="font-bold-upper">Tarifa por Noite</span>
                        <h5 class="font-bold-upper"> R$ {{ $roompack->paymentTypes->prepaid->priceDetail->nightly->subtotal }} </h5>
                        <a class="btn btn-primario" href="#" data-choice="{{ $roompack->choice }}">
                            Comprar
                        </a>
                        @foreach($roompack->rooms as $room)
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
<?php 
/**
 *  data =>  dados de disponibilidade e informações de quartos
 *  extra => Informações sobre o hotel
 */ 
?>
<?php dd($data['data'], $data['extra']); ?>
