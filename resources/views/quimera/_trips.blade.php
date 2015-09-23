@foreach ($data as $viagem)
    <div class="col-sm-12 flight-wrapper">
        <div class="row">
            @if (isset($viagem->outbound_choices) && count($viagem->outbound_choices) > 0)
                <div class="col-sm-10 flight-header">
                    <span class="col-sm-3">IDA <i class="fa fa-plane"></i></span>
                    <span class="col-sm-4">{{$viagem->outbound_departure->airport->code}}</span>
                    <span class="col-sm-4">{{$viagem->inbound_departure->airport->code}}</span>
                </div>
                <div class="col-sm-10 flight-description">
                    <span class="col-sm-offset-3 col-sm-4">{{$viagem->outbound_departure->airport->city->name}}</span>
                    <span class="col-sm-4">{{$viagem->inbound_departure->airport->city->name}}</span>
                </div>
                <div class="choices-wrapper">
                    @foreach ($viagem->outbound_choices as $outbound)
                        <div class="col-sm-10 flight-choice">
                            <div class="col-sm-3">
                                <input type="radio" id="choice-{{$outbound->choice}}">
                                <span class="airline-company" for="choice-{{$outbound->choice}}">{{$outbound->airlines[0]->name}}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-time">{{$outbound->segments[0]->departure_time}}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-detail">Direto</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-time">{{$outbound->segments[0]->arrival_time}}</span>
                            </div>
                            <div class="col-sm-3">
                                <span class="choice-detail">Detalhes</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($viagem->inbound_choices) && count($viagem->inbound_choices) > 0)
                <div class="col-sm-10 flight-header">
                    <span class="col-sm-3">VOLTA <i class="fa fa-plane fa-rotate-270"></i></span>
                    <span class="col-sm-4">{{$viagem->outbound_arrival->airport->code}}</span>
                    <span class="col-sm-4">{{$viagem->inbound_arrival->airport->code}}</span>
                </div>
                <div class="col-sm-10 flight-description">
                    <span class="col-sm-offset-3 col-sm-4">{{$viagem->outbound_arrival->airport->city->name}}</span>
                    <span class="col-sm-4">{{$viagem->inbound_arrival->airport->city->name}}</span>
                </div>
                <div class="choices-wrapper">
                    @foreach ($viagem->inbound_choices as $inbound)
                        <div class="col-sm-10 flight-choice">
                            <div class="col-sm-3">
                                <input type="radio" id="choice-{{$inbound->choice}}">
                                <span class="airline-company" for="choice-{{$inbound->choice}}">{{$inbound->airlines[0]->name}}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-time">{{$inbound->segments[0]->departure_time}}</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-detail">Direto</span>
                            </div>
                            <div class="col-sm-2">
                                <span class="choice-time">{{$inbound->segments[0]->arrival_time}}</span>
                            </div>
                            <div class="col-sm-3">
                                <span class="choice-detail">Detalhes</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="col-sm-2 flight-pricing">
                
            </div>
        </div>
    </div>
@endforeach