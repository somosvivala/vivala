@extends('cuidar')

@section('content')
<div class="fundo-cheio col-sm-12 margin-b-2 padding-b-2">
    <div class="absolute-top-right">
        <a href="{{ url('vagas/create') }}"  class="padding-btn suave ">Criar vaga</a>
    </div>
    <h3 class="font-bold-upper text-center"> Procurando por causas?
        <small class="sub-titulo">Encontre em 3 passos.</small>
    </h3>
    <div class="col-sm-12 text-center">
        @include('cuidar._filtracausa')
    </div>
</div>
<div class="col-sm-12 text-center">
    @include('cuidar._listacausafiltro')
</div>

@endsection
