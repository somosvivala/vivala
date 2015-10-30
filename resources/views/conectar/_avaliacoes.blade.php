@extends('conectar')

@section('content')
{{--<h4 class="suave">{{ trans('global.lbl_review_') }}</h4>--}}
<div class="fundo-laranja-claro col-sm-12">
    <h3 class="font-bold-upper text-center texto-branco">{{ trans('global.lbl_review_') }}</h3>
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
            <img class="col-sm-12" id="avaliacoes-1" src="img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-1.png" data-zoom-image="/img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-1.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="avaliacoes-2" src="/img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-2.png" data-zoom-image="/img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-2.png" height="100%" alt="" title=""></img>
        </div>
        <div class="col-sm-12 text-center padding-b-10">
            <img class="col-sm-12" id="avaliacoes-3" src="img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-3.png" data-zoom-image="/img/financiamento-coletivo/quero-conectar/vivala_avaliacoes-3.png" height="100%" alt="" title=""></img>
        </div>
    </div>
</div>
@endsection
