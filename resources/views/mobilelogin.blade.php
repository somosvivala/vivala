@extends('mobiletemplate')

@section('content')
    <div class="col-xs-12 text-center fundo-laranja">
        <div class="col-xs-12 margin-t-1 margin-b-2 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="#" class="link-voltar padding-t-1 history-back">
            <i class="fa fa-chevron-left"></i>
        </a>

        <div class="conteudo-mobile margin-b-2">
           {!! Form::open(['url' => '/autenticacao/login', 'class' => 'form-horizontal form-login']) !!}
              
            {{-- Incluindo listagem de erros --}}
            @include('errors.mobile-list')
            
              <div class="row margin-t-1">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::email("email", old('email'), ['required'=>'required','class' => 'form-mobile', 'placeholder' => trans('global.lbl_email') ]) !!}
                </div>
              </div>
              <div class="row margin-t-2">
                <div class="col-xs-10 col-xs-offset-1">
                  {!! Form::password("password", ['required'=>'required', 'class' => 'form-mobile', 'placeholder' => trans('global.lbl_password') ]) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-xs-10 col-xs-offset-1 text-left">
                  <a href="{{ url('/password/email') }}">
                    <small class="forgot-password">{!! trans('global.lbl_password_forgot') !!}</small>
                  </a>
                </div>
              </div>
              <div class="row margin-t-2">
                  <input type="submit" class="btn-mobile btn-verde" value="Login">
              </div>
            {!! Form::close() !!}
            <div class="row margin-t-2">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> {!! trans('global.lbl_register_yourself') !!} </a>
            </div>
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
