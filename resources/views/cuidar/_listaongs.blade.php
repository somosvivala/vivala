<ul class="lista-ongs row col-sm-12<F6>">

    @if(isset($ongs))
    @forelse($ongs as $Ong)
        <li>
            <a href="{{ url('ongs/sobre/'.$Ong->id) }}">
                <div class="foto">
                    <div class="cover">
                        <img src="{{ $Ong->getAvatarUrl() }}" alt=" {{ $Ong->nome }}">
                    </div>
                </div>
                <h3 class="font-family-sans-serif-bold">{{ $Ong->nome }}</h3>
            </a>
        </li>
    @empty
        <p>Nenhuma ong.</p>
    @endforelse
    @endif
</ul>
