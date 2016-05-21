<li class="info-experiencia-item col-xs-12 margin-b-1" data-id="{{ $informacao->id }}">
        <input type="hidden" name="informacao-extra[{{ $informacao->id }}][id]" value="{{ $informacao->id }}">
        <div class="col-xs-1">
            <i name="icone-show" class="icone-show margin-t-2 {{ $informacao->icone }}"> </i>
        </div>
        <div class="col-xs-3">
            {!! Form::label('classe_icone', 'Classes', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="informacao-extra[{{ $informacao->id }}][icone]" class='bind-icone-ativo' value="{{ $informacao->icone }}">
        </div>
        <div class="col-xs-7">
            {!! Form::label('descricao_info', 'Descricao icone', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="informacao-extra[{{ $informacao->id }}][descricao_info]" value="{{ $informacao->descricao }}">
        </div>
        <div class="col-xs-1 text-center">
                <a href="#" onclick="removeInfoExperiencia(event)">
                    <i class="fa fa-2x fa-close margin-t-1"></i>
                </a>
        </div>
</li>
