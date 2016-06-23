<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">
    <div class="row" >
        <h2> Gerenciamento das experiências </h2>

        <ul class="list-group">
            @foreach ($Experiencias as $experiencia)
                <li class="list-group-item col-xs-12 experiencia-item padding-t-1 padding-b-1 fundo-cinza-com-borda" data-id="{{ $experiencia->id }}">
                    <div class="col-xs-2" style="">
                        <div class="col-xs-9" style="padding-left: 0px; padding-right: 0px;">
                            <a href="/experiencias/{{ $experiencia->id }}/edit">Editar Experiencia </a><br>
                            <a href="#" onclick="confirmaDeleteExperiencia(event)">Deletar Experiencia </a><br>
                            @if ($experiencia->status == 'analise')
                                <a href="#" onclick="confirmaPublicarExperiencia(event)">Publicar Experiencia </a>
                            @else
                                <a href="#" onclick="confirmaDesativarExperiencia(event)">Desativar Experiencia </a>
                            @endif
                        </div>
                        <div class="col-xs-3"  style="padding-left: 0px; padding-right: 0px;">
                            <div class="foto quadrado3em">
                                <div class="avatar-img" style="background-image:url('{{ $experiencia->fotoCapaUrl }}')"></div>
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
                        @foreach ($experiencia->ocorrencias as $ocorrencia)
                            <li class="">
                                <i class="fa fa-calendar"></i> &nbsp; {{ $ocorrencia->data_ocorrencia->format('d/m/Y') }}
                            </li>
                        @endforeach
                        </ul>
                    </div>
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
                    <div class="col-xs-1 ">
                        {!! Form::label('status', 'Status') !!}
                        <p> {{ strtoupper($experiencia->status) }} </p>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
