@extends('conectar')

@section('content')
<div class="container-fluid text-justified padding-b-2 fundo-cheio">
    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-lg-10">
      <div class="row">
        <h3 class="text-center margin-b-2 font-bold-upper">
            {!! trans('global.termsconditions_title') !!}
            <small class="margin-t-1 sub-titulo ajuste-fonte-avenir-medium">
                {!! trans('global.termsconditions_subtitle') !!}
            </small>
        </h3>
      </div>
      <div class="row">
        <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_intro_text') !!}
        </p>
        <h5 class="col-md-12 col-lg-12 titulo-zumbi">
            {!! trans('global.termsconditions_buying_terms_title') !!}
        </h5>
        <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_buying_terms_text') !!}
        </p>
        <h5 class="col-md-12 col-lg-12 titulo-zumbi">
            {!! trans('global.termsconditions_content_terms_title') !!}
        </h5>
        <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_content_terms_text') !!}
        </p>
        <h5 class="col-md-12 col-lg-12 titulo-zumbi">
            {!! trans('global.termsconditions_volunteer_policy_title') !!}
        </h5>
        <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_volunteer_policy_text') !!}
        </p>
        <h5 class="col-md-12 col-lg-12 titulo-zumbi">
            {!! trans('global.termsconditions_modifications_policy_title') !!}
        </h5>
        <p class="col-md-12 col-lg-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_modifications_policy_text') !!}
        </p>
      </div>
    </div>
</div>
@endsection
