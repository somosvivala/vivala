@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>

	@if(Auth::user()->isAdmin())
		<nav class="row fundo-cheio">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<h1>Qual opção você deseja gerenciar?</h1>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-t-1">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 margin-t-2 margin-b-2 text-center">
					<a href="{{ url('gestao/usuarios') }}">
						<div class="margin-b-1"><i class="fa fa-line-chart fa-8x laranja"></i></div>
						<button class="btn btn-acao">Visualização da Base de Usuários</button>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 margin-t-2 margin-b-2 text-center">
					<a href="{{ url('gestao/logger') }}">
						<div class="margin-b-1"><i class="fa fa-gears fa-8x laranja"></i></div>
						<button class="btn btn-acao">Logger</button>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 margin-t-2 margin-b-2 text-center">
					<a href="{{ url('gestao/experiencias') }}">
						<div class="margin-b-1"><i class="fa fa-users fa-8x laranja"></i></div>
						<button class="btn btn-acao">Experiências</button>
					</a>
				</div>
			</div>
		</nav>
		<section class="row">

		</section>
	@elseif(!Auth::user()->isAdmin())
		<nav class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<i class="fa fa-warning fa-3x"></i> <h1>Área de acesso restrito</h1>
				<button></button>
			</div>
		</div>
	@endif

	{{-- @include('gestao.basededados._cadastros') --}}
	{{-- @include('gestao.logger._logger') --}}
	{{-- @include('gestao.experiencias._experiencias') --}}
	{{-- @include('gestao.experiencias._inscricoesexperiencias') --}}
	{{-- @include('gestao.experiencias._listaexperiencias') --}}

	<footer class="footer">
		@include('footer')
	</footer>
@endsection
