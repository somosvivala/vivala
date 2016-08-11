@extends('conectar')

@section('content')
<div class="col-sm-12 text-justified padding-b-2">
    <div class="row fundo-cheio">
        <h3 class="font-bold-upper text-center margin-b-2">
            {{ trans('global.aboutus_title') }}
            <small class="sub-titulo margin-t-1 ajuste-fonte-avenir-medium">
                {{ trans('global.aboutus_subtitle') }}
            </small>
        </h3>
    </div>
    <div class="row margin-b-2">
        <img src="{{ asset('/img/quemsomos.png') }}" alt="{{ trans('global.aboutus_coverphoto_img_alt') }}" title="{{ trans('global.aboutus_coverphoto_img_title') }}" class="width-100"></img>
    </div>
    <div class="row">
        <div class="col-sm-6 padding-l-0">
            <div class="fundo-cheio padding-t-1 padding-b-1 padding-l-1 padding-r-1">
                <div id="vivala_missao" class="text-center margin-b-1">
                    <i class="fa fa-2x fa-bullseye laranja"></i>
                    <span class="font-bold-upper laranja margin-l-1">
                        {{ trans('global.aboutus_subtitle_our_mission') }}
                    </span>
                </div>
                <p class="text-justify ajuste-fonte-avenir-light">
                    {{ trans('global.aboutus_our_mission_text') }}<br><br><br>
                </p>
            </div>
        </div>
        <div class="col-sm-6 padding-r-0">
            <div class="fundo-cheio padding-t-1 padding-b-1 padding-l-1 padding-r-1">
                <div id="vivala_existe" class="text-center margin-b-1">
                    <i class="fa fa-2x fa-lightbulb-o laranja"></i>
                    <span class="font-bold-upper laranja margin-l-1">
                        {{ trans('global.aboutus_subtitle_why_we_exist') }}
                    </span>
                </div>
                <p class="text-justify ajuste-fonte-avenir-light">
                    {{ trans('global.aboutus_why_we_exist_text') }}
                </p>
            </div>
        </div>
    </div>
    <div class="row margin-t-2">
        <div class="fundo-cheio padding-t-1 padding-l-1 padding-r-1 padding-b-4">
            <div id="vivala_missao" class="text-center margin-b-1">
                <i class="fa fa-2x fa-book laranja"></i>
                <span class="font-bold-upper laranja margin-l-1">
                    {{ trans('global.aboutus_subtitle_our_history') }}
                </span>
            </div>
            <p class="text-justify ajuste-fonte-avenir-light">
                {{ trans('global.aboutus_our_history_text_1') }}
            </p>
            <p class="text-justify ajuste-fonte-avenir-light">
                {{ trans('global.aboutus_our_history_text_2') }}
            </p>
            <p class="text-justify ajuste-fonte-avenir-light">
                {{ trans('global.aboutus_our_history_text_3') }}
            </p>
        </div>
    </div>
</div>
@endsection
