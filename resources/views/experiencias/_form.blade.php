<div class="col-sm-12">
    <label class="row col-sm-12">Cidade</label>
    <input id="campo-autocomplete-cidades" class="autocomplete-cidades-ativo" type="text" placeholder="cidade"/>
    <input id="campo-autocomplete-cidades-hidden" name="cidade" autocomplete="off" type="hidden">
    <i class="fa fa-spin fa-spinner loading-search soft-hide laranja"></i>
</div>
<div class="">
    <label class="row col-sm-12">Descrição</label>
    {!! Form::textarea("descricao", null, ['id'=>'descricao', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input', 'rows' => 3]) !!}
</div>
<div class="">
    <label class="row col-sm-12">Preço</label>
    <input type="text" name="preco" placeholder="preco"/>
</div>
<div class="">
    <label class="row col-xs-12">Categorias</label>
    @foreach ($Categorias as $categoria)
        <label class="col-xs-3">
            <input type="checkbox" name="categoria[]" value="{{ $categoria->id }}">{{ $categoria->nome }}
        </label>
    @endforeach
</div>
<div class="col-sm-12">
    <button type="submit" class="btn btn-acao">Cadastrar</button>
</div>
