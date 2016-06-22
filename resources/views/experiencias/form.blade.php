<div class="col-xs-12 fundo-cinza-com-borda padding-t-1">
    {{-- Secao de trocar foto do Projeto/Empresa responsavel --}}
    <div class="col-sm-12 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada ao owner da experiencia --}}
        {!! Form::hidden('owner-experiencia-foto-id', '', ['id' => 'owner-experiencia-foto-id']) !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto associada ao owner da experiencia (para caso erre o form) --}}
        {!! Form::hidden('owner-experiencia-foto-path', '', ['id' => 'owner-experiencia-foto-path']) !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._owner_fotoform')
    </div>



    {{-- Secao de selecao da ong/projeto da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        <i class='fa fa-2x fa-question-circle-o' title='Esse é o campo que identifica a instituição responsavel'></i>
        {!! Form::label('projeto', 'Projeto responsavel', ['class' => 'row col-sm-12']) !!}
        {!! Form::select("projeto", $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control', 'id' => 'ong_select']) !!}
    </div>

    {{-- Secao de insercao do nome do projeto/empresa responsavel --}}
    <div class="col-sm-12 margin-b-1">
        <i class='fa fa-2x fa-question-circle-o' title='Esse é o nome que ira aparecer como a instituicao que está promovendo'></i>
        {!! Form::label('owner_nome', 'Nome da empresa/instituição responsavel', ['class' => 'row col-sm-12']) !!}
        {!! Form::text('owner_nome', null, ['placeholder' => '']) !!}
    </div>

    {{-- Secao de insercao da descricao do projeto/empresa responsavel (enviada no email) --}}
    <div class="col-sm-12 margin-b-1">
        <i class='fa fa-2x fa-question-circle-o' title='Essa descrição aparecerá no email enviado ao candidato'></i>
        {!! Form::label('owner_descricao', "Descricao da empresa/instituição responsavel ", ['class' => 'row col-sm-12']) !!}
        {!! Form::text('owner_descricao', null, ['placeholder' => '']) !!}
    </div>




    {{-- Secao de trocar foto da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        {{-- Aqui insiro o input hidden que guardará o id da foto associada á experiencia --}}
        {!! Form::hidden('experiencia-foto-id', '', ['id' => 'experiencia-foto-id']) !!}

        {{-- Aqui insiro o input hidden que guardará o path da foto da experiencia (para caso erre o form) --}}
        {!! Form::hidden('experiencia-foto-path', '', ['id' => 'experiencia-foto-path']) !!}

        {{-- Incluindo o conjunto (foto / botao troca foto), que dispara a modal contendo o form de trocar foto por ajax --}}
        @include('experiencias._fotoform')
    </div>


    {{-- Secao de seleção do local da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        <label class="row col-sm-12">Cidade</label>
        <input id="campo-autocomplete-cidades" autocomplete="off" class="autocomplete-cidades-ativo" type="text" placeholder="cidade" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}"/>
        <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
        <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
    </div>
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('endereco_completo', "Endereço completo", ['class' => 'row col-sm-12']) !!}
        {!! Form::text('endereco_completo', null, ['placeholder' => 'Rua Capitão Gomes Duarte, 9-50 - Vila Santa Clara']) !!}
    </div>

    {{-- Secao de campos texto da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('descricao_na_listagem', 'Descrição na listagem', ['class' => 'row col-sm-12']) !!}
        {!! Form::textarea("descricao_na_listagem", null, ['id'=>'descricao_na_listagem', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize sem-upper', 'rows' => 3]) !!}
    </div>
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('descricao', 'Descrição', ['class' => 'row col-sm-12']) !!}
        {!! Form::textarea("descricao", null, ['id'=>'descricao', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize sem-upper', 'rows' => 3]) !!}
    </div>
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('detalhes', 'Detalhes da experiencia', ['class' => 'row col-sm-12']) !!}
        {!! Form::textarea("detalhes", null, ['id'=>'detalhes', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize sem-upper', 'rows' => 3]) !!}
    </div>
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('preco', 'Preço', ['class' => 'row col-sm-12']) !!}
        {!! Form::text('preco', null, ['placeholder' => 'preco']) !!}
    </div>


    {{-- Secao de informacoes extras da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('', 'Informações extras', ['class' => 'row col-sm-12']) !!}
        <ul id="informacoes-container">
            @if (isset($experiencia))
            @foreach ($experiencia->informacoes as $informacao)
                @include('experiencias._form_extra_item', ['informacao' => $informacao])
            @endforeach
            @endif

            {{-- Botao de adicionar novas Informacoes --}}
            <li class="col-xs-12 margin-b-1 container-campos-fontawesome">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaInfoExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>



    {{-- Secao das datas que irao ocorrer a experiencia --}}
    <div class="col-sm-12 margin-b-1">
        {!! Form::label('', 'Próximas Datas', ['class' => 'row col-sm-12']) !!}
        <ul id="data-ocorrencia-container">
            @if (isset($experiencia))
            @foreach ($experiencia->ocorrencias as $dataOcorrencia)
                @include('experiencias._form_data_ocorrencia', ['dataOcorrencia' => $dataOcorrencia])
            @endforeach
            @endif

            {{-- Botao de adicionar novas datas --}}
            <li class="col-xs-12 margin-b-1 container-datas-ocorrencia">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="adicionaDataOcorrenciaExperiencia(event)">
                            <i class="fa fa-2x fa-plus margin-t-1" ></i>
                            <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                        </a>
                </div>
            </li>

        </ul>
    </div>



    {{-- Secao de categorias da experiencia --}}
    <div class="col-sm-12 margin-b-1">
        <label class="row col-xs-12">Categorias</label>
        @foreach ($Categorias as $categoria)
            <label class="col-xs-3">
                <input type="checkbox" name="categoria[]"
                    value="{{ $categoria->id }}"
                    @if (isset($experiencia) && !$experiencia->categorias->isEmpty() && $experiencia->categorias->find($categoria->id) )
                        checked="true"
                    @endif
                    >{{ $categoria->nome }}
            </label>
        @endforeach
    </div>
</div>
<div class="col-sm-12 margin-b-1 margin-t-1">
        {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
</div>

