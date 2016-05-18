<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="cadastrar-experiencia">
        <h2 class="col-sm-12">Cadastrar Experiência</h2>
            @include('errors.list')
        {!! Form::open(['url' => 'experiencias']) !!}

            <div class="">
                <label class="row col-sm-12">Cidade</label>
                <input type="text" name="cidade" placeholder="cidade"/>
            </div>
            <div class="">
                <label class="row col-sm-12">Descrição</label>
                {!! Form::textarea("descricao", null, ['id'=>'descricao', 'title'=> trans('global.lbl_organization_about'), 'aria-label'=> trans('global.lbl_about'), 'placeholder'=> trans('global.lbl_organization_about'), 'class' => 'form-control sem-resize ong-input' ]) !!}
            </div>
            <div class="">
                <label class="row col-sm-12">Foto</label>
                <input type="file">
            </div>
            <div class="">
                <label class="row col-sm-12">Preço</label>
                <input type="text" name="preco" placeholder="preco"/>
            </div>
            <div class="">
                <label class="row col-xs-12">Categorias</label>
                <label class="col-xs-3">
                    <input type="checkbox" name="categoria[]" value="1">Criança
                </label>
                <label class="col-xs-3">
                    <input type="checkbox" name="categoria[]" value="2">Animal 
                </label>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-acao">Cadastrar</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>

