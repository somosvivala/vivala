@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<a href="/experiencias" class="link-voltar">
    <i class="fa fa-chevron-left"></i>
</a>
<section class="experiencia">
    <div class="descricao">
        <span class="col-xs-12 negrito-exp text-center"><i class="fa fa-map-marker"></i>{{ $Experiencia->local->nome}}</span>
        <span class="col-xs-12 negrito-exp text-center">{{ $Experiencia->preco }}</span>
        <span class="descricao-inicial">{{ $Experiencia->descricao }}</span>
        <div class="owner">
            ONG
        </div>
    
        <span class="col-xs-12 negrito-exp">Informações</span>
        <span class="col-xs-12 negrito-exp">Detalhes da experiência</span>
    </div>

    <div class="foto-experiencia margin-t-1">
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
    </div>
    <a class="btn-full-bottom" href="/experiencias/checkout/{{ $Experiencia->id }}">Se inscreva aqui</a>
</section >
@endsection
