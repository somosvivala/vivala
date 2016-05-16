@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<h1 class="titulo-mobile">
    Experiências
</h1>
<ul class="padding-b-1 lista-foto-descricao">
    @foreach($experiencias as $k=>$Experiencia)
    <li class="row">
        <a href="/experiencias/{{ $Experiencia->id}}">
            <div class="col-xs-6 {{ $k%2==0?'pull-right':'pull-left'}} foto" style="background-image:url('https://dev.vivala.com.br/img/dummyvoos.jpg')">
                <i class="fa fa-paw categoria"></i>
                {{-- <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}"> --}}
            </div>
            <div class="descricao col-xs-6">
                <span class="col-xs-12 local"><i class="fa fa-map-marker"></i> Sao Paulo</span>
                <span class="col-xs-12">{{ $Experiencia->descricao }}</span>
                <span class="col-xs-12 preco">R${{ $Experiencia->preco }}</span>
            </div>
        </a>
    </li>
    @endforeach
</ul>
<div class="barra-bottom">
</div>
@endsection
