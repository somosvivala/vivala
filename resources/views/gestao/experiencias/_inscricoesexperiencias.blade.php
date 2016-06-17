<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    {!! Form::hidden('_token', csrf_token()) !!}
    <div class="row" id="lista-experiencias">
        <h2 class="col-sm-12">Listagem das inscrições</h2>

        @foreach ($Experiencias as $experiencia)

            <h4 class="col-xs-12">Experiencia de: {{ $experiencia->owner->nome }}, Local: {{ $experiencia->local->nome }} - {{ $experiencia->local->estado->sigla }} Proxima Data: {{ $experiencia->dataProximaOcorrencia }}</h3>

            <ul class="list-group col-xs-12">
                @forelse ($experiencia->inscricoes as $inscricao)
                    <li class="list-group-item col-xs-12">
                        <div class="col-xs-10">
                            <p>
                                Identificador da inscricao: {{ $inscricao->id }} <br>
                                Nome do inscrito: {{ $inscricao->perfil->nome_completo }} <br>
                                Email: {{ $inscricao->perfil->user->email }} <br>
                                status: {{ $inscricao->status }}
                            </p>
                        </div>
                        <div class="col-xs-2">
                            <a href="#" onclick="confirmaInscricaoExperiencia(event)" title="Confirmar Inscricao">
                                <i class="margin-t-0-5 fa fa-check fa-3x"></i>
                            </a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">Nenhuma inscricao</li>
                @endforelse
            </ul>


        @endforeach
    </div>
</div>
