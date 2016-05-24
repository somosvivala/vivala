<div class="container-campos-fontawesome col-xs-12 margin-b-3 margin-t-3">
        <div class="col-xs-1">
            <i name="icone-show" class="icone-show margin-t-2 @if ( isset($Categoria) ) {{ $Categoria->icone }} @else fa fa-star @endif"> </i>
        </div>
        <div class="col-xs-3">
            {!! Form::label('classe_icone', 'Classes', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="icone" class='bind-icone-ativo' value="@if ( isset($Categoria) ) {{ $Categoria->icone }} @else fa fa-star @endif">
        </div>
        <div class="col-xs-6">
            {!! Form::label('nome', 'Nome da Categoria', ['class' => 'row col-sm-12']) !!}
            <input type="text" name="nome" value="@if ( isset($Categoria) ) {{ $Categoria->nome }} @endif">
        </div>
        <div class="col-xs-2">
            {!! Form::label('', '&nbsp', ['class' => 'invisible row col-sm-12']) !!}
            {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
        </div>
</li>

