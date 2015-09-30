<div class="list-group col-sm-9 hotel-list">
    @foreach ($data['cities'] as $city)
        <a href="#" class="list-group-item autocomplete-hotel" data-type="cidade" data-value="{{ $city->item->id }}">{{ $city->description }}
            <span class="badge">Cidade</span>
        </a>
    @endforeach
    @foreach ($data['hotels'] as $hotel)
        <a href="#" class="list-group-item autocomplete-hotel" data-type="hotel" data-value="{{ $hotel->hotelId }}">{{ $hotel->description }}
            <span class="badge">Hotel</span>
        </a>
    @endforeach
</div>  