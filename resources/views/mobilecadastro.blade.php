@extends('mobiletemplate')

@section('content')
    <div class="col-xs-12 text-center fundo-laranja">
        <div class="col-xs-12 margin-t-1 margin-b-2 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="{{ url('experiencias') }}" class="link-voltar padding-t-1 history-back">
            <i class="fa fa-chevron-left"></i>
        </a>
        <div class="conteudo-mobile margin-b-1">

            {{-- Incluindo listagem de erros --}}
            @include('errors.mobile-list')

            {{-- DESATIVADO
            <div class="row">
              <div class="form-mobile-warning hide" id="senhas-nao-coincidem">
                {!! trans('global.lbl_password_dont_match') !!}!
              </div>
            </div>
            --}}
            <div class="row">
              <div class="form-mobile-warning2 hide" id="capslock-ligado">
                {!! trans('global.lbl_capslock_activated') !!}!
              </div>
            </div>
            {!! Form::open(['url' => '/autenticacao/register', 'class' => 'form-por-ajax', 'data-callback' => 'callbackCadastroMobile()', 'data-loading' => '.ajax-loading', 'data-errors' => '.error-container']) !!}
              <div class="row margin-t-1">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::text("username", null, ['required'=>'required', 'class' => 'form-mobile', 'placeholder' => trans('global.lbl_name')]) !!}
                </div>
              </div>
              <div class="row margin-t-1">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::email("email", old('email'), ['required'=>'required','class' => 'form-mobile', 'placeholder' => trans('global.lbl_email')]) !!}
                </div>
              </div>
              <div class="row margin-t-1">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::password("password", ['required'=>'required','class' =>'form-mobile', 'placeholder' => trans('global.lbl_password')]) !!}
                </div>
              </div>
              <div class="row margin-t-1">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::password("password_confirmation", ['required'=>'required','class'=>'form-mobile', 'placeholder' => trans('global.lbl_password_confirm') ]) !!}
                </div>
              </div>
              <div class="row margin-t-2">
                  {!! Form::submit( trans('global.lbl_register2') , ['class' => 'btn-mobile']) !!}
                  <p class="ajax-loading text-center hidden"><i class='fa fa-1-5x fa-spin fa-pulse fa-spinner laranja'></i></p>
              </div>
            {!! Form::close() !!}
            <div class="row margin-t-1">
              <span class="texto-minusculo">{!! trans('global.lbl_or') !!}</span>
            </div>
            <div class="row margin-t-1">
                <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> {!! trans('global.lbl_connect_yourself') !!} <span class="fa fa-facebook-square pull-right"></span> </a>
            </div>
            <div class="row margin-t-2">
              <div class="col-xs-12 concorda-com">
                <span>{!! trans('global.welcome_aboutprivacy4') !!} <a href="{{ url('/paginas/termosecondicoes') }}" class="link-verde">{!! trans('global.lbl_legal_terms') !!}</a> {!! trans('global.lbl_and') !!} <a href="{{ url('/paginas/termosecondicoes') }}" class="link-verde">{!! trans('global.lbl_data_policy') !!}</a>
              </div>
            </div>
        </div>
    </div>
@endsection
