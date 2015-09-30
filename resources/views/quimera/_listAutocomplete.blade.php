<div class="list-group col-sm-9 flight-list">
    @foreach ($data['airports'] as $airport)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $airport->id }}">{{ $airport->name }}
            <span class="badge">Aeroporto</span>
        </a>
    @endforeach
    @foreach ($data['cities'] as $city)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $city->id }}">{{ $city->name }}
            <span class="badge">Cidade</span>
        </a>
    @endforeach
</div>  