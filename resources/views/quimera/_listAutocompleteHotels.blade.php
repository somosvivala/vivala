<div class="list-group hotel-list">
    @foreach ($data['cities'] as $city)
        <a href="#" class="list-group-item autocomplete-hotel" data-type="cidade" data-value="{{ $city->item->id }}">
            <div class="row">
                <span class="col-sm-9 autocomplete-text">{{ $city->description }}</span>
                <span class="col-sm-3 badge">Cidade</span>
            </div>
        </a>
    @endforeach
    @foreach ($data['hotels'] as $hotel)
        <a href="#" class="list-group-item autocomplete-hotel" data-type="hotel" data-value="{{ $hotel->hotelId }}">
            <div class="row">
                <span class="col-sm-9 autocomplete-text">{{ $hotel->description }}</span>
                <span class="col-sm-3 badge">Hotel</span>
            </div>
        </a>
    @endforeach
</div>  
