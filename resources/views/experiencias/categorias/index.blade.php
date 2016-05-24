@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    @include('experiencias.categorias._navbar')

    <div class="padding-b-1" id="listagem-categorias-experiencia">
        <h2 class="col-xs-12">Listagem de Categorias de Experiencias</h2>
            <ul>
            @if ( isset($Categorias) )
                @forelse ($Categorias as $categoria)
                    <li class="">
                        <a href="/categorias/experiencias/{{ $categoria->id }}/edit">Editar  -</a>
                        &nbsp;
                        <i class="{{ $categoria->icone }} "></i> &nbsp; {{ $categoria->nome }}
                    </li>
                @empty

                <p>Nenhuma categoria encontrada</p>

                @endforelse
            @endif
            </ul>
    </div>
</div>
@endsection
