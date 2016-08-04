@extends('gestao.experiencias.index')

@section('gestao.experiencias.content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">
  <div class="padding-b-1" id="cadastrar-categoria-experiencia">
    <h2 class="col-sm-12">Criar Categoria de Experiências</h2>
      @include('errors.list')

      {!! Form::open(['url' => 'categorias/experiencias']) !!}
        @include('experiencias.categorias.form', ['textBtnSubmit' => 'Criar Categoria'])
      {!! Form::close() !!}

  </div>
</div>
@endsection

{{-- Modal IconPicker FontAwesome --}}
@include('modals._iconpickerfontawesome')
