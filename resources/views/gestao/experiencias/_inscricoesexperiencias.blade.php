<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    {!! Form::hidden('_token', csrf_token()) !!}
    <div class="row" id="lista-experiencias">
        <h2>Inscrições ativas</h2>

        @foreach ($Experiencias as $experiencia)

        {{-- Apenas iterando sob experiencias que tiverem inscricoes ativas --}
        @if ( !$experiencia->inscricoesAtivas->isEmpty() )
        <div class="col-xs-12 margin-t-1 fundo-cinza-com-borda">
            {!! Html::decode(Form::label('',
                '<br>ID da Experiencia: #' . $experiencia->id .
                '<br>Promovida por: ' . $experiencia->owner->nome .
                '<br>Proxima Data: ' . $experiencia->dataProximaOcorrencia .
                '<br>Local: ' . $experiencia->local->nome .' - '. $experiencia->local->estado->sigla, ['class' => 'col-xs-12'])) !!}

            <ul class="list-group col-xs-12">
                @forelse ($experiencia->inscricoesAtivas as $inscricao)
                    <li class="list-group-item col-xs-12 inscricao-experiencia-item" data-id-inscricao="{{ $inscricao->id }}">
                        <div class="col-xs-9">
                            <p> Identificador da inscricao: {{ $inscricao->id }} </p>
                            <p> Nome do inscrito: {{ $inscricao->perfil->nome_completo }} </p>
                            <p> Data da inscrição: {{ $inscricao->dataExperiencia->format('d/m/Y') }} </p>
                            <p> Email: {{ $inscricao->perfil->user->email }} </p>
                            <p class="
                                @if ($inscricao->status == 'confirmada')
                                    text-success
                                @else
                                    text-warning
                                @endif"> {{ strtoupper($inscricao->status) }}
                            </p>

                        </div>
                        <div class="col-xs-3">
                            @if ($inscricao->status == 'pendente')
                                <div class="col-xs-12 text-center">
                                    <a href="#" class="botao-confirma" onclick="confirmaInscricaoExperiencia(event)" title="Confirmar Inscrição">
                                        <i class="margin-t-0-5 fa fa-check fa-3x"></i><br>Confirmar
                                    </a>
                                </div>
                            @else
                                <div class="col-xs-6 text-center">
                                    <a href="#" title="Inscrição ja confirmada">
                                        <i class="margin-t-0-5 fa fa-check fa-3x text-success"></i>
                                    </a>
                                </div>

                                <div class="col-xs-6 text-center">
                                    <a href="#" onclick="confirmaCancelaInscricaoExperiencia(event)" title="Cancelar Inscrição">
                                        <i class="margin-t-0-5 fa fa-ban fa-3x text-danger"></i>
                                        Cancelar
                                    </a>
                                </div>

                            @endif
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
