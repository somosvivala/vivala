@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="row">
        <h3 class="font-bold-upper text-center margin-b-2">
            {{ trans('global.partners_title') }}
            <small class="sub-titulo margin-t-1">
                {{ trans('global.partners_subtitle') }}
            </small>
        </h3>
    </div>
    <div class="row margin-b-2">
        <img src="/img/parceiros.png" alt="{{ trans('global.partners_coverphoto_img_alt') }}" title="{{ trans('global.partners_coverphoto_img_title') }}" class="width-100"></img>
    </div>
    <div class="row">
        <div class="col-sm-12 padding-b-4">
            <div class="col-sm-12">
                <p class="text-justify">
                    {{ trans('global.partners_main_text') }}
                    <br/>
                    <br/>
                    {{ trans('global.partners_text_1') }}
                    <br/>
                    {{ trans('global.partners_text_2') }}
                    <br/>
                    {{ trans('global.partners_text_3') }}
                    <br/>
                    {{ trans('global.partners_text_4') }}
                    <br/>
                    {{ trans('global.partners_text_5') }}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <span class="margin-l-1 margin-r-1 cursor-default">
                <div class="col-sm-4 spritemap-parceiros sprite-decolar" alt="decolar.com" title="decolar.com"></div>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <div class="col-sm-4 spritemap-parceiros sprite-chefsclub" alt="chefsclub.com.br" title="chefsclub.com.br"></div>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <div class="col-sm-4 spritemap-parceiros sprite-clickbus" alt="clickbus.com.br" title="clickbus.com.br"></div>
            </span>
        </div>
    </div>
</div>
@endsection
