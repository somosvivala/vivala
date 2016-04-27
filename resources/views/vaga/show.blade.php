@extends('cuidar')

@section('content')
<div class="col-sm-12 margin-b-1">
    <div class="col-sm-12 foto-fundo foto-header" style="background-image:url('{{ $vaga->getCapaUrl() }}');">
    @if($vaga->podeEditar)
    <div class="hora-post">
        <a class="btn btn-primario btn-acao edit-vaga" href="/vagas/{{$vaga->id}}/edit">
            <small>{{ trans('global.lbl_edit') }}</small>
        </a>
    </div>
    @endif
    </div>
</div>

<h3 class="font-bold-upper text-center">{{ $vaga->owner->nome }}</h3>
<div class="col-sm-4 sobre-vaga">
    <div class="text-center fundo-cheio">
        <div class="spritemap-vaga sprite-casa"></div>
        <b class="font-bold-upper col-sm-12">{!! trans('global.ong_slot_about_organization') !!}</b>
        <p>{!! $vaga->owner->descricao?:trans('global.ong_slot_no_description') !!}</p>
    </div>
</div>

<div class="col-sm-4 sobre-vaga">
<div class="text-center fundo-cheio">
    <div class="spritemap-vaga sprite-formulario"></div>
    <b class="font-bold-upper col-sm-12">{!! trans('global.ong_slot_about_job') !!}</b>
    <p>{!! $vaga->sobre_trabalho?:trans('global.ong_slot_no_description') !!}</p>
</div>
</div>

<div class="col-sm-4 sobre-vaga">
<div class="text-center fundo-cheio">
    <div class="spritemap-vaga sprite-pessoa"></div>
    <b class="font-bold-upper col-sm-12">{!! trans('global.ong_slot_job_habilities') !!}</b>
    <p>{!! $vaga->habilidades?:trans('global.ong_slot_no_habilities') !!}</p>
</div>
</div>

<div class="col-sm-4 sobre-vaga">
<div class="text-center fundo-cheio height-18">
    <div class="spritemap-vaga sprite-calendario"></div>
    <b class="font-bold-upper col-sm-12">{!! trans('global.ong_slot_date_and_hour') !!}</b>
    <p>{{ $vaga->horario_funcionamento }}</p>
</div>
</div>

<div class="col-sm-4 sobre-vaga">
<div class="text-center fundo-cheio height-18">
    <div class="spritemap-vaga sprite-mapmarker"></div>
    <b class="font-bold-upper col-sm-12">{!! trans('global.ong_slot_location') !!}</b>
    <p>{{ $vaga->local ? $vaga->local : $vaga->owner->local }}</p>
</div>
</div>
<div class="col-sm-4 sobre-vaga">
<div class="text-center fundo-cheio height-18">
    <b class="font-bold-upper col-sm-12 margin-t-2">{!! trans('global.ong_slot_responsible') !!}</b>
    <div class="follow-perfil col-sm-8 col-sm-offset-2 margin-t-1">
        {!! Form::open(['url' => ['ajax/followperfil', $vaga->responsavel->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$vaga->responsavel->id.')']) !!}
        <a href="{{ url($vaga->responsavel->getUrl()) }}">
            <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $vaga->responsavel->id }}">{!! trans('global.lbl_follow') !!}</button>
                <div class="round foto quadrado7em">
                    <div class="avatar-img" style="background-image:url('{{ $vaga->responsavel->getAvatarUrl() }}')">
                    </div>
                </div>
            <strong class="col-sm-12 margin-t-1">{{ $vaga->responsavel->user->username }}</strong>
        </a>
        {!! Form::close() !!}
    </div>
    <br><br>
</div>
</div>
<div class="row text-center margin-b-2">
    <div class="col-sm-12">
        <a class="btn btn-primario btn-acao margin-t-1 margin-b-1" href="{{action('VagaController@getVoluntariarse')}}/{{$vaga->id}}">{!! trans('global.ong_slot_wanna_apply') !!}</a>
    </div>
</div>

@if(isset($Responsavel))
<div class="text-left fundo-cheio col-sm-12 margin-b-2 padding-b-2 padding-t-2">
    <div class="col-sm-2 text-center">
        <a href="{{ url('perfil') }}">
            <div class="round foto quadrado7em">
                <div class="avatar-img" style="background-image:url('{{ $Responsavel->getAvatarUrl() }}')">
                </div>
            </div>
            <div class="font-bold-upper">
              {{ $Responsavel->apelido }}
            </div>
        </a>
    </div>
    <div class="col-sm-10">
        @if( $vaga->id == 19 )
          {!! trans('global.lbl_hello') !!}, {{ $Candidato->nome }}, {!! trans('global.ong_slot_dummy_olympics') !!}
        @else
          {!! trans('global.lbl_hello') !!}, {{ $Candidato->nome }}, {!! trans('global.ong_slot_congratulations_1') !!} {{ $vaga->email_contato }} {!! trans('global.ong_slot_congratulations_2') !!} {{ $vaga->telefone_contato }}
        @endif
    </div>
</div>
@endif

<div class="text-center fundo-cheio col-sm-12 margin-b-2">
    <h3 class="font-bold-upper text-center margin-b-2">{!! trans('global.ong_slot_volunteers_in_this_cause') !!}</h3>
<ul class="row sugestoes sugestoes-viajantes">
    @forelse($voluntarios as $Voluntario)
    <li class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
        {!! Form::open(['url' => ['ajax/followperfil', $Voluntario->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Voluntario->id.')']) !!}
        <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Voluntario->id }}">{{ trans('global.lbl_follow') }}</button>
        <a href="{{ url($Voluntario->getUrl()) }}">
            <div class="round foto quadrado7em">
                <div class="avatar-img" style="background-image:url('{{ $Voluntario->getAvatarUrl() }}')">
                </div>
            </div>
            <strong class="col-sm-12 col-md-12 col-lg-12">
              {{ $Voluntario->user->username }}
            </strong>
            {{--
              <div class="row localizacao-cidade">
                <div class="col-sm-4 text-right">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="col-sm-8 text-left">
                    São Paulo, BR
                </div>
            </div>
            --}}
        </a>
        {!! Form::close() !!}
    </li>
    @empty
    <p>{!! trans('global.ong_slot_none_voluntary') !!}</p>
    @endforelse
</ul>
</div>

@if($vaga->owner->vagas)
<h3 class="font-bold-upper text-center margin-t-2 margin-b-1">{!! trans('global.ong_slot_see_other_slots') !!}</h3>

<ul class="lista-vagas row inside">
    @forelse($vaga->owner->vagas as $Causa)
        <li class="col-sm-4">
            <div class="foto-fundo" style="background-image:url('{{ $Causa->getCapaUrl() }}');">
            <a href="{{ url('vagas/'.$Causa->id) }}">
                <h3 class="font-bold-upper">{{ $Causa->owner->nome }}</h3>
                <p>{{ $Causa->habilidades }}</p>
                <span class="padding-t-1"><i class="fa fa-map-marker"></i> {{ $Causa->cidade->nome.",".$Causa->estado->sigla }}</span>
            </a>
        </li>
    @empty
        <p class="col-sm-12 text-center">{!! trans('global.ong_slot_none_cause_found') !!}</p>
    @endforelse
</ul>
@endif

@endsection
