@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	<nav class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-t-1 margin-b-1">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fundo-cheio text-center">
			<h1 class="laranja"><i class="fa fa-line-chart"></i> Base de Usuários</h1>
		</div>
	  @if(Auth::user()->isAdmin())
    	@include('gestao.basededados._cadastros')
	  @endif
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-b-1 fundo-cheio text-center">
			<a href="{{ url('/gestao/home') }}">
				<button class="btn btn-acao">Voltar ao Menu de Gestão</button>
			</a>
		</div>
	</nav>
	<footer class="footer">
		@include('footer')
	</footer>
@endsection
