<ul class="lista-ongs row">

    @if(isset($ongs))
    @forelse($ongs as $Ong)
        <li class="col-sm-4">
            <div class="foto-fundo" style="background-image:url('{{ $Ong->getCapaUrl() }}');">
            <a href="{{ url('ongs/sobre/'.$Ong->id) }}">
                <h3 class="font-bold-upper">{{ $Ong->nome }}</h3>
            </a>
        </li>
    @empty
        <p>Nenhuma ong.</p>
    @endforelse
    @endif
</ul>
