@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<h1 class="titulo-mobile">
    Experiências
</h1>
<ul class="padding-b-1 lista-foto-descricao">
    @foreach($experiencias as $k=>$Experiencia)
    <li class="row">
        <a href="/experiencias/{{ $Experiencia->id}}">
            <div class="{{ $k%2==0?'direita':'esquerda'}} foto">
                <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                    <div class="categorias-experiencia">
                        @foreach($Experiencia->categorias as $Categoria)
                            <div class="icone">
                                <i class="fa fa-{{ $Categoria->icone }}"></i>
                                {{-- <span>{{ $Categoria->nome }}</span> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}"> --}}
            </div>
            <div class="{{ $k%2!=0?'direita':'esquerda'}} descricao">
                <div class="container">
                    <span class="col-xs-12 negrito-exp"><i class="fa fa-map-marker"></i> Sao Paulo</span>
                    <span class="col-xs-12 negrito-exp">R${{ $Experiencia->preco }}</span>
                    <span class="pull-left margin-t-1">{{ $Experiencia->descricao }}</span>
                </div>
            </div>
        </a>
    </li>
    @endforeach
</ul>
<div class="barra-bottom text-center">
    <button class="icone-bottom">
        <i class="fa fa-bars"></i>
        <span>Filtrar</span>
    </button>
</div>
@endsection
