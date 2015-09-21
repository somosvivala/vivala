{!! Form::open(array('url' => array('ong/create')))!!}
{{--
<div class="col-sm-3">
    @if(isset($localOngs))
        <select name="localOng">
            <option value="">Local</option>
            @forelse($localOngs as $Cidade)
            <option value="{{ $Cidade->id }}">{{ $Cidade->nome }}</option>
            @empty
            <option disabled="disabled">Sem cidades</option>
            @endforelse
        </select>
    @endif
</div>
--}}
<div class="col-sm-3">
    @if(isset($categorias))
        <select name="categoriaOng" class="suave">
            <option value="null">Categoria</option>
            @forelse($categorias as $Categoria)
            <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
            @empty
            <option disabled="disabled">Sem categorias</option>
            @endforelse
        </select>
    @endif
</div>
<div class="col-sm-3">
    @if(isset($ongs))
        <select name="ong" class="suave">
            <option value="null">Nome</option>
            @forelse($ongs as $Ong)
            <option value="{{ $Ong->id }}">{{ $Ong->nome }}</option>
            @empty
            <option disabled="disabled">Sem categorias</option>
            @endforelse
        </select>
    @endif
</div>
<div class="col-sm-12 text-center">
    {!! Form::submit('Buscar', ['class' => 'btn']) !!}
</div>
{!! Form::close() !!}
 
