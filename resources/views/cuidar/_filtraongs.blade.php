{!! Form::open(array('url' => array('busca/filtrarongs')))!!}
<div class="col-sm-12 filtro-cuidar">
    <div class="col-sm-3 col-sm-offset-1">

        @if(isset($cidades))
        {!! Form::select("filtro_cidade", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control'], ['id' => 'cidade_select']) !!}
        @endif
    </div>

    {{-- Adicionando div do filtro de Categorias das ongs --}}
    <div class="col-sm-3">
        @if(isset($categorias))
        {!! Form::select("filtro_categoria", $categorias, ['title' => trans('global.lbl_category'), 'placeholder' => trans('global.lbl_category'), 'class' => 'form-control'], ['id' => 'categoria_select']) !!}
         @endif
   </div>
 
    <div class="col-sm-3">
        {!! Form::text("nome", "", ['title' => trans('global.ong_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control']) !!}
    </div>

    {!! Form::submit(trans('global.lbl_searchr'), ['class' => 'btn col-sm-2']) !!}
</div>
{!! Form::close() !!}

@include('errors.list')
