@extends('cuidar')

@section('content')
<div class="fundo-cheio col-sm-12 margin-b-2 padding-b-2">
    <div class="absolute-top-right">
        <a href="{{ url('vagas/create') }}" class="btn btn-acao">Criar vaga</a>
    </div>
    <h3 class="font-bold-upper text-center margin-t-1 margin-b-2"> {{ trans('global.wannavolunteer_looking_for_jobs') }}
        <small class="sub-titulo margin-t-1">{{ trans('global.wannavolunteer_search_in_three_steps') }} </small>
    </h3>
    <div class="col-sm-12 text-center">
        @include('cuidar._filtracausa')
    </div>
</div>
<div class="col-sm-12 text-center">
    @include('cuidar._listacausafiltro')
</div>

@endsection
