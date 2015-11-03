@extends('app')

@section('pilar')

        <div class="fundo-cheio text-justified padding-b-2 padding-t-2 hidden-md hidden-lg ">
            <div class="row">
                <h3 class="font-bold-upper text-center margin-b-2">
                    {{ trans('global.crowdfunding_hi_there') }}
                </h3>
            </div>
            <div class="row margin-b-10">
                <h4 class="col-xs-12 text-center">
                    {{ trans('global.crowdfunding_page_and_plan') }}
                </h4>
                <h4 class="col-xs-12 text-center margin-b-1">
                    {{ trans('global.crowdfunding_we_need_you') }}
                </h4>
                <h4 class="col-xs-12 margin-t-2 text-center">
                    {{ trans('global.crowdfunding_support_vivala') }}
                </h4>
                <h4 class="col-xs-12 text-center">
                    <a href="http://www.catarse.me/pt/vivala" alt="{{ trans('global.crowdfunding_a_alt_crowdvivala') }}" title="{{ trans('global.crowdfunding_a_title_crowdvivala') }}" class="laranja" target="_blank">www.catarse.me/pt/vivala</a>
                </h4>
            </div>
        </div>

	<nav class="navbar navbar-default menu-top header">
		@include('header')
	</nav>
	{{-- Seção do topo com infos (a principio só do usuario) --}}
	@yield('barra-topo')

	<nav class="col-xs-12 col-sm-3 col-md-2 left-panel">
		@include('cuidar.menulateral')
	</nav>

	<nav class="col-xs-12 col-sm-6 col-md-8">
		@yield('content')
	</nav>

	<nav class="hidden-xs col-sm-3 col-md-2 right-panel">
		@include('cuidar.sugestoes')
	</nav>

	<footer class="footer">
	@include('footer')
	</footer>

@endsection
