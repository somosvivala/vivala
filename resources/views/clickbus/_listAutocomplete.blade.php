@foreach ($result as $place)
    <a href="#" class="list-group-item autocomplete-rodoviario" data-value="{{ $place->slug }}">
        <div class="row">
            <span class="col-sm-9 autocomplete-text">{{ $place->place_name }}</span>
        </div>
    </a>
@endforeach
