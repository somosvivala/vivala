<div class="col-xs-12">
    <h4 class="font-bold-upper">Clique nas poltronas desejadas</h4>
    <div class="poltronas-clickbus col-sm-8 margin-b-2">
        @if(isset($ida))
        <div class="ida margin-b-2"> 
            <div class="row">
                <label class="col-sm-12">Ida - Trecho 1: <span> {{ $from }} para {{ $to }} </span></label>
            </div>
            <div class="row">
                <label class="col-sm-3">Dia:<span>17/02</span></label>
                <label class="col-sm-2">Hora:<span>17/02</span></label>
                <label class="col-sm-7">Compania:<span>{{ $ida->content->busCompany->name }}2</span></label>
            </div>
            <input type="hidden" id="ida-session-id" value="{{ $ida->sessionId }}">
            <input type="hidden" id="ida-trip-id" value="{{ $ida->content->trip_id }}">
            @if(isset($ida->content->seats))
            <div class="margin-t-1 onibus">
                @foreach($ida->content->seats as $Seat)
                <div class="poltrona @if($Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*7+15 }}%;" >
                    <label for="{{ $Seat->id }}">
                        <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}" value="{{ $Seat->id }}" @if($Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="row margin-b-2 margin-t-1">
                <div class="col-sm-3 text-center col-sm-offset-2">
                    <div class="legenda desativado">
                    </div>
                    Ocupada
                </div>
                <div class="col-sm-3 text-center">
                    <div class="legenda">
                    </div>
                    Livre
                </div>
                <div class="col-sm-4">
                    <div class="legenda selecionada">
                    </div>
                    Selecionada
                </div>
            </div>
            @endif
        </div>
        @endif
        @if(isset($volta))
        <div class="volta"> 
            <div class="row">
                <label class="col-sm-12">Volta - Trecho 2: <span> {{ $to}} para {{ $from }} </span></label>
            </div>
            <div class="row">
                <label class="col-sm-3">Dia:<span>17/02</span></label>
                <label class="col-sm-2">Hora:<span>17/02</span></label>
                <label class="col-sm-7">Compania:<span>{{ $volta->content->busCompany->name }}2</span></label>
            </div>
            <input type="hidden" id="volta-session-id" value="{{ $volta->sessionId }}">
            <input type="hidden" id="volta-trip-id" value="{{ $volta->content->trip_id }}">
            @if(isset($volta->content->seats))
            <div class="margin-t-1 onibus">
                @foreach($volta->content->seats as $Seat)
                <div class="poltrona @if($Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*7+15 }}%;" >
                    <label for="{{ $Seat->id }}">
                        <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}" value="{{ $Seat->id }}" @if($Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="row margin-b-2 margin-t-1">
                <div class="col-sm-3 text-center col-sm-offset-2">
                    <div class="legenda desativado">
                    </div>
                    Ocupada
                </div>
                <div class="col-sm-3 text-center">
                    <div class="legenda">
                    </div>
                    Livre
                </div>
                <div class="col-sm-4">
                    <div class="legenda selecionada">
                    </div>
                    Selecionada
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
    <div class="col-sm-4">
        <h5 class="font-bold-upper">Poltronas Selecionadas</h5>
        {!! Form::open(['url' => ['/clickbus/selecionarpoltronas'], 'id'=>'form-poltronas-clickbus', 'data-loading'=>'form-loading']) !!}
            <h4>Partida - Trecho 1</h4>
            <div class="poltronas-selecionadas-ida">
            </div>
            @if(isset($volta))
            <h4>Volta - Trecho 2</h4>
            <div class="poltronas-selecionadas-volta">
            </div>
            @endif
            {!! Form::submit("Comprar agora", ['class' => 'margin-t-1 btn btn-acao']) !!}
            <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>
        {!! Form::close() !!}
    </div>
</div>
