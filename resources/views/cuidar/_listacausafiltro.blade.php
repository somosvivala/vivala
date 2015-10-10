<ul class="lista-vagas row">

    @if(isset($causas))
    @forelse($causas as $Causa)
        <li class="col-sm-4">
            <div class="foto-fundo" style="background-image:url('{{ $Causa->getCapaUrl() }}');">
            <a href="{{ url('vagas/'.$Causa->id) }}">
                <h3 class="font-bold-upper">{{ $Causa->owner->nome }}</h3>
                <p>{{ $Causa->habilidades }}</p>
                <span class="padding-t-1"><i class="fa fa-map-marker"></i> {{ $Causa->cidade->nome.",".$Causa->estado->sigla }}</span>
            </a>
        </li>
    @empty
        <p class="col-sm-12 text-center">Nenhuma causa encontrada.</p>
    @endforelse
    @endif
</ul>
