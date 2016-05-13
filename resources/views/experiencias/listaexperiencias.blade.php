@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<h1 class="titulo-mobile">
    Experiências
</h1>
<ul>
    @foreach($experiencias as $Experiencia)
    <li class="row">
        <a href="/experiencias/{{ $Experiencia->id}}">
            <div class="col-sm-6">
                <img class="" src="https://dev.vivala.com.br/img/dummyvoos.jpg" alt="{{ $Experiencia->titulo }}">
                {{-- <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}"> --}}
            </div>
            <h4 class="col-sm-6">{{ $Experiencia->titulo }}</h4>
            <span class="col-sm-6">{{ $Experiencia->descricao }}</span>
            <span class="col-sm-6">{{ $Experiencia->preco }}</span>
        </a>
    </li>
    @endforeach
</ul>
@endsection
