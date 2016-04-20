@extends('templatedeslogado')

@section('content')
<div class="container-fluid padding-b-2 text-justified fundo-termos-compromisso">
  <div class="row">
    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
      <div class="row">
        <h3 class="margin-b-2 text-center font-bold-upper">
            {!! trans('global.termsconditions_title') !!}
            <small class="margin-t-1 ajuste-fonte-avenir-medium sub-titulo">
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
        <h5 class="titulo-zumbi col-sm-12">
            {!! trans('global.termsconditions_volunteer_policy_title') !!}
        </h5>
        <p class="col-sm-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_volunteer_policy_text') !!}
        </p>
        <h5 class="titulo-zumbi col-sm-12">
            {!! trans('global.termsconditions_modifications_policy_title') !!}
        </h5>
        <p class="col-sm-12 ajuste-fonte-avenir-light">
            {!! trans('global.termsconditions_modifications_policy_text') !!}
        </p>
      </div>
      <div class="row margin-t-2 text-center">
        <a href="{{ url('home') }}" target="_self" rel="" class="btn btn-acao">
          {{ trans('global.lbl_home') }}
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
