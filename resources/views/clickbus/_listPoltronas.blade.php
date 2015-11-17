<div class="col-xs-12">
        <h4 class="font-bold-upper">Clique nas poltronas desejadas</h4>
    <div class="poltronas-clickbus col-sm-8">
        @if(isset($ida))
        <div class="ida"> 
            <div class="row">
                Ida - Trecho 1: 
            </div>
            <div class="row">
                Ida - Trecho 1: 
            </div>
            <input type="text" id="ida-session-id" value="{{ $ida->sessionId }}">
            <input type="text" id="ida-trip-id" value="{{ $ida->content->trip_id }}">
            <input type="text" id="ida-bus-company" value="{{ $ida->content->busCompany->name }}">
            @if(isset($ida->content->seats))
            <div class="onibus">
                @foreach($ida->content->seats as $Seat)
                    <div class="poltrona @if($Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*9+10 }}%;" >
                        <label for="{{ $Seat->id }}">
                            <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}" value="{{ $Seat->id }}" @if($Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
                        </label>
                    </div>
                @endforeach
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
