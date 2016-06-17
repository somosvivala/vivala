@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	<nav class="margin-t-1 margin-b-1 col-xs-12 col-sm-12 col-md-12 hidden-xs">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fundo-cheio text-center">
			<h1 class="laranja"><i class="fa fa-users"></i> Experiências</h1>
		</div>
		<div class="col-md-12 col-lg-12 fundo-cheio">
			<div class="col-md-6 col-lg-7">
			  @if(Auth::user()->isAdmin())
		    	@include('gestao.experiencias._experiencias')
			  @endif
			</div>
			<div class="col-md-6 col-lg-5">
				@if(Auth::user()->isAdmin())
		    	@include('gestao.experiencias._inscricoesexperiencias')
			  @endif
			</div>
		</div>
		<div class="col-md-12 col-lg-12 fundo-cheio">
			<div class="col-md-6 col-lg-6">
			  @if(Auth::user()->isAdmin())
		    	{{--@include('gestao.experiencias.categorias.index')--}}
			  @endif
			</div>
		</div>
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
