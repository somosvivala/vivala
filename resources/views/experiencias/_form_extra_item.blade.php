<li class="container-campos-fontawesome col-xs-12 margin-b-1" data-id="{{ $informacao->id }}">
        <input type="hidden" name="informacao-extra[{{ $informacao->id }}][id]" value="{{ $informacao->id }}">
        <div class="col-xs-1">
            <i name="icone-show" class="fa-2x icone-show margin-t-1 {{ $informacao->icone }}"> </i>
        </div>
        <div class="col-xs-3">
            {!! Form::label('classe_icone', '&nbsp;', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="informacao-extra[{{ $informacao->id }}][icone]" class='hidden bind-icone-ativo' value="{{ $informacao->icone }}">
            <button type="button" class="btn btn-acao" data-toggle="modal" data-target="#modal-iconpicker-fontawesome" onclick="mostraModalIconesInformacaoExperiencia(this)">Selecionar Ícone</button>
        </div>
        <div class="col-xs-7">
            {!! Form::label('descricao_info', 'Descricao icone', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="informacao-extra[{{ $informacao->id }}][descricao_info]" value="{{ $informacao->descricao }}">

        </div>
        <div class="col-xs-1 text-center">
                <a href="#" onclick="removeInfoExperiencia(event)">
                    <i class="fa fa-2x fa-close margin-t-1"></i>
                    <i class="fa fa-2x fa-spin margin-t-1 fa-spinner loading-icon soft-hide laranja"></i>
                </a>
        </div>
</li>
