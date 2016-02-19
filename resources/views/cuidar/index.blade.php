@extends('cuidar')

@section('content')
<div id="tour-pilares" class="pilar-cuidar">
    <div class="foto-fundo foto-header" style="background-image:url('/img/querocuidar.png');">
        <h2>{{ trans('global.wannavolunteer_title') }}</h2>
        <h3>{{ trans('global.wannavolunteer_subtitle') }}</h3>
        <div class="col-sm-12">
            <a class="btn">{{ trans('global.wannavolunteer_how_it_works') }}</a>
        </div>
    </div>
    <div class="fundo-cheio col-sm-12 margin-b-2 margin-t-2 padding-b-2 tour-pilar-cuidar-step4">
        <h3 class="font-bold-upper text-center margin-b-2">{{ trans('global.wannavolunteer_cause_already_know')}}
            <small class="sub-titulo margin-t-1">{{ trans('global.wannavolunteer_cause_find_in_three_steps') }}</small>
        </h3>
        <div class="col-sm-12 text-center">
            @include('cuidar._filtracausa')
        </div>
    </div>
    <div class="col-sm-12 text-center">
        <h3 class="font-bold-upper text-center margin-b-2">{{ trans('global.wannavolunteer_see_some_causes') }}
            <small class="sub-titulo margin-t-1">{{ trans('global.wannavolunteer_find_some_projects_near_you') }}</small>
        </h3>
        @include('cuidar._listacausafiltro')
    </div>
</div>
@endsection
