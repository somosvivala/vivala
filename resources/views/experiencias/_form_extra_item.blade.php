<li class="info-experiencia-item col-xs-12 margin-b-1">
        <div class="col-xs-1">
            {!! Form::label('icone_show', 'Icone  ', ['class' => 'margin-t-2 row col-sm-12']) !!}
            <i name="icone-show" class="icone-show margin-t-2 {{ $informacao->icone }}"> </i>
        </div>
        <div class="col-xs-2">
            {!! Form::label('classe_icone', 'Classe icone', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="icone[{{ $informacao->id }}]" class='bind-icone-ativo' value="{{ $informacao->icone }}">
        </div>
        <div class="col-xs-8">
            {!! Form::label('descricao_info', 'Descricao icone', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="descricao_info[{{ $informacao->id }}]" value="{{ $informacao->descricao }}">
        </div>
        <div class="col-xs-1 text-center">
                <a href="#" onclick="removeInfoExperiencia(event)">
                    <i class="fa fa-2x fa-close margin-t-1"></i>
                </a>
        </div>
</li>
