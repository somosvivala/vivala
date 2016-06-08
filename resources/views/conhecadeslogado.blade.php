@extends('mobiletemplate')

@section('content')

    <div class="col-xs-12 fundo-laranja">
      <div class="col-xs-12 text-center container-logo">
            <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
        </div>
        <a href="#" class="link-voltar">
            <i class="fa fa-chevron-left"></i>
        </a>

        <div class="conteudo-mobile text-center">
            A plataforma para pessoas de todo o mundo que têm interesse em viajar e transformar o Brasil. Junte-se a nós!
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/TgqiSBxvdws" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="buttons">
                <div class="row margin-t-1">
                    <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> Cadastre-se </a>     
                </div>
                <div class="row margin-t-1">
                    <a href="{{ url('/autenticacao/login') }}" class="btn-mobile" target="_self" rel="nofollow"> Faça seu login </a>     
                </div>
                <div class="row margin-t-1">
                    <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> Conecte-se <span class="fa fa-facebook-square pull-right"></span> </a>     
                </div>
            </div>
        </div>
    </div>
@endsection
