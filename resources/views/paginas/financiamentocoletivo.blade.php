@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="col-sm-12">
        <h3 class="font-bold-upper text-center margin-b-2">
            {{ trans('global.crowdfunding_hi_there') }}
        </h3>
        <div class="row margin-b-10">
            <h4 class="col-sm-12 text-center">
                {{ trans('global.crowdfunding_page_and_plan') }}
            </h4>
            <h4 class="col-sm-12 text-center margin-b-1">
                {{ trans('global.crowdfunding_we_need_you') }}
            </h4>
            <h4 class="col-sm-12 margin-t-2 text-center">
                {{ trans('global.crowdfunding_support_vivala') }}
            </h4>
            <h4 class="col-sm-12 text-center">
                <a href="http://www.catarse.me/pt/vivalabrasil?ref=explore" alt="{{ trans('global.crowdfunding_a_alt_crowdvivala') }}" title="{{ trans('global.crowdfunding_a_title_crowdvivala') }}" class="laranja" target="_blank">www.catarse.me/pt/vivalabrasil?ref=explore</a>
            </h4>
        </div>
    </div>
</div>
@endsection
