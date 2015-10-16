@extends('cuidar')

@section('content')
<div class="fundo-cheio col-sm-12 padding-b-2">
    <h3 class="font-bold-upper text-center margin-t-2 margin-b-2">Edite a foto de capa</h3>
	<!-- Adiciona um formulario pra upload de foto de capa-->
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave', $ong->id ], 'files' => true, 'onsubmit' => 'return false;', 'class' => 'form-ajax', 'data-redirect' => '/conectar']) !!}
            {!! Form::hidden("tipoEntidade",  "App\Ong") !!}

            <img id="preview" src="{{ isset($fotoCapa)?$fotoCapa:'/img/interrogacao.png' }}" class="foto-preview"/>

            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans("global.lbl_photo_send") }}
                    <p>{{ trans("global.quiz_fromcomputer") }}</p>
                    {!! Form::file("image_file_upload", ['id' => 'image_file_upload', 'data-ratio'=>'2', 'class' => 'upload']) !!}
                </label>
            </div>
            {!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!}
            {!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!}
            {!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!}
            {!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!}
            {!! Form::hidden("_token",  csrf_token(), ['name' => '_token' ]) !!}
            
            {!! Form::hidden("tipo",  'capa') !!}
            <div class="erros">
            </div>
            {!! Form::submit( trans("Atualizar foto de capa"), ['class' => 'btn btn-acao']) !!}
            {!! Form::close() !!}
        </div>
        </div>

@stop
