<div class="col-lg-12 margin-b-3 margin-t-3 container-campos-fontawesome">

  <div class="col-lg-12 text-center">
    <div class="row text-center margin-b-4">
      <div class="col-lg-12 padding-b-1">
        <i name="icone-show" class="fa-5x icone-show margin-t-1 @if ( isset($Categoria) ) {{ $Categoria->icone }} @else fa fa-star @endif"> </i>
      </div>
      <div class="col-lg-12">
        <button type="button" class="btn btn-acao" data-toggle="modal" data-target="#modal-iconpicker-fontawesome">Selecionar Ícone</button>
      </div>
      <input id="icone-categoria-experiencia" type="hidden" name="icone" value="@if ( isset($Categoria) ) {{ $Categoria->icone }} @else fa fa-star @endif">
    </div>

    <div class="row text-center margin-b-2">
      <div class="col-lg-4 col-lg-offset-4">
        {!! Form::label('nome', 'Nome da Categoria', ['class' => 'row col-lg-12']) !!}
        <input type="text" name="nome" value="@if ( isset($Categoria) ) {{ $Categoria->nome }} @endif">
      </div>
    </div>

    <div class="row text-center">
      {!! Form::label('', '&nbsp', ['class' => 'invisible row col-sm-12']) !!}
      {!! Form::submit($textBtnSubmit, ['class' => 'btn btn-acao']) !!}
    </div>

  </div>
</div>
