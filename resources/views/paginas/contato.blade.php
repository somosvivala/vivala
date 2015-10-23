@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <h3 class="font-bold-upper text-center margin-b-2">
        {{ trans('global.contact_title') }}
        <small class="sub-titulo margin-t-1">
            {{ trans('global.contact_subtitle') }}
        </small>
    </h3>
    <div class="col-sm-5">
        <p>{{ trans('global.contact_text_1') }}</p>
        <p class="margin-b-2">{{ trans('global.contact_text_2') }}</p>
        <hr style="border: 0; height: 0; border-top: 2px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
        <div class="row padding-t-2 padding-b-2 ">
            <div class="col-sm-12">
                {{ trans('global.contact_our_email') }}
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="mailto:queroconversar@vivalabrasil.com.br">queroconversar@vivalabrasil.com.br</a>
            </div>
        </div>
        <div class="row padding-t-2 padding-b-2 ">
            <div class="col-sm-12">
                {{ trans('global.contact_our_phone') }}
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="tel:+55 11 3758 4726">(11) 3758-4726</a>
            </div>
        </div>
        <div class="row padding-t-2 ">
            <div class="col-sm-12">
                {{ trans('global.contact_our_address') }}
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" title="CLique para abrir no Google Maps" href="https://www.google.com.br/maps/place/R.+Aspicuelta,+345+-+Alto+de+Pinheiros,+S%C3%A3o+Paulo+-+SP/@-22.8755115,-46.1800783,6z/data=!4m2!3m1!1s0x94ce57978b550665:0xc675435d412b5648" target="_blank">Rua Aspicuelta, 345 - São Paulo, SP</a>
            </div>
        </div>
    </div>
    <div class="col-sm-7 form-borda-preta">
        {!! Form::open(['url' => 'contato']) !!}
            {!! Form::text("nome", '', ['title' => trans('global.lbl_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("email", '', ['title' => trans('global.lbl_email'), 'placeholder' => trans('global.lbl_email'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("assunto", '', ['title' => trans('global.lbl_subject_feedback'), 'placeholder' => trans('global.lbl_subject_feedback'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::textarea("mensagem", null, ['title'=> trans('global.lbl_message'), 'aria-label'=> trans('global.lbl_message'), 'placeholder'=> trans('global.lbl_message'), 'class' => 'form-control sem-resize margin-b-1' ]) !!}
            {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao pull-right']) !!}
        {!! Form::close() !!}
    </div>
    <div class="row col-sm-12 container-fluid margin-t-3">
        <div id="vivala-social-network" class="text-right">
            <a href="https://facebook.com/somosvivala" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" target="_blank"><i class="fa fa-2x fa-facebook-square laranja"></i></a>
            <a href="https://instagram.com/somosvivala" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" target="_blank"><i class="fa fa-2x fa-instagram laranja"></i></a>
            <a href="https://www.youtube.com/channel/UCT8bbWeVmbaDDMxvWlI8bBA" alt="{{ trans('global.social_network_youtube_img_alt') }}" title="{{ trans('global.social_network_youtube_img_title') }}" target="_blank"><i class="fa fa-2x fa-youtube-square laranja"></i></a>
            <a href="https://www.linkedin.com/company/6612965" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}"  target="_blank"><i class="fa fa-2x fa-linkedin-square laranja"></i></a>
        </div>
    </div>
</div>
@endsection
