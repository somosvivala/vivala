@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="row">
        <h3 class="font-bold-upper text-center margin-b-2">
            {{ trans('global.whatwedo_title') }}
            <small class="sub-titulo margin-t-1">
                {{ trans('global.whatwedo_subtitle') }}
            </small>
        </h3>
    </div>
    <div class="row margin-b-2">
        <img src="/img/oquefazemos.png" alt="{{ trans('global.whatwedo_coverphoto_img_alt') }}" title="{{ trans('global.whatwedo_coverphoto_img_title') }}" class="width-100"></img>
    </div>
    <div class="row">
        <div class="col-sm-12 padding-b-4">
            <div class="col-sm-12">
                <h5 class="margin-b-2 font-bold-upper text-center">
                    {{ trans('global.whatwedo_were_global_plataform') }}
                </h5>
            </div>
            <p class="text-justify">
                {{ trans('global.whatwedo_main_text') }}
            </p>
        </div>
    </div>
</div>
@endsection
