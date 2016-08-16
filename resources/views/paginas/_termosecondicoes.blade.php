@extends('mobiletemplate')

@section('content')
  <div class="col-xs-12 fundo-laranja">
        <div class="col-xs-12 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="#" class="link-voltar history-back">
            <i class="fa fa-chevron-left"></i>
        </a>

    <div class="conteudo-mobile text-justified ">
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
