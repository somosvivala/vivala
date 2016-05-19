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
    {!! Form::label('descricao', 'Descrição', ['class' => 'row col-sm-12']) !!}
    {!! Form::textarea("descricao", null, ['id'=>'descricao', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
</div>
<div class="col-sm-12 margin-b-1">
    {!! Form::label('preco', 'Preço', ['class' => 'row col-sm-12']) !!}
    {!! Form::text('preco', null, ['placeholder' => 'preco']) !!}
</div>
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

