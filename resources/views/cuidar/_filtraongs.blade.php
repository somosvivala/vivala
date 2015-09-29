{!! Form::open(array('url' => array('ong/create')))!!}
{{--
<div class="col-sm-3">
    @if(isset($localOngs))
        <select name="localOng">
            <option value="">{{ trans('global.lbl_local') }}</option>
            @forelse($localOngs as $Cidade)
            <option value="{{ $Cidade->id }}">{{ $Cidade->nome }}</option>
            @empty
            <option disabled="disabled">{{ trans('global.lbl_city_') }}</option>
            @endforelse
        </select>
    @endif
</div>
--}}
<div class="col-sm-3">
    @if(isset($categorias))
        <select name="categoriaOng" class="suave">
            <option value="null">{{ trans('global.lbl_category') }}</option>
            @forelse($categorias as $Categoria)
            <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
            @empty
            <option disabled="disabled">{{ trans('global.lbl_category_no_') }}</option>
            @endforelse
        </select>
    @endif
</div>
<div class="col-sm-3">
    @if(isset($ongs))
        <select name="ong" class="suave">
            <option value="null">{{ trans('global.lbl_name') }}</option>
            @forelse($ongs as $Ong)
            <option value="{{ $Ong->id }}">{{ $Ong->nome }}</option>
            @empty
            <option disabled="disabled">{{ trans('global.lbl_category_no_') }}</option>
            @endforelse
        </select>
    @endif
</div>
<div class="col-sm-12 text-center">
    {!! Form::submit(tras('global.lbl_search'), ['class' => 'btn']) !!}
</div>
{!! Form::close() !!}
