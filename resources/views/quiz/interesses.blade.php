@extends('quiz.index')

@section('pergunta')
<div class="col-sm-12 pergunta">
    <a href="{{ url ('quiz/personalize')}}" class="absolute-top-right laranja">{{ trans("global.lbl_step_skip") }}</a>
    <h2>{{ trans("global.quiz_interests_yours") }}</h2>
    <h3>{{ trans("global.quiz_interests_choose") }}</h3>
    @if(isset($interesses))
    {!! Form::open(['url' => ['quiz/interesses', Auth::user()->perfil->id], 'class' => 'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/personalize', 'data-loading'=>'form-loading']) !!}
    <ul class="interesses col-sm-6 text-left">
      <div class="row margin-t-3">
        <i class="fa fa-globe col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_travel_style') }}</h4>
        @forelse($interesses['estilo'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
      <div class="row margin-t-3">
        <i class="fa fa-users fa-2x col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_partner') }}</h4>
        @forelse($interesses['companhia'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
      <div class="row margin-t-3">
        <i class="fa fa-search fa-2x col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_looking') }}</h4>
        @forelse($interesses['ambiente'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
      <div class="row margin-t-3">
        <i class="fa fa-map-o fa-2x col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_brazilian_regions') }}</h4>
        @forelse($interesses['regioes'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
    </ul>
    <ul class="interesses col-sm-6 text-left">
      <div class="row margin-t-3">
        <i class="fa fa-smile-o fa-2x col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_travel_motivations') }}</h4>
        @forelse($interesses['motivacoes'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
      <div class="row margin-t-3">
        <i class="fa fa-heart fa-2x col-sm-1 laranja" style="font-size: 1.5em;"></i>
        <h4 class="col-sm-11" style="padding-left:1em; margin-top:5px; margin-bottom:15px;">{{ trans('global.quiz_interests_what_do_you_like') }}</h4>
        @forelse($interesses['eventos'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ trans($Interesse->nome) }}</span>
            </label>
        </li>
        @empty
        @endforelse
      </div>
    </ul>
    <div class="col-sm-12">
    {!!Form::submit(trans("global.lbl_continue"), ['class' => 'btn btn-primario btn-acao']) !!}
    <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>
    </div>
    {!! Form::close() !!}
    @endif
</div>
@endsection
