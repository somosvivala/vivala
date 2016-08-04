<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="listagem-categorias-experiencia">
        <h2 class="col-xs-12">Gerenciamento das Categorias</h2>
        <div class="col-xs-12 margin-t-1">
            <ul class="list-group">
            @if ( isset($Categorias) )
                @forelse ($Categorias as $categoria)
                    <li class="col-xs-12 list-group-item categoria-experiencia-item fundo-cinza-com-borda padding-b-1" data-id="{{ $categoria->id }}">
                        <div class="col-xs-9">
                            <i class="fa-2x {{ $categoria->icone }} "></i> &nbsp; {{ $categoria->nome }}
                        </div>
                        <div class="col-xs-3 text-right" style="border-left:1px solid #ddd;">
                            <a title="Editar Categoria" href="/categorias/experiencias/{{ $categoria->id }}/edit">
                                <i class="text-success fa-2x fa fa-pencil"></i>
                            </a>
                            &nbsp; - &nbsp;
                            <a title="Excluir Categoria" href="#" onclick="confirmaDeleteCategoriaExperiencia(event)">
                                <i class="text-danger fa-2x fa fa-close"></i>
                            </a>
                            {!! Form::hidden('_token', csrf_token()) !!}
                        </div>
                    </li>
                @empty

                <p>Nenhuma categoria encontrada</p>

                @endforelse
            @endif
            </ul>
        </div>
    </div>
</div>
