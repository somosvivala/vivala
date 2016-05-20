<div class="col-sm-12 margin-b-1">
    {!! Form::label('projeto', 'Projeto responsavel', ['class' => 'row col-sm-12']) !!}
    {!! Form::select("projeto", $ongs, (isset($experiencia) ? $experiencia->owner->id : []), ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control', 'id' => 'ong_select']) !!}
</div>
<div class="col-sm-12 margin-b-1">
    <label class="row col-sm-12">Cidade</label>
    <input id="campo-autocomplete-cidades" class="autocomplete-cidades-ativo" type="text" placeholder="cidade" value="{{ isset($experiencia) ? $experiencia->local->nome : "" }}"/>
    <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden" value="{{ isset($experiencia) ? $experiencia->local->id : "" }}">
    <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
</div>
<div class="col-sm-12 margin-b-1">
    {!! Form::label('descricao_listagem', 'Descrição na listagem', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("descricao_listagem", null, ['id'=>'descricao_listagem', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
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
    <ul class="">
        <li class="">
            <div class="col-sm-1">
                {!! Form::label('icone', 'Icone  ', ['class' => 'margin-t-2 row col-sm-12']) !!}
                <i name="icone" class="margin-t-2 fa fa-circle"> </i>
            </div>
            <div class="col-sm-2">
                {!! Form::label('classe_icone', 'Classe icone', ['class' => 'row col-sm-12']) !!}
                <input type="text" name="classe_icone[]">
            </div>
            <div class="col-sm-4">
                {!! Form::label('descricao_info', 'Descricao icone', ['class' => 'row col-sm-12']) !!}
                <input type="text" name="descricao_info[]">
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

