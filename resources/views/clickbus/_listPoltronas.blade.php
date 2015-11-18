<div class="col-xs-12">
    <h4 class="font-bold-upper">Clique nas poltronas desejadas</h4>
    <div class="poltronas-clickbus col-sm-8">
        @if(isset($ida))
        <div class="ida"> 
            <div class="row">
                <label class="col-sm-12">Ida: <span> {{ $from }} para {{ $to }} </span></label>
            </div>
            <div class="row">
                <label class="col-sm-3">Dia:<span>17/02</span></label>
                <label class="col-sm-3">Hora:<span>17/02</span></label>
                <label class="col-sm-3">Compania:<span>{{ $ida->content->busCompany->name }}2</span></label>
            </div>
            <input type="hidden" id="ida-session-id" value="{{ $ida->sessionId }}">
            <input type="hidden" id="ida-trip-id" value="{{ $ida->content->trip_id }}">
            @if(isset($ida->content->seats))
            <div class="onibus">
                @foreach($ida->content->seats as $Seat)
                    <div class="poltrona @if($Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*7+15 }}%;" >
                        <label for="{{ $Seat->id }}">
                            <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}" value="{{ $Seat->id }}" @if($Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="legenda row">
                <div class="col-sm-2 col-sm-offset-3">
                    Ocupada
                </div>
                <div class="col-sm-2">
                    Ocupada
                </div>
                <div class="col-sm-2">
                    Ocupada
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
    <div class="col-sm-4">
            <h5 class="font-bold-upper">Poltronas Selecionadas</h5>
            <div class="poltronas-selecionadas">
            </div>
            <button class="btn btn-acao">Comprar agora</button>
    </div>
</div>
