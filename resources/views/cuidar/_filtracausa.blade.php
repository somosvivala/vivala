
{!! Form::open(array('url' => array('busca/filtrarvagas')))!!}
<div class="col-sm-12 filtro-cuidar">
    {{-- Adicionando div do filtro de Categorias das vagas --}}
    <div class="col-sm-3">
        @if(isset($categorias))
        {!! Form::select("filtro_categoria", $categorias, ['title' => trans('global.lbl_category'), 'placeholder' => trans('global.lbl_category'), 'class' => 'form-control'], ['id' => 'categoria_select']) !!}
         @endif
   </div>
    
    {{-- Adicionando div do filtro por Ongs que tem vagas --}}
    <div class="col-sm-3">
        @if(isset($ongs))
        {!! Form::select("filtro_ong", $ongs, ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control'], ['id' => 'ong_select']) !!}
         @endif
    </div>

    {{-- Adicionando div do filtro por Cidade que tem vagas --}}
    <div class="col-sm-3  ">
        @if(isset($cidades))
        {!! Form::select("filtro_cidade", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control'], ['id' => 'cidade_select']) !!}
        @endif
    </div>


    {!! Form::submit(trans('global.lbl_searchr'), ['class' => 'btn col-sm-2 ']) !!}
</div>

{!! Form::close() !!}

@include('errors.list')
