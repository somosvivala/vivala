@extends('cuidar')

@section('content')

<div class="col-sm-12 margin-b-1">
<div class="col-sm-12 foto-fundo foto-header" style="background-image:url('{{ $vaga->getCapaUrl() }}');">

@if($vaga->podeEditar)
<div class="hora-post">
    <a class="btn btn-action" href="/vagas/{{$vaga->id}}/edit">
        <small>{{ trans('global.lbl_edit') }}</small>
    </a>
</div>
@endif
</div>
</div>

<h1 class="title">{{ trans('global.lbl_cause') }}</h1>
<ul>
    <li>{{ trans('global.lbl_cause_job_habilities') }}     {{$vaga->habilidades}}</li>
    <li>{{ trans('global.lbl_cause_description') }}:     {{$vaga->sobre_trabalho}}</li>
    <li>{{ trans('global.lbl_cause_job_localization') }}     {{$vaga->local}}</li>
    <li>{{ trans('global.lbl_ong') }}:     {{$vaga->owner}}</li>
    <li>{{ trans('global.lbl_cause_job_supervisor') }}:     {{$vaga->responsavel}}</li>
</ul>


<a href="{{action('VagaController@getVoluntariarse')}}/{{$vaga->id}}">{{ trans('global.lbl_volunteer_be') }}</a>

<hr>
<h3>{{ trans('global.volunteer_') }}</h3>

<ul class="sugestoes sugestoes-viajantes">
    @forelse($voluntarios as $Voluntario)
    <li>
        {!! Form::open(['url' => ['ajax/followperfil', $Voluntario->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Voluntario->id.')']) !!}
        <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Voluntario->id }}">{{ trans('global.lbl_follow') }}</button>
        <a href="{{ url($Voluntario->getUrl()) }}">
            <div class="round foto">
                <div class="cover">
                    <img src="{{ $Voluntario->getAvatarUrl() }}" alt=" {{ $Voluntario->nome }}">
                </div>
            </div>
            <strong class="col-sm-12">{{ $Voluntario->user->username }}</strong>
            {{-- <div class="row localizacao-cidade">
                <div class="col-sm-4 text-right">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="col-sm-8 text-left">
                    São Paulo, BR
                </div>
            </div> --}}
        </a>
        {!! Form::close() !!}
    </li>
    @empty
    <p>{{ trans('global.lbl_volunteer_not_found') }}</p>
    @endforelse
</ul>

@endsection
