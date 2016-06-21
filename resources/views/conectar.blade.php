@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header hidden-xs">
		@include('header')
	</nav>
	{{-- Seção do topo com infos (a principio só do usuario) --}}
	@yield('barra-topo')

	<nav class="col-sm-3 col-md-2 left-panel hidden-xs">
		@include('conectar.menulateral')
	</nav>

	<nav class="col-sm-6 col-md-8 hidden-xs">
		@yield('content')
	</nav>

	<nav class="col-sm-3 col-md-2 right-panel hidden-xs">
		@include('conectar._sugestoes')
	</nav>

	<footer class="footer hidden-xs">
	@include('footer')
	</footer>

@endsection
