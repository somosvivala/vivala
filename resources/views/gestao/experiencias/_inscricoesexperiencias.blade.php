<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    {!! Form::hidden('_token', csrf_token()) !!}
    <div class="row" id="lista-experiencias">
        <h2 class="col-sm-12">Gerenciamento das inscrições</h2>

        @foreach ($Experiencias as $experiencia)

        <div class="col-xs-12 margin-t-1" style="background-color:#ebebeb">
            <h4 class="col-xs-12">Experiencia de: {{ $experiencia->owner->nome }}, Proxima Data: {{ $experiencia->dataProximaOcorrencia }} <br> Local: {{ $experiencia->local->nome }} - {{ $experiencia->local->estado->sigla }} </h3>

            <ul class="list-group col-xs-12">
                @forelse ($experiencia->inscricoesAtivas as $inscricao)
                    <li class="list-group-item col-xs-12 inscricao-experiencia-item" data-id-inscricao="{{ $inscricao->id }}">
                        <div class="col-xs-10">
                            <p>
                                Identificador da inscricao: {{ $inscricao->id }} <br>
                                Nome do inscrito: {{ $inscricao->perfil->nome_completo }} <br>
                                Email: {{ $inscricao->perfil->user->email }} <br>
                                status: {{ strtoupper($inscricao->status) }}
                            </p>
                        </div>
                        <div class="col-xs-2 text-center">
                            @if ($inscricao->status == 'pendente')
                                <a href="#" onclick="confirmaInscricaoExperiencia(event)" title="Confirmar Inscricao">
                                    <i class="margin-t-0-5 fa fa-check fa-3x"></i> Confirmar
                                </a>
                            @else
                                <a href="#" style="color:#25A393;" title="Inscricao ja confirmada">
                                    <i class="margin-t-0-5 fa fa-check fa-3x"></i>
                                </a>
                            @endif
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">Nenhuma inscricao</li>
                @endforelse
            </ul>
        </div>

        @endforeach
    </div>
</div>
