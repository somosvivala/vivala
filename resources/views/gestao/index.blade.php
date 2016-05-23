@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header hidden-xs">
		@include('header')
	</nav>

	<nav class="col-xs-12 col-sm-12 col-md-6 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._experiencias')
            @endif
	</nav>

	<nav class="col-xs-12 col-sm-12 col-md-6 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._inscricoesexperiencias')
            @endif
	</nav>

	<nav class="margin-t-1 col-xs-12 col-sm-12 col-md-12 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._cadastros')
            @endif

	</nav>

	<nav class="margin-t-1 col-xs-12 col-sm-12 col-md-12 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._listaexperiencias')
            @endif
	</nav>

	<nav class="margin-t-1 col-xs-12 col-sm-12 col-md-12 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._logger')
            @endif
	</nav>

	<footer class="footer hidden-xs">
	@include('footer')
	</footer>

@endsection
