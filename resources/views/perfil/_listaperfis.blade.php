<div class="list-group perfil-list">
    @foreach ($perfils as $perfil)
        <a href="{{ url("/perfil/{$perfil->user_id}") }}" class="list-group-item autocomplete-flight" data-value="{{ $perfil->user_id }}">
            <div class="row">
                <img src="{{ $perfil->photo }}">
                <span class="col-sm-9 autocomplete-text">{{ $perfil['nome_completo'] }}</span>
            </div>
        </a>
    @endforeach
</div>