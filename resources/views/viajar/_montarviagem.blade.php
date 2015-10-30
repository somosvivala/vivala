@extends('viajar')

@section('content')
{{--<h4 class="suave">{{ trans('global.lbl_travel_setup') }}</h4>--}}
<div class="fundo-laranja-claro col-sm-12">
    <h3 class="font-bold-upper text-center texto-branco">{{ trans('global.lbl_travel_setup') }}</h3>
    <h6 class="font-bold-upper text-center texto-branco">{{ trans('global.lbl_preview')}}</h6>
</div>
<div class="fundo-cheio col-sm-12 text-justified">
    <div class="col-sm-12 margin-t-3">
        <h3 class="font-bold-upper text-center">
            {{ trans('global.crowdfunding_hi_there') }}
        </h3>
        <div class="row margin-b-2">
            <h4 class="col-sm-12 text-center">
                {{ trans('global.crowdfunding_page_and_plan') }}
            </h4>
            <h4 class="col-sm-12 text-center">
                {{ trans('global.crowdfunding_we_need_you') }}
            </h4>
            <h4 class="col-sm-12 text-center">
                {{ trans('global.crowdfunding_support_vivala') }}
            </h4>
            <h4 class="col-sm-12 text-center">
                <a href="http://www.catarse.me/pt/vivala" alt="{{ trans('global.crowdfunding_a_alt_crowdvivala') }}" title="{{ trans('global.crowdfunding_a_title_crowdvivala') }}" class="laranja" target="_blank">www.catarse.me/pt/vivala</a>
            </h4>
        </div>
    </div>
    <div class="col-sm-12 margin-b-2">
        <hr style="border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(230, 131, 44, 0.6), rgba(0, 0, 0, 0));">
        <h4 class="text-center margin-t-2">{{ trans('global.crowdfunding_see_the_screens') }}</h4>
        <h4 class="text-center">{{ trans('global.crowdfunding_all_the_struct') }}<span class="laranja"> {{ trans('global.crowdfunding_donators') }}</span>.</h4>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-1" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-1.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-1.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-2" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-2.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-2.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-3" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-3.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-3.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-4" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-4.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-4.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-5" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-5.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-5.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-6" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-6.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-6.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-7" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-7.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-7.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-8" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-8.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-8.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-9" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-9.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-9.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-10" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-10.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-10.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-11" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-11.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-11.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="montar-viagem-12" src="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-12.png" data-zoom-image="/img/financiamento-coletivo/quero-viajar/vivala_montar-viagem-12.png" height="100%" alt="" title=""></img>
        </div>
    </div>
</div>
@endsection
