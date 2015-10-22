@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="row">
        <h3 class="font-bold-upper text-center margin-b-2">
            {{ trans('golbal.partners_title') }}
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
            {{-- TODO: Trabalhar no responsivo dos logos, lembrar --}}
            <!-- <a href="" alt="decolar.com" title="decolar.com" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/decolar.png" style="width: 124px; height: 30px;"></img>
            </a>
            <a href="" alt="chefsclub.com.br" title="chefsclub.com.br" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/chefsclub.png" style="width: 43px; height: 30px;"></img>
            </a>
            <a href="" alt="clickbus.com.br" title="clickbus.com.br" target="_blank" class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/clickbus.png" style="width: 102px; height: 30px;"></img>
            </a> -->
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/decolar.png" alt="decolar.com" title="decolar.com" style="width: 124px; height: 30px;"></img>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/chefsclub.png" alt="chefsclub.com.br" title="chefsclub.com.br" style="width: 43px; height: 30px;"></img>
            </span>
            <span class="margin-l-1 margin-r-1 cursor-default">
                <img src="/img/parceiros/clickbus.png" alt="clickbus.com.br" title="clickbus.com.br" style="width: 102px; height: 30px;"></img>
            </span>
        </div>
    </div>
</div>
@endsection
