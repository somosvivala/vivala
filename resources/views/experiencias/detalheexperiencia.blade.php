@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<section class="experiencia">
    <div class="foto-experiencia margin-t-1">
        <div class="foto-img" style="background-image:url('https://dev.vivala.com.br/img/dummyvoos.jpg')">
            <div class="categorias">
                <i class="fa fa-paw"></i>
            </div>
        </div>
    </div>

    <span class="col-sm-6">{{ $Experiencia->descricao }}</span>
    <span class="col-sm-6">{{ $Experiencia->preco }}</span>
    <span class="col-sm-6">{{ $Experiencia->preco }}</span>
    <a class="btn" href="/experiencias/checkout/{{ $Experiencia->id }}">Bookar</a>
</section >
@endsection
