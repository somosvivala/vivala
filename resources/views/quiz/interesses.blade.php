@extends('quiz.index')

@section('pergunta')
<div class="col-sm-12 pergunta">
    <a href="{{ url ('quiz/personalize')}}" class="absolute-top-right laranja">{{ trans("global.lbl_step_skip") }}</a>
    <h2>{{ trans("global.quiz_interests_yours") }}</h2>
    <h3>{{ trans("global.quiz_interests_choose") }}</h3>
    @if(isset($interesses))
    {!! Form::open(['url' => ['quiz/interesses', Auth::user()->perfil->id], 'class' => 'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/personalize']) !!}
    <ul class="interesses col-sm-6 text-left">
        <h4 class="row col-sm-12 ">Qual seu estilo de viagem?</h4>
        @forelse($interesses['estilo'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
        <h4 class="row col-sm-12 padding-t-2">Com quem costuma viajar?</h4>
        @forelse($interesses['companhia'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
        <h4 class="row col-sm-12 padding-t-2">Ao viajar você procura:</h4>
        @forelse($interesses['ambiente'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
        <h4 class="row col-sm-12 padding-t-2">Regiões do Brasil que quer conhecer:</h4>
        @forelse($interesses['regioes'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
    </ul>
    <ul class="interesses col-sm-6 text-left">
        <h4 class="row col-sm-12 ">Quais são suas motivações para viajar?</h4>
        @forelse($interesses['motivacoes'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
        <h4 class="row col-sm-12 padding-t-2">O que você curte fazer?</h4>
        @forelse($interesses['eventos'] as $Interesse)
        <li class="col-sm-12">
            <label>
                {!! Form::checkbox("interesses[]", $Interesse->id); !!}
                <span>{{ $Interesse->nome }}</span>
            </label>
        </li>
        @empty
        @endforelse
    </ul>
    <div class="col-sm-12">
    {!!Form::submit(trans("global.lbl_continue"), ['class' => 'btn btn-acao']) !!}
    </div>
    {!! Form::close() !!}
    @endif
</div>
@endsection
