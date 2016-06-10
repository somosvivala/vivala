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
           {!! Form::open(['url' => '/auth/login', 'class' => 'form-horizontal form-login']) !!}
           <span class="form-mobile-error">Email não cadastrado</span> 
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <span class="form-mobile-error">{{ $error }}</span> 
                @endforeach
            @endif
            <div class="row margin-t-3">
            {!! Form::email("email", old('email'), ['class' => 'form-mobile', 'placeholder' => trans('global.lbl_email') ]) !!}
            </div>
            <div class="row margin-t-2">
            {!! Form::password("password", ['class' => 'form-mobile', "placeholder" => trans('global.lbl_password') ]) !!}
            </div>
            <div class="row"><a href="#"><small class="text-left width20em">Esqueci minha senha</small></a></div>
            <div class="row margin-t-1 margin-t-1">
                <input type="submit" class="btn-mobile btn-verde" value="Login">
            </div>
            {!! Form::close() !!}
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> Cadastre-se </a>
            </div>
            ou
                <div class="row margin-t-1">
                    <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook-square pull-right"></span> </a>     
                </div>
                <div class="col-xs-12 margin-t-4 concorda-com">
                    <span>Ao se cadastrar, você concorda com nossos <a href="/paginas/termosecondicoes" class="link-verde">Termos de Uso</a> e <a href="/paginas/termosecondicoes" class="link-verde">Política de Dados</a>
                </div>
        </div>
    </div>
@endsection
