@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="col-sm-12">
    <h3 class="font-bold-upper text-center margin-b-2">
        {{ trans('global.termsconditions_title') }}
        <small class="sub-titulo margin-t-1 ajuste-fonte-avenir-medium">
            {{ trans('global.termsconditions_subtitle') }} :-)
        </small>
    </h3>
    <p class="col-sm-12 ajuste-fonte-avenir-light">
        {{ trans('global.termsconditions_intro_text') }}
    </p>
    <h5 class="titulo-zumbi col-sm-12">
        {{ trans('global.termsconditions_buying_terms_title') }}
    </h5>
    <p class="col-sm-12 ajuste-fonte-avenir-light">
        {{ trans('global.termsconditions_buying_terms_text') }}
    </p>
    <h5 class="titulo-zumbi col-sm-12">
        {{ trans('global.termsconditions_content_terms_title') }}
    </h5>
    <p class="col-sm-12 ajuste-fonte-avenir-light">
        {{ trans('global.termsconditions_content_terms_text') }}
    </p>
    <h5 class="titulo-zumbi col-sm-12">
        {{ trans('global.termsconditions_volunteer_policy_title') }}
    </h5>
    <p class="col-sm-12 ajuste-fonte-avenir-light">
        {{ trans('global.termsconditions_volunteer_policy_text') }}
    </p>
    <h5 class="titulo-zumbi col-sm-12">
        {{ trans('global.termsconditions_modifications_policy_title') }}
    </h5>
    <p class="col-sm-12 ajuste-fonte-avenir-light">
        {{ trans('global.termsconditions_modifications_policy_text') }}
    </p>
</div>
</div>
@endsection
