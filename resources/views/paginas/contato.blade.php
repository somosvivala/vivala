@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12 text-justified padding-b-2">
    <h3 class="font-bold-upper text-center margin-b-2">
        {{ trans('global.contact_title') }}
        <small class="sub-titulo margin-t-1 ajuste-fonte-avenir-medium">
            {{ trans('global.contact_subtitle') }}
        </small>
    </h3>
    <div class="col-sm-5">
        <p class="ajuste-fonte-avenir-light">{{ trans('global.contact_text_1') }}</p>
        <p class="ajuste-fonte-avenir-light">{{ trans('global.contact_text_2') }}</p>
        <p class="margin-b-2 ajuste-fonte-avenir-light">{{ trans('global.contact_text_3') }}</p>
        <hr style="border: 0; height: 0; border-top: 2px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
        <div class="row padding-t-2 padding-b-2 ">
            <div class="col-sm-12">
                <span class="ajuste-fonte-avenir-light">
                  {{ trans('global.contact_our_email') }}
                </span>
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="mailto:contato@vivalabrasil.com.br">contato@vivalabrasil.com.br</a>
            </div>
        </div>
        <div class="row padding-t-2 padding-b-2 ">
            <div class="col-sm-12">
              <span class="ajuste-fonte-avenir-light">
                {{ trans('global.contact_our_phone') }}
              </span>
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="tel:+55 11 2645 2632">(11) 2645-2632</a>
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="tel:+55 11 98204 1821">(11) 98204-1821</a>
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" href="tel:+55 11 99131 6658">(11) 99131-6658</a>
            </div>
        </div>
        <div class="row padding-t-2 ">
            <div class="col-sm-12">
              <span class="ajuste-fonte-avenir-light">
                {{ trans('global.contact_our_address') }}
              </span>
            </div>
            <div class="col-sm-12">
                <a class="laranja font-bold-upper" title="Clique para abrir no Google Maps" href="https://www.google.com.br/maps/place/R.+do+Rocio,+52+-+Vila+Olímpia,+São+Paulo+-+SP/@-23.5934738,-46.6865075,17z/data=!3m1!4b1!4m2!3m1!1s0x94ce5745f024b5fd:0x992ad154f9e9ed01?hl=pt-BR" target="_blank">Rua do Rócio, 52, cj 122.<br> Vila Olímpia, São Paulo - SP</a>
            </div>
        </div>
    </div>
    <div class="col-sm-7 form-borda-preta">
        {!! Form::open(['url' => '/paginas/contato', 'method' => 'POST', 'id' => 'form-contato', 'data-callback' => 'retornoFormContato', 'data-loading'=>'form-loading']) !!}
            {!! Form::text("nome", '', ['title' => trans('global.lbl_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("email", '', ['title' => trans('global.lbl_email'), 'placeholder' => trans('global.lbl_email'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("assunto", '', ['title' => trans('global.lbl_subject_feedback'), 'placeholder' => trans('global.lbl_subject_feedback'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::textarea("mensagem", null, ['title'=> trans('global.lbl_message'), 'aria-label'=> trans('global.lbl_message'), 'placeholder'=> trans('global.lbl_message'), 'class' => 'form-control sem-resize margin-b-1' ]) !!}
            {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao pull-right']) !!}
    {!! Form::close() !!}
    </div>
    <div class="row col-sm-12 container-fluid margin-t-3">
        <div id="vivala-social-network" class="text-right">
            <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" target="_blank"><i class="fa fa-2x fa-facebook-square laranja"></i></a>
            <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" target="_blank"><i class="fa fa-2x fa-instagram laranja"></i></a>
            <a href="{{ env('VIVALA_LINK_YOUTUBE') }}" alt="{{ trans('global.social_network_youtube_img_alt') }}" title="{{ trans('global.social_network_youtube_img_title') }}" target="_blank"><i class="fa fa-2x fa-youtube-square laranja"></i></a>
            <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}"  target="_blank"><i class="fa fa-2x fa-linkedin-square laranja"></i></a>
        </div>
    </div>
</div>
@endsection
