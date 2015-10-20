@extends('cuidar')

@section('barra-topo')
@endsection

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">{{ trans('global.ong_search_for_ongs') }}
        <small class="sub-titulo">{{ trans('global.ong_find_ongs_three_steps') }}</small>
    </h3>
    <div class="col-sm-12 margin-b-2 margin-t-2 text-center">
        @include('cuidar._filtraongs')
    </div>
    <div class="col-sm-12 text-center">
        @include('cuidar._listaongs')
    </div>
</div>
@endsection
