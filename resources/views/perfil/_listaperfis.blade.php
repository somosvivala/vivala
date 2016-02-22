@foreach ($perfils as $perfil)
    <a href="{{ url("/perfil/{$perfil->user_id}") }}" class="list-group-item autocomplete-flight" data-value="{{ $perfil->user_id }}">
        <div class="row">
            <div class="round foto quadrado3em">
                <div class="avatar-img" style="background-image:url('{{ $perfil->photo }}')"></div>
            </div>
            <span class="col-sm-9 autocomplete-text">{{ $perfil['nome_completo'] }}</span>
        </div>
    </a>
@endforeach