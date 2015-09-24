@extends('app')

@section('pilar')

	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	{{-- Seção do topo com infos (a principio só do usuario) --}}
	@yield('barra-topo')

	<nav class="col-sm-3 col-md-2 left-panel">
		@include('viajar.menulateral')
	</nav>

	<nav class="col-sm-6 col-md-8">
		@yield('content')
	</nav>

	<nav class="col-sm-3 col-md-2 right-panel">
		@include('viajar.sugestoes')
	</nav>

	<footer class="footer">
	@include('footer')
	</footer>

@endsection
