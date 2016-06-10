@extends('mobiletemplate')

@section('content')
    <div class="col-xs-12 fundo-laranja">
        <div class="col-xs-12 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="#" class="link-voltar">
            <i class="fa fa-chevron-left"></i>
        </a>

        <div class="conteudo-mobile ">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <span class="form-mobile-error">{{ $error }}</span> 
                @endforeach
            @endif
              {!! Form::open(['url' => '/autenticacao/register']) !!}
            <div class="row margin-t-1">
            {!! Form::text("username", null, ['class' => 'form-mobile', 'placeholder' => trans('global.lbl_name')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::email("email", old('email'), ['class' => 'form-mobile', 'placeholder' => trans('global.lbl_email')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::password("password", ['class' => 'form-mobile', "placeholder" => trans('global.lbl_password')]) !!}
            </div>
            <div class="row margin-t-1">
            {!! Form::password("password_confirmation", ['class' => 'form-mobile', "placeholder" => trans('CONFIRMAR SENHA') ]) !!}
            </div>
            <div class="row margin-t-1">
                {!!Form::submit( 'Cadastrar', ['class' => 'btn-mobile']) !!}
            </div>
            {!! Form::close() !!}
            ou
                <div class="row margin-t-1">
                    <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook-square pull-right"></span> </a>     
                </div>
        </div>
    </div>
@endsection
