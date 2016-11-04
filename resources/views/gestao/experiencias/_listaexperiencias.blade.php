<h2> Gerenciamento das experiências </h2>


<div class="col-xs-12 margin-t-1">
    <ul class="list-group">
        @foreach ($Experiencias as $experiencia)
            <li class="list-group-item col-xs-12 experiencia-item padding-t-1 padding-b-1 fundo-cinza-com-borda" data-id="{{ $experiencia->id }}">
                <div class="col-xs-2" style="">
                    <div class="col-xs-9 margin-t-1" style="padding-left: 0px; padding-right: 0px;">
                        <div class="col-xs-3" style="padding-left: 0px; padding-right: 0px;">
                            <a title="Editar Experiencia" href="/experiencias/{{ $experiencia->id }}/edit"><i class="text-success fa fa-2x fa-pencil"></i></a> &nbsp;&nbsp;
                        </div>
                        <div class="col-xs-3" style="padding-left: 0px; padding-right: 0px;">
                            <a title="Excluir Experiencia" href="#" onclick="confirmaDeleteExperiencia(event)"><i class="text-danger fa fa-2x fa-close"></i></a> &nbsp;&nbsp;
                        </div>

                        <div class="col-xs-3" style="padding-left: 0px; padding-right: 0px;">
                            @if ($experiencia->status == 'analise')
                                <a href="#" title="Publicar Experiência" onclick="confirmaPublicarExperiencia(event)">
                                    <span class="fa-stack">
                                      <i class="fa fa-list fa-stack-2x"></i>
                                      <i class="fa fa-check fa-stack-2x text-success icone-stacked-canto-direita-inferior"></i>
                                    </span>
                                </a>
                            @else
                                <a href="#" title="Desativar Experiencia" onclick="confirmaDesativarExperiencia(event)">
                                    <span class="fa-stack">
                                      <i class="fa fa-list fa-stack-2x"></i>
                                      <i class="fa fa-ban fa-stack-2x text-danger icone-stacked-canto-direita-inferior"></i>
                                    </span>
                                </a>
                            @endif
                        </div>

                        <div class="col-xs-3"></div>

                    </div>
                    <div class="col-xs-3"  style="padding-left: 0px; padding-right: 0px;">
                        <div class="foto quadrado3em">
                            <div class="avatar-img" style="background-image:url('{{ $experiencia->fotoCapaUrl }}')"></div>
                        </div>
                        <div class="text-center margin-t-0-5">
                            {!! Form::label('identificador_experiencia', 'ID: '. $experiencia->id) !!}
                        </div>
                    </div>
                </div>
                 <div class="col-xs-2 text-center">
                    {!! Form::label('promovido', 'Promovido por') !!}
                    <p> {{ $experiencia->owner->nome }} </p>
                </div>
                <div class="col-xs-1 text-center">
                    {!! Form::label('preço', 'Preço') !!}
                    <p> R${{ $experiencia->preco}} </p>
                </div>
                 <div class="col-xs-2 text-center">
                    {!! Form::label('local', 'Local') !!}
                    <p> {{ $experiencia->local->nome }} </p>
                </div>
                 <div class="col-xs-2 text-center">
                    {!! Form::label('proximas', 'Proximas Datas') !!}
                    <ul class="col-xs-12">
                    @foreach ($experiencia->futurasOcorrencias as $ocorrencia)
                        <li>
                            <i class="fa fa-calendar"></i> &nbsp; {{ $ocorrencia->data_ocorrencia->format('d/m/Y') }}
                        </li>
                    @endforeach
                    </ul>
                </div>
                {{-- LISTAGEM DE CATEGORIAS
                 <div class="col-xs-2 text-center">
                    {!! Form::label('categorias', 'Categorias') !!}
                    <ul class="col-xs-12">
                    @foreach ($experiencia->categorias as $categoria)
                        <li class="">
                            <i class="{{ $categoria->icone }}"></i> &nbsp; {{ $categoria->nome }}
                        </li>
                    @endforeach
                    </ul>
                </div>
               FIM LISTAGEM CATEGORIAS --}}
                <div class="col-xs-3 ">
                    {!! Form::label('status', 'Status') !!}
                    <p class="
                        @if ($experiencia->status == 'publicada')
                            text-success
                        @else
                            text-warning
                        @endif"> <strong>{{ strtoupper($experiencia->status) }}</strong></p>

                </div>
            </li>
        @endforeach
    </ul>
</div>
