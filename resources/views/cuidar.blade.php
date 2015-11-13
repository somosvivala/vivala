@extends('app')

@section('pilar')

        <div class="mobile-warning fundo-cheio text-justified padding-b-2 padding-t-2 hidden-md hidden-lg ">
            <div class="row">
                <h3 class="font-bold-upper text-center margin-b-2">
                    {{ trans('global.mobile_warning_welcome') }}
                    {{-- trans('global.crowdfunding_hi_there') --}}
                </h3>
            </div>
            <div class="row margin-b-10">
                <h4 class="col-xs-12 text-center margin-b-1">
                    {{ trans('global.mobile_warning_desctopo') }}
                </h4>
                <h4 class="col-xs-12 margin-t-2 text-center">
                    {!! trans('global.mobile_warning_descbody') !!}
                </h4>
                <h4 class="col-xs-12 text-center">
                    {!! trans('global.mobile_warning_desclink') !!}
                </h4>
            </div>
        </div>

	<nav class="navbar navbar-default menu-top header hidden-xs">
		@include('header')
	</nav>
	{{-- Seção do topo com infos (a principio só do usuario) --}}
	@yield('barra-topo')

	<nav class="col-xs-12 col-sm-3 col-md-2 left-panel hidden-xs">
		@include('cuidar.menulateral')
	</nav>

	<nav class="col-xs-12 col-sm-6 col-md-8 hidden-xs">
		@yield('content')
	</nav>

	<nav class="hidden-xs col-sm-3 col-md-2 right-panel hidden-xs">
		@include('cuidar.sugestoes')
	</nav>

	<footer class="footer hidden-xs">
	@include('footer')
	</footer>

@endsection
