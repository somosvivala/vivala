{{-- Secao de selecao da ong/projeto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    {!! Form::label('projeto', 'Projeto responsavel', ['class' => 'row col-sm-12']) !!}
    {!! Form::select("projeto", $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control', 'id' => 'ong_select']) !!}
</div>


{{-- Secao de selecao da ong/projeto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    <label class="row col-sm-12">Cidade</label>
    <input id="campo-autocomplete-cidades" autocomplete="off" class="autocomplete-cidades-ativo" type="text" placeholder="cidade" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}"/>
    <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
    <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
</div>


{{-- Secao de campos texto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    {!! Form::label('descricao_na_listagem', 'Descrição na listagem', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("descricao_na_listagem", null, ['id'=>'descricao_na_listagem', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
</div>
<div class="col-sm-12 margin-b-1">
    {!! Form::label('descricao', 'Descrição', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("descricao", null, ['id'=>'descricao', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
</div>
<div class="col-sm-12 margin-b-1">
    {!! Form::label('detalhes', 'Detalhes da experiencia', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("detalhes", null, ['id'=>'detalhes', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
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
<div class="col-sm-12 margin-b-1">
        {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
</div>

