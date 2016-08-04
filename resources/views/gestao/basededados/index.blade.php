@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	<nav class="col-lg-12 margin-t-1 margin-b-1">

		<div class="col-lg-12 fundo-cheio text-center">
			<h1 class="laranja"><i class="fa fa-line-chart"></i> Base de Usuários</h1>
		</div>

		<div class="col-lg-12 fundo-cheio">
				<ul class="list-inline menu-gestao">
						<li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="{{ url('/gestao/home') }}"> Voltar ao Menu de Gestão </a></li>
				</ul>
		</div>

	  @if(Auth::user()->isAdmin())
    	@include('gestao.basededados._cadastros')
	  @endif
	</nav>

	<footer class="footer">
		@include('footer')
	</footer>

@endsection
