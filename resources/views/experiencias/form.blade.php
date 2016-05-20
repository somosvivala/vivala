{{-- Secao de selecao da ong/projeto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    {!! Form::label('projeto', 'Projeto responsavel', ['class' => 'row col-sm-12']) !!}
    {!! Form::select("projeto", $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control', 'id' => 'ong_select']) !!}
</div>


{{-- Secao de selecao da ong/projeto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    <label class="row col-sm-12">Cidade</label>
    <input id="campo-autocomplete-cidades" class="autocomplete-cidades-ativo" type="text" placeholder="cidade" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}"/>
    <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
    <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
</div>


{{-- Secao de campos texto da experiencia --}}
<div class="col-sm-12 margin-b-1">
    {!! Form::label('frase_listagem', 'Descrição na listagem', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("frase_listagem", null, ['id'=>'frase_listagem', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
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
            <li class="info-experiencia-item col-xs-12 margin-b-1">
                <div class="col-xs-1">
                    {!! Form::label('icone_show', 'Icone  ', ['class' => 'margin-t-2 row col-sm-12']) !!}
                    <i name="icone-show" class="icone-show margin-t-2 {{ $informacao->icone }}"> </i>
                </div>
                <div class="col-xs-2">
                    {!! Form::label('classe_icone', 'Classe icone', ['class' => 'row col-sm-12']) !!}
                    <input type="text" name="icone[{{ $informacao->id }}]" class='bind-icone-ativo' value="{{ $informacao->icone }}">
                </div>
                <div class="col-xs-8">
                    {!! Form::label('descricao_info', 'Descricao icone', ['class' => 'row col-sm-12']) !!}
                    <input type="text" name="descricao_info[{{ $informacao->id }}]" value="{{ $informacao->descricao }}">
                </div>
                <div class="col-xs-1 text-center">
                        <a href="#" onclick="removeInfoExperiencia(event)">
                            <i class="fa fa-2x fa-close margin-t-1"></i>
                        </a>
                </div>

            </li>
        @endforeach
        @endif

        {{-- Botao de adicionar novas Informacoes --}}
        <li class="col-xs-12 margin-b-1 info-experiencia-item">
            <div class="col-xs-11"></div>
            <div class="col-xs-1 text-center">
                    <a href="#" onclick="adicionaInfoExperiencia(event)">
                        <i class="fa fa-2x fa-plus margin-t-1" ></i>
                        <i class="fa fa 2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                    </a>
            </div>
        </li>

    </ul>
</div>


{{-- Secao de categoris da experiencia --}}
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

