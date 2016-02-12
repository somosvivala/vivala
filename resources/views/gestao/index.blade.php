@extends('app')

@section('pilar')
	<nav class="navbar navbar-default menu-top header hidden-xs">
		@include('header')
	</nav>

	<nav class="col-xs-12 col-sm-12 col-md-12 hidden-xs">
            @if(Auth::user()->isAdmin())
                @include('gestao._cadastros')
            @endif

	</nav>

	<footer class="footer hidden-xs">
	@include('footer')
	</footer>

@endsection