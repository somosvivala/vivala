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
        <a href="{{$foto->url}}" data-lightbox="hotel-detalhes">
            <img src="{{ $foto->url}}/50x50?truncate=true">
        </a>
        @endforeach
    </div>

    <div class="descricao padding-t-2 margin-b-2">
        <p>{!! nl2br($data['extra']->information) !!}</p>
    </div>

    <h5 class="font-bold-upper text-left    "> {{ count($data['data']->roomClusters) }} Opções disponíveis </h5>

    @foreach($data['data']->roomClusters as $roomCluster)
    <div class="col-sm-12 margin-b-2">

        <div class="room-cluster row ">
            <div class="col-sm-6 padding-t-1">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ $roomCluster->roompacks[0]->rooms[0]->roomDetails->pictures[0]->url }}/100x80?truncate=true">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-bold-upper">{{ $roomCluster->roompacks[0]->rooms[0]->roomDetails->despegarName }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 roompacks">
                @foreach($roomCluster->roompacks as $roompack)
                <div class="row roompack">
                    <div class="col-sm-7">
                        <ul class="padding-t-1">
                            <li>- {{ $roompack->mealPlan->description }}</li>
                            <li>- {{ $roompack->cancellationPolicy->text }}</li>
                        </ul>
                    </div>

                    <div class="col-sm-5 tarifa padding-t-1 padding-b-1 ">
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

    <h5 class="font-bold-upper text-left">Serviços da {{ $data['extra']->name }}</h5>
    <div class="amenities row">
        @foreach($data['extra']->amenities as $Amenity)
        <span class="col-md-4 col-sm-6 col-xs-12 servico">
            - {{ $Amenity->description }}
        </span>
        @endforeach
    </div>
</div>
<?php 
/**
 *  data =>  dados de disponibilidade e informações de quartos
 *  extra => Informações sobre o hotel
 */ 
dd($data['data'], $data['extra']); 
