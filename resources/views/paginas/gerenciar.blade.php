@extends('conectar')

@section('content')

<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">
        Gerenciar páginas
    </h3>

    @if(isset($paginas))
    
    @forelse($paginas as $Pagina)
    
    <div class="col-sm-4">
        <div class="box-criar">
            <a href="{{ action('PaginaController@getAcessarcomo', ['id' => $Pagina->id , 'tipo' => $Pagina->tipo ]) }}">
                <img src="{{ $Pagina->getAvatarUrl() }}" alt="{{ $Pagina->nome }}">
                <h4>{{ $Pagina->nome }}</h4>
            </a>
        </div>
    </div>
    
    @empty
        Sem páginas 
    @endforelse
    
    @endif
</div>

@endsection
