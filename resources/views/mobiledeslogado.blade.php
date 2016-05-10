@extends('app')

@section('pilar')

<nav>
    Conheça a Vivalá
</nav>
<div>
    @yield('content')
</div>
	<footer class="footer hidden-xs">
		@include('footer')
	</footer>

@endsection
