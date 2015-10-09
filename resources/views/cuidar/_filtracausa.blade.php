{!! Form::open(array('url' => array('busca/filtrarvagas')))!!}
<div class="col-sm-12 filtro-cuidar">
    <div class="col-sm-3 col-sm-offset-2">
        @if(isset($categorias))
        <select name="categoriaOng" class="">
            <option value="null">{{ trans('global.lbl_category') }}</option>
            @forelse($categorias as $Categoria)
            <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
            @empty
            <option disabled="disabled">{{ trans('global.lbl_category_no_') }}</option>
            @endforelse
        </select>
        @endif
    </div>

    <div class="col-sm-3 ">
        @if(isset($cidades))
        {!! Form::select("cidade_id", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control'], ['id' => 'cidade_select']) !!}
        @endif
    </div>


    {!! Form::submit(trans('global.lbl_searchr'), ['class' => 'btn col-sm-2 ']) !!}
</div>

{!! Form::close() !!}

@include('errors.list')
