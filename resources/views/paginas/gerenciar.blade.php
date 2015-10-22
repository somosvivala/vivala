@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 padding-b-10">
    <h3 class="font-bold-upper text-center margin-b-2">
        {{ trans('global.lbl_page_manage') }}
    </h3>
    @if(isset($paginas))
        @forelse($paginas as $Pagina)
        <div class="col-sm-4">
            <div class="box-criar padding-t-1">
                <a href="{{ action('PaginaController@getAcessarcomo', ['id' => $Pagina->id , 'tipo' => $Pagina->tipo ]) }}" class="click-img-no-border">
                    <img src="{{ $Pagina->getAvatarUrl() }}" alt="{{ $Pagina->nome }}">
                    <h4>{{ $Pagina->nome }}</h4>
                </a>
            </div>
        </div>
        @empty
            {{ trans('global.lbl_page_not_founded') }}
        @endforelse
    @endif
</div>
@endsection
