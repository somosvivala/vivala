@extends('conectar')

@section('content')

<div class="fundo-cheio col-sm-12 text-justified padding-b-2">

    <h3 class="font-bold-upper text-center margin-b-2">{{ trans('global.lbl_contact') }}
        <small class="sub-titulo">{{ trans('global.contact_keep_in_contact') }}</small>
    </h3>

    <div class="col-sm-5">
        <p>
        Se estiver afim de dar um alô e bater um lero, é só dar uma ligada, mandar um e-mail ou fazer uma visitinha... Você quem decide! O que importa é que estamos sempre de braços abertos para te receber e te ouvir, escutar sua opinião e suas sugestões.
    </p><p>
        Aqui não tem enrolação. O pessoal da Vivalá é gente boa e ama conhecer gente nova! vamos, com muito prazer, escutar tudo o que você tem a dizer!
        </p>


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
                <a class="laranja font-bold-upper" href="https://www.google.com.br/maps/place/R.+Aspicuelta,+345+-+Alto+de+Pinheiros,+S%C3%A3o+Paulo+-+SP/@-22.8755115,-46.1800783,6z/data=!4m2!3m1!1s0x94ce57978b550665:0xc675435d412b5648" target="_blank">Rua Aspicuelta, 345 - São Paulo, SP</a>
            </div>
        </div>
    </div>
    <div class="col-sm-7 form-borda-preta">

        {!! Form::open(['url' => 'contato']) !!}
            {!! Form::text("nome", '', ['title' => trans('global.lbl_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("email", '', ['title' => trans('global.lbl_email'), 'placeholder' => trans('global.lbl_email'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::text("assunto", '', ['title' => trans('global.lbl_subject'), 'placeholder' => trans('global.lbl_subject'), 'class' => 'form-control margin-b-1']) !!}
            {!! Form::textarea("mensagem", null, ['title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize margin-b-1' ]) !!}
            {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao pull-right']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
