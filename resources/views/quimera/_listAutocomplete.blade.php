<div class="list-group col-sm-9 flight-list">
    @foreach ($data['airports'] as $airport)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $airport->id }}">
            <span class="autocomplete-text">{{ $airport->name }}</span>
            <span class="badge">Aeroporto</span>
        </a>
    @endforeach
    @foreach ($data['cities'] as $city)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $city->id }}">
            <span class="autocomplete-text">{{ $city->name }}</span>
            <span class="badge">Cidade</span>
        </a>
    @endforeach
</div>  
