@extends('mobiletemplate')

@section('content')
<div class="col-xs-12 fundo-laranja">
  <div class="col-xs-12 margin-t-1 margin-b-2 text-center container-logo">
      <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
  </div>
  <a href="#" class="link-voltar">
      <i class="fa fa-chevron-left"></i>
  </a>

    <div class="conteudo-mobile col-xs-10 col-xs-offset-1 margin-t-1 margin-b-1">
        <span class="texto-conheca-vivala">{!! trans('global.welcome_floatingballon4') !!}</span>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/kaIRH4Uh7nw" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
        </div>
        <div class="buttons">
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/cadastro') }}" class="btn-mobile" target="_self" rel="nofollow"> {!! trans('global.lbl_register_yourself') !!} </a>
            </div>
            <div class="row margin-t-1">
                <a href="{{ url('/autenticacao/login') }}" class="btn-mobile" target="_self" rel="nofollow"> {!! trans('global.lbl_login_yourself') !!} </a>
            </div>
            <div class="row margin-t-1">
                <a href="{{ url('/fbLogin') }}" class="btn-mobile btn-face" target="_self" rel="nofollow"> {!! trans('global.lbl_connect_yourself') !!} <span class="fa fa-facebook-square pull-right"></span> </a>
            </div>
        </div>
    </div>
</div>
@endsection
