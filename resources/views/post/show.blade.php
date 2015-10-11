@extends('conectar')

@section('content')
<ul class="lista-posts">
    <li class="col-sm-12 post" data-id="{{$Post->id}}">
        @if($Post->tipo_post == 'status')
            @include('post.tipo.status')
        @elseif($Post->tipo_post == 'foto')
            @include('post.tipo.foto')
        @elseif($Post->tipo_post == 'acontecimento')
            @include('post.tipo.acontecimento')
        @endif
    </li>
</ul>
@endsection
