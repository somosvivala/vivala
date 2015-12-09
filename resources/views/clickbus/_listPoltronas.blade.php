<div class="col-xs-12">
    <h4 class="font-bold-upper">Clique nas poltronas desejadas</h4>
    <div class="poltronas-clickbus col-sm-8 margin-b-2">
        @if(isset($ida))
        <div class="ida container-onibus margin-b-2"> 
            <div class="row">
                <label class="col-sm-12">Ida - Trecho 1: <span> {{ $from }} para {{ $to }} </span></label>
            </div>
            <div class="row">
                <label class="col-sm-3">Dia:<span>{{ $ida->diames }}</span></label>
                <label class="col-sm-2">Hora:<span>{{ $ida->horario }}</span></label>
                <label class="col-sm-7">Compania:<span>{{ $ida->content->busCompany->name }}2</span></label>
            </div>
            @if(isset($ida->content->seats))
            <div class="margin-t-1 onibus">
                @foreach($ida->content->seats as $Seat)
                <div class="poltrona @if(!$Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*7+15 }}%;" >
                    <label for="{{ $Seat->id }}-ida">
                        <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}-ida" value="{{ $Seat->id }}-ida" @if(!$Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
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
        <div class="volta container-onibus"> 
            <div class="row">
                <label class="col-sm-12">Volta - Trecho 2: <span> {{ $to}} para {{ $from }} </span></label>
            </div>
            <div class="row">
                <label class="col-sm-3">Dia:<span>{{ $volta->diames }}</span></label>
                <label class="col-sm-2">Hora:<span>{{ $volta->horario }}</span></label>
                <label class="col-sm-7">Compania:<span>{{ $volta->content->busCompany->name }}2</span></label>
            </div>
            <input type="hidden" id="volta-session-id" value="{{ $volta->sessionId }}">
            <input type="hidden" id="volta-trip-id" value="{{ $volta->content->trip_id }}">
            @if(isset($volta->content->seats))
            <div class="margin-t-1 onibus">
                @foreach($volta->content->seats as $Seat)
                <div class="poltrona @if(!$Seat->available) desativado @endif" style="bottom:{{ $Seat->position->y*3+1 }}em;left:{{ $Seat->position->x*7+15 }}%;" >
                    <label for="{{ $Seat->id }}-volta">
                        <input type="checkbox" name="poltronas" data-price="{{ $Seat->details->price }}" id="{{ $Seat->id }}-volta" value="{{ $Seat->id }}-volta" @if(!$Seat->available) disabled="disabled" @endif >{{ $Seat->name }}
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
            <input type="hidden" id="ida-session-id" name="ida-sessionId" value="{{ $ida->sessionId }}">
            <input type="hidden" id="ida-id" name="ida-scheduleId" value="{{ $ida->scheduleId }}">
            <h4>Partida - Trecho 1</h4>
            <div class="poltronas-selecionadas-ida">
            </div>
            @if(isset($volta))
            <input type="hidden" id="volta-session-id" name="volta-sessionId" value="{{ $volta->sessionId }}">
            <input type="hidden" id="volta-id" name="volta-scheduleId" value="{{ $volta->scheduleId }}">
            <h4 class="margin-t-1">Volta - Trecho 2</h4>
            <div class="poltronas-selecionadas-volta">
            </div>
            @endif
            {!! Form::submit("Comprar agora", ['class' => 'margin-t-1 btn btn-acao']) !!}
            <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>
        {!! Form::close() !!}
    </div>
</div>

@if(isset($ida))
<div id="modal-poltrona-ida" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="validacao-poltrona-ida" class="validacao-poltrona" action="#" method="GET" data-loading="form-loading">
            <div class="modal-body">
                <div class="row margin-b-1">
                    <div class="col-sm-10">
                        <h3 class="texto-preto">
                            <div class="poltrona-externa selecionada num-poltrona"></div>
                            Poltrona <span class="num-poltrona"></span>
                        </h3>
                    </div>
                    <div class="col-sm-2"><button type="button" class="btn pull-right" data-dismiss="modal"><i class="fa fa-times"></i></button></div>
                </div>

                <div class="row">
                    
                    <input type="hidden" id="tipo" value="ida">
                    <input type="hidden" id="from" value="{{ $ida->frombus }}">
                    <input type="hidden" id="to" value="{{ $ida->tobus }}">
                    <input type="hidden" id="seat" value="">
                    <input type="hidden" id="date" value="{{ $ida->diames  }}">
                    <input type="hidden" id="time" value="{{ $ida->horario  }}">
                    <input type="hidden" id="session-id" value="{{ $ida->sessionId }}">
                    <input type="hidden" id="trip-id" value="{{ $ida->content->trip_id }}">
                    <div class="col-sm-6"> 
                        <label for="nome">Nome:</label>
                        <input required="required"  type="text" placeholder="Nome" name="name" id="name">
                    </div>
                    <div class="col-sm-6"> 
                        <label for="birthday">Nascimento:</label>
                        <input type="date" required="required" name="birthday" id="birthday" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="col-sm-6"> 
                        <div class="row">
                            <label for="doc" class="col-sm-12">Documento:</label>
                            <div class="col-xs-4">
                                <select id="document-type" name="documentType" class="">
                                    <option value="rg">RG</option>
                                    <option value="passaporte">Passaporte</option>
                                    <option value="cpf">CPF</option> 
                                </select> 
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="document" class="col-sm-9" placeholder="Ex: 123.456.789-0" name="document" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="doc" class="col-sm-12">Email:</label>
                        <input type="email" id="email" placeholder="passageiro@email.com" name="email" required="required" >
                    </div> 
                </div> 
            </div>
            <div class="modal-footer">
                <button class="btn btn-acao" type="submit">Escolher Poltrona <span class="num-poltrona"></span><i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1 soft-hide"></i>
                        </button>
             </div>
             </form>
        </div>
    </div>
</div>
@endif

@if(isset($volta))
<div id="modal-poltrona-volta" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="validacao-poltrona-volta" class="validacao-poltrona" action="#" method="GET">
            <div class="modal-body">
                <div class="row margin-b-1">
                    <div class="col-sm-10">
                        <h3 class="texto-preto">
                            <div class="poltrona-externa selecionada num-poltrona"></div>
                            Poltrona <span class="num-poltrona"></span>
                        </h3>
                    </div>
                    <div class="col-sm-2"><button type="button" class="btn pull-right" data-dismiss="modal"><i class="fa fa-times"></i></button></div>
                </div>

                <div class="row">
                    
                    <input type="hidden" id="tipo" value="volta">
                    <input type="hidden" id="from" value="{{ $volta->frombus }}">
                    <input type="hidden" id="to" value="{{ $volta->tobus }}">
                    <input type="hidden" id="seat" value="">
                    <input type="hidden" id="date" value="{{ $volta->diames  }}">
                    <input type="hidden" id="time" value="{{ $volta->horario  }}">
                    <input type="hidden" id="session-id" value="{{ $volta->sessionId }}">
                    <input type="hidden" id="trip-id" value="{{ $volta->content->trip_id }}">
                    <div class="col-sm-6"> 
                        <label for="nome">Nome:</label>
                        <input required="required"  type="text" placeholder="Nome" name="name" id="name">
                    </div>
                    <div class="col-sm-6"> 
                        <label for="birthday">Nascimento:</label>
                        <input type="date" required="required" name="birthday" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="col-sm-6"> 
                        <div class="row">
                            <label for="doc" class="col-sm-12">Documento:</label>
                            <div class="col-xs-4">
                                <select id="document-type" name="documentType" class="">
                                    <option value="rg">RG</option>
                                    <option value="passaporte">Passaporte</option>
                                    <option value="cpf">CPF</option> 
                                </select> 
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="document" class="col-sm-9" placeholder="Ex: 123.456.789-0" name="document" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="doc" class="col-sm-12">Email:</label>
                        <input type="email" id="email" placeholder="passageiro@email.com" name="email" required="required" >
                    </div> 
                </div> 
            </div>
            <div class="modal-footer">
                <button class="btn btn-acao" type="submit">Escolher Poltrona <span class="num-poltrona"></span><i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1 soft-hide"></i>
                        </button>
             </div>
             </form>
        </div>
    </div>
</div>
@endif
