@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	<nav class="margin-t-1 margin-b-1 col-xs-12 col-sm-12 col-md-12 hidden-xs">

		<div class="col-lg-12 fundo-cheio text-center">
			<h1 class="laranja"><i class="fa fa-users"></i> Experiências</h1>
		</div>

		<div class="col-lg-12 fundo-cheio">
        <ul class="list-inline menu-gestao">
						<li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="{{ url('/gestao/home') }}"> Voltar ao Menu de Gestão </a></li>
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="{{ url('/gestao/experiencias') }}"> Gestão de Experiências </a></li>
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="{{ url('/gestao/experiencias/createexperiencia') }}"> Criar Experiencia </a></li>
            <li><a class="inline btn btn-acao margin-t-1 margin-b-1" href="{{ url('/gestao/experiencias/createcategoria') }}"> Criar Categoria </a></li>
				</ul>

        {{-- Importando conteudo --}}
        @yield('gestao.experiencias.content')

    </div>
	</nav>

	<footer class="footer">
		@include('footer')
	</footer>

@endsection
