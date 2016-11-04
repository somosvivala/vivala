<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    {!! Form::hidden('_token', csrf_token()) !!}
    <div class="row" id="lista-experiencias">
        <h2>Inscrições canceladas <span class="small laranja">(com pagamento confirmado)</span></h2>

        @foreach ($Experiencias as $experiencia)

        {{-- Apenas iterando sob experiencias que tiverem inscricoes canceladas com pagamento confirmado --}
        @if ( !$experiencia->inscricoesCanceladasComPagamentoConfirmado->isEmpty() )
        <div class="col-xs-12 margin-t-1 fundo-cinza-com-borda">
            {!! Html::decode(Form::label('',
                '<br>ID da Experiencia: #' . $experiencia->id .
                '<br>Promovida por: ' . $experiencia->owner->nome .
                '<br>Local: ' . $experiencia->local->nome .' - '. $experiencia->local->estado->sigla .
                '<br>STATUS: ' . strtoupper($experiencia->status), ['class' => 'col-xs-12'])) !!}

            <ul class="list-group col-xs-12">
                @forelse ($experiencia->inscricoesCanceladasComPagamentoConfirmado as $inscricao)
                    <li class="list-group-item col-xs-12 inscricao-experiencia-item" data-id-inscricao="{{ $inscricao->id }}">
                        <div class="col-xs-9">
                            <p> <span class="texto-negrito">ID da inscrição:</span> {{ $inscricao->id }} </br>
                                <span class="texto-negrito">Nome do inscrito:</span> {{ $inscricao->perfil->nome_completo }} </br>
                                <span class="texto-negrito">Email:</span> {{ $inscricao->perfil->user->email }} </br>
                                <span class="texto-negrito">Boleto:</span> {{ $inscricao->boleto ? 'SIM' : 'NÃO' }} </br>
                                <span class="texto-negrito">Data de pagamento:</span> {{ $inscricao->data_pagamento->format('d-m-Y') }} </br>
                                <span class="texto-negrito">Data de cancelamento:</span> {{ $inscricao->data_cancelamento->format('d-m-Y') }} </br>

                        </div>
                        <div class="col-xs-3">
                            <div class="col-xs-6 text-center">
                                <a href="#" onclick="confirmaCancelamentoInscricaoExperienciaComPagamentoConfirmado(event)" title="Confirmar cancelamento">
                                    <i class="margin-t-0-5 fa fa-times fa-3x text-danger">
                                        <span class="fonte-rem">Cancelar</span>
                                    </i>
                                </a>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">Nenhuma inscricao</li>
                @endforelse
            </ul>
        </div>

        @endif
        @endforeach
    </div>
</div>
