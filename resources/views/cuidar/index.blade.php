@extends('cuidar')

@section('content')
<div class="foto-fundo foto-header" style="background-image:url('/img/querocuidar.png');">
    <h2>Cuide do Brasil</h2>
    <h3>Faça trabalhos voluntários e desenvolva o país.</h3>
    <div class="col-sm-12">
        <a class="btn">{{ trans('global.lbl_how_it_works') }}</a>
    </div>
</div>
<div class="fundo-cheio col-sm-12 margin-b-2 margin-t-2 padding-b-2">
    <h3 class="font-bold-upper text-center"> Já sabe qual causa ajudar?
        <small class="sub-titulo">Encontre projetos de Impacto Social em 3 passos.</small>
    </h3>
    <div class="col-sm-12 text-center">
        @include('cuidar._filtracausa')
    </div>
</div>
<h3 class="font-bold-upper text-center margin-b-1"> Veja causas nobres
    <small class="sub-titulo">Descubra projetos de impacto social pertinho de você!</small>
</h3>
<div class="col-sm-12 text-center">
    @include('cuidar._listacausafiltro')
</div>

@endsection
