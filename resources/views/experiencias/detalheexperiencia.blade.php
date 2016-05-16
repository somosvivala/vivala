@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<div class="text-center row">
    {{-- <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}"> --}}
    <img class="col-sm-6" src="https://dev.vivala.com.br/img/dummyvoos.jpg">
</div>
<span class="col-sm-6">{{ $Experiencia->descricao }}</span>
<span class="col-sm-6">{{ $Experiencia->preco }}</span>
<span class="col-sm-6">{{ $Experiencia->preco }}</span>
<a class="btn" href="/experiencias/checkout/{{ $Experiencia->id }}">Bookar</a>
@endsection
