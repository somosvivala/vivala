<ul class="lista-ongs row">

    @if(isset($ongs))
    @forelse($ongs as $Ong)
        <li class="col-sm-4">
            <div class="foto-fundo" style="background-image:url('{{ $Ong->getCapaUrl() }}');">
            <a href="{{ url($Ong->getUrl()) }}">
                <h3 class="font-bold-upper">{{ $Ong->nome }}</h3>
            </a>
        </li>
    @empty
        <p class="col-sm-12 text-center">{{ trans('lbl_ong_not_found') }}</p>
    @endforelse
    @endif
</ul>
