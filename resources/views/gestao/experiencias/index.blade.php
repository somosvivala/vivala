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

        <ul class="list-inline menu-gestao-experiencias">
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="/gestao/experiencias"> Home </a></li>
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="/gestao/experiencias/createexperiencia"> Criar Experiencia </a></li>
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="/gestao/experiencias/createcategoria"> Criar Categoria </a></li>
        </ul>

        {{-- Importando conteudo --}}
        @yield('gestao.experiencias.content');

    </div>


		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-b-1 fundo-cheio text-center padding-t-2">
			<a href="{{ url('/gestao/home') }}">
				<button class="btn btn-acao">Voltar ao Menu de Gestão</button>
			</a>
		</div>
	</nav>
	<footer class="footer">
		@include('footer')
	</footer>
@endsection
