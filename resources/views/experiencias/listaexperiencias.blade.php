@extends('mobiledeslogado')

@section('content')
<h1>
    Experiências
</h1>
<ul>
    @foreach($experiencias as $Experiencia)
    <li class="row">
        <a href="/experiencias/{{ $Experiencia->id}}">
            <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}">
            <h4 class="col-sm-6">{{ $Experiencia->titulo }}</h4>
            <span class="col-sm-6">{{ $Experiencia->descricao }}</span>
            <span class="col-sm-6">{{ $Experiencia->preco }}</span>
        </a>
    </li>
    @endforeach
</ul>
@endsection
