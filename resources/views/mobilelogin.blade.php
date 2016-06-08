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
           <span class="form-mobile-error">Email não cadastrado</span> 
            <div class="row margin-t-3"><input type="email" placeholder="EMAIL" class="form-mobile"></div>
            <div class="row margin-t-2"><input type="password" placeholder="SENHA" class="form-mobile"></div>
            <div class="row"><a href="#"><small class="text-left width20em">Esqueci minha senha</small></a></div>
            <div class="row margin-t-1 margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile btn-verde" target="_self" rel="nofollow">Login</a>
            </div>
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> Cadastre-se </a>
            </div>
            ou
                <div class="row margin-t-1">
                    <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook-square pull-right"></span> </a>     
                </div>
        </div>
    </div>
@endsection
