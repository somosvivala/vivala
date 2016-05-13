@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<h1>{{ $Experiencia->titulo }}</h1>
<img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}">
<span class="col-sm-6">{{ $Experiencia->descricao }}</span>
<span class="col-sm-6">{{ $Experiencia->preco }}</span>
<span class="col-sm-6">{{ $Experiencia->preco }}</span>
<a class="btn" href="/experiencias/checkout/{{ $Experiencia->id }}">Bookar</a>
@endsection
