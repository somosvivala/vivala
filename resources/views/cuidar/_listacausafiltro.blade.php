<ul class="lista-ongs row">

    @if(isset($causas))
    @forelse($causas as $Causa)
        <li class="col-sm-4">
            <div class="foto-fundo" style="background-image:url('{{ $Causa->getCapaUrl() }}');">
            <a href="{{ url('causa/sobre/'.$Causa->id) }}">
                <h3 class="font-bold-upper">{{ $Causa->nome }}</h3>
            </a>
        </li>
    @empty
        <p class="col-sm-12 text-center">Nenhuma causa encontrada.</p>
    @endforelse
    @endif
</ul>
