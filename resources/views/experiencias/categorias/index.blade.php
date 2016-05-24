@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio padding-b-2">

    @include('experiencias.categorias._navbar')

    <div class="padding-b-1" id="listagem-categorias-experiencia">
        <h2 class="col-xs-12 margin-b-1">Listagem de Categorias de Experiencias</h2>
        <ul class="list-group margin-b-1">
        @if ( isset($Categorias) )
            @forelse ($Categorias as $categoria)
                <li class="col-xs-12 list-group-item categoria-experiencia-item">
                    <div class="col-xs-10">
                        <i class="{{ $categoria->icone }} "></i> &nbsp; {{ $categoria->nome }}
                    </div>
                    <div class="col-xs-2">
                        <a href="/categorias/experiencias/{{ $categoria->id }}/edit">
                            Editar
                        </a>
                        &nbsp; - &nbsp;
                        <a href="#" onclick="confirmaDeleteCategoriaExperiencia(event)" data-id="{{ $categoria->id }}">
                            Deletar
                        </a>
                        {!! Form::hidden('_token', csrf_token()) !!}
                    </div>
                </li>
            @empty

            <p>Nenhuma categoria encontrada</p>

            @endforelse
        @endif
        </ul>
    </div>
</div>
@endsection
