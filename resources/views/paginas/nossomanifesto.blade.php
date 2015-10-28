@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <div class="col-sm-12">
        <h3 class="font-bold-upper text-center margin-t-1 margin-b-2">
            {{ trans('global.manifest_title') }}
            <small class="sub-titulo margin-t-1">
                {{ trans('global.manifest_subtitle') }}
            </small>
        </h3>
    </div>
    <div class="row margin-b-2">
        <iframe src="http://www.youtube.com/embed/kaIRH4Uh7nw"></iframe>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-12 cursor-default">
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_we_are_restless') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_first_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_first_paragraph_2') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_second_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_second_paragraph_2') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_fourth_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_fourth_paragraph_2') }}
                <br/>
                {{ trans('global.manifest_fourth_paragraph_3') }}
                <br>
                {{ trans('global.manifest_fourth_paragraph_4') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_fifth_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_fifth_paragraph_2') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_sixth_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_sixth_paragraph_2') }}
                <br/>
                {{ trans('global.manifest_sixth_paragraph_3') }}
                <br/>
                {{ trans('global.manifest_sixth_paragraph_4') }}
            </p>
            <p class="text-left margin-b-2">
                {{ trans('global.manifest_seventh_paragraph_1') }}
                <br/>
                {{ trans('global.manifest_seventh_paragraph_2') }}
                <br/>
                {{ trans('global.manifest_seventh_paragraph_3') }}
                <br/>
                <span class="text-uppercase text-strong laranja-hover"><strong>{{ trans('global.lbl_vivala') }}</strong></span>
            </p>
        <div>
    </div>
</div>
@endsection
