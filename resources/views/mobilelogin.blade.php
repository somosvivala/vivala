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
           <span class="form-error">Email não cadastrado</span> 
            <div class="row"><input type="email" placeholder="EMAIL" class="form-mobile"></div>
            <div class="row"><input type="password" placeholder="SENHA" class="form-mobile"></div>
            <div class="row"><a href="#">Esqueci minha senha</a></div>
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow">Login</a>
            </div>
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> Cadastre-se </a>
            </div>
            ou
                <div class="row margin-t-1">
                    <a href="{{ url('/fbLogin') }}" class="btn-mobile" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook"></span> </a>     
                </div>
        </div>
    </div>
@endsection
