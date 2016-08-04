@extends('gestao.experiencias.index')

@section('gestao.experiencias.content')
<div class="col-lg-12 fundo-cheio">
  <div class="padding-b-1" id="cadastrar-categoria-experiencia">
    <h2 class="col-lg-12">Criar Categoria de Experiências</h2>
      @include('errors.list')

      {!! Form::open(['url' => 'categorias/experiencias']) !!}
        <div class="container-fluid">
          <div class="row">
            @include('experiencias.categorias.form', ['textBtnSubmit' => 'Criar Categoria'])
          </div>
        </div>
      {!! Form::close() !!}

  </div>
</div>
@endsection

{{-- Modal IconPicker FontAwesome --}}
@include('modals._iconpickerfontawesome')
