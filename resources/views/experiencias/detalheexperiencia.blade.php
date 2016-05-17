@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<section class="experiencia">
    <div class="descricao">
        <span class="col-xs-12"><i class="fa fa-map-marker"></i>Xao Paulo</span>
        <span class="col-xs-12">{{ $Experiencia->preco }}</span>
        <span class="col-xs-12">{{ $Experiencia->descricao }}</span>
    </div>

    <div class="foto-experiencia margin-t-1">
        <div class="foto-img" style="background-image:url('https://dev.vivala.com.br/img/dummyvoos.jpg')">
            <div class="categorias">
                <i class="fa fa-paw"></i>
            </div>
        </div>
    </div>
    <a class="btn-full-bottom" href="/experiencias/checkout/{{ $Experiencia->id }}">Bookar</a>
</section >
@endsection
