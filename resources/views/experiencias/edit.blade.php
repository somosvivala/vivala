@extends('gestao.experiencias.index')
@section('gestao.experiencias.content')

<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="editar-experiencia">
        <h2 class="col-sm-12">Editar Experiência</h2>
            @include('errors.list')

            {!! Form::model($experiencia, ['method' => 'PATCH', 'action' => ['ExperienciasController@update', $experiencia->id] ]) !!}

                @include('experiencias.form', ['textBtnSubmit' => 'Atualizar'])

            {!! Form::close() !!}

    </div>
</div>
@include('experiencias._owner_fotoform_modal')
{{-- incluindo a modal que edita a foto do owner da experiencia apos o form --}}

{{-- incluindo a modal que edita a foto da experiencia apos o form --}}
@include('experiencias._fotoform_modal')
@endsection
