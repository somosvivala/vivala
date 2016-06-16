@extends('mobiletemplate')

@section('content')
    <div class="col-xs-12 fundo-laranja">
        <div class="col-xs-12 margin-t-1 margin-b-2 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="#" class="link-voltar">
            <i class="fa fa-chevron-left"></i>
        </a>
        <div class="conteudo-mobile col-xs-10 col-xs-offset-1">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <span class="form-mobile-error">{{ $error }}</span>
                @endforeach
            @endif
            <span class="form-mobile-warning hide" id="senhas-nao-coincidem">As senhas não coincidem</span>
              {!! Form::open(['url' => '/autenticacao/register']) !!}
            <div class="row margin-t-3">
            {!! Form::text("username", null, ['required'=>'required', 'class' => 'form-mobile', 'placeholder' => trans('global.lbl_name')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::email("email", old('email'), ['required'=>'required','class' => 'form-mobile', 'placeholder' => trans('global.lbl_email')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::password("password", ['required'=>'required','class' =>'form-mobile', 'placeholder' => trans('global.lbl_password')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::password("password_confirmation", ['required'=>'required','class'=>'form-mobile', 'placeholder' => trans('global.lbl_password_confirm') ]) !!}
            </div>
            <div class="row margin-t-1">
                {!! Form::submit( trans('global.lbl_register2') , ['class' => 'btn-mobile']) !!}
            </div>
            {!! Form::close() !!}
            <span class="texto-minusculo">{!! trans('global.lbl_or') !!}</span>
            <div class="row margin-t-1">
                <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook-square pull-right"></span> </a>
            </div>
            <div class="col-xs-12 margin-t-4 concorda-com">
                <span>{!! trans('global.welcome_aboutprivacy4') !!} <a href="{{ url('/paginas/termosecondicoes') }}" class="link-verde">{!! trans('global.lbl_legal_terms') !!}</a> {!! trans('global.lbl_and') !!} <a href="{{ url('/paginas/termosecondicoes') }}" class="link-verde">{!! trans('global.lbl_data_policy') !!}</a>
            </div>
        </div>
    </div>
@endsection
