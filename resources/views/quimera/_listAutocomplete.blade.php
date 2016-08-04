<div class="list-group flight-list">
    @foreach ($data['airports'] as $airport)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $airport->id }}">
            <div class="row">
                <span class="col-sm-9 autocomplete-text">{{ $airport->name }}</span>
                <span class="col-sm-3 badge">Aeroporto</span>
            </div>
        </a>
    @endforeach
    @foreach ($data['cities'] as $city)
        <a href="#" class="list-group-item autocomplete-flight" data-value="{{ $city->id }}">
            <div class="row">
                <span class="col-sm-9 autocomplete-text">{{ $city->name }}</span>
                <span class="col-sm-3 badge">Cidade</span>
            </div>
        </a>
    @endforeach
</div>  
