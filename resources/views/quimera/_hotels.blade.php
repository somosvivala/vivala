@foreach ($data as $hotel)
    <div class="col-sm-4">
        <a href="#abrehotel" class="abrehotel">
            <div class="quimera-hotel" style="background-image: url({!! $hotel->picture->url !!});">
            </div>
            <div class="hotel-header">
                <div class="hotel-price">
                    R$ {{$hotel->roompacks[0]->priceDetail->nightly->subtotal}}
                </div>
                <div class="hotel-like"> <i class="fa fa-heart"></i> </div>
            </div>
            <div class="hotel-footer">
                {{strtoupper($hotel->hotel->name)}}
            </div>
        </a>
    </div>
@endforeach
