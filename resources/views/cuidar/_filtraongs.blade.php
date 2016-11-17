{!! Form::open(array('url' => array('busca/filtrarongs')))!!}
<div class="col-sm-12 filtro-cuidar">
    <div class="col-sm-3 col-sm-offset-1">
        @if(isset($cidades))
          {!! Form::select("filtro_cidade", $cidades, ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city')], ['id' => 'cidade_select', 'class' => 'form-control form-control-fix']) !!}
        @endif
    </div>

    {{-- Adicionando div do filtro de Categorias das ongs --}}
    <div class="col-sm-3">
      @if(isset($categorias))
      <select name="filtro_categoria" id="categoria_select" class="form-control form-control-fix" title="{{ trans('global.lbl_category') }}" placeholder="{{ trans('global.lbl_category') }}">
          @forelse($categorias as $key => $Categoria)
            <option value="{{ $key }}">{{ trans($Categoria) }}</option>
          @empty
            <option>{{ trans('global.lbl_category_no_') }}</option>
          @endforelse
      </select>
      @endif
    </div>
    <div class="col-sm-3">
        {!! Form::text("nome", "", ['title' => trans('global.ong_name'), 'placeholder' => trans('global.lbl_name'), 'class' => 'form-control form-control-fix']) !!}
    </div>

    {!! Form::submit(trans('global.lbl_searchr'), ['class' => 'btn btn-acao col-sm-2']) !!}
</div>
{!! Form::close() !!}

@include('errors.list')
