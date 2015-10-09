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
        <p class="col-sm-12 text-center">Nenhuma ong encontrada.</p>
    @endforelse
    @endif
</ul>
