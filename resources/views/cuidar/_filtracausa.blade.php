{!! Form::open(array('url' => array('busca/filtrarvagas')))!!}
<div class="col-sm-12 filtro-cuidar">
    {{-- Adicionando div do filtro de Categorias das vagas --}}
    <div class="col-sm-3">
        @if(isset($categorias))
        {!! Form::select("filtro_categoria", $categorias, ['title' => trans('global.lbl_category'), 'placeholder' => trans('global.lbl_category')], ['id' => 'categoria_select', 'class' => 'form-control form-control-fix']) !!}
         @endif
   </div>

    {{-- Adicionando div do filtro por Ongs que tem vagas --}}
    <div class="col-sm-3">
        @if(isset($ongs))
        {!! Form::select("filtro_ong", $ongs, ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong')], ['id' => 'ong_select', 'class' => 'form-control form-control-fix']) !!}
         @endif
    </div>

    {{-- Adicionando div do filtro por Cidade que tem vagas --}}
    <div class="col-sm-3">
        @if(isset($cidades))
        {!! Form::select("filtro_cidade", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city')], ['id' => 'cidade_select', 'class' => 'form-control form-control-fix']) !!}
        @endif
    </div>
    <div class="col-sm-3">
      {!! Form::submit(trans('global.lbl_searchr'), ['class' => 'btn btn-acao col-sm-12']) !!}
    </div>
</div>

{!! Form::close() !!}

@include('errors.list')
