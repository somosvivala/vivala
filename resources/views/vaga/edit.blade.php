@extends('cuidar')

@section('content')
<div class="panel panel-default">
    <h3 class="font-bold-upper text-center"> {{ trans('global.lbl_edit') }}
        <small class="sub-titulo"></small>
    </h3>
    <div class="panel-heading"><h1></h1></div>
    <div class="panel-body">
        <div id="causa-contato" class="row margin-t-2 form-ong">
            <h5 class="col-sm-12">Imagem de capa</h5>
            <div class="col-sm-12">

                {{-- Adicionando div de update da foto de perfil da ong --}}
                <div class="text-center jc_coords row col-sm-12">

                    {!! Form::open(['url' => ['foto/cropandsave', 0], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'cropfoto-ajax']) !!}
                    {!! Form::hidden("NoOwner",  true) !!}


                    <img id="preview" src="{{ $vaga->getCapaUrl() }}" class="foto-preview"/>

                    <div class="file-upload">
                        <label for="image_file_upload">
                            {{ trans('global.lbl_photo_send') }}
                            <p>{{ trans('global.quiz_fromcomputer') }}</p>
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
                        @include('errors.list')
                    </div>
                    {!! Form::submit( trans('global.lbl_photo_update'), ['class' => 'btn btn-primario btn-acao']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

    {!! Form::model($vaga, ['method' => 'PATCH', 'action' => ['VagaController@update', $vaga->id] ]) !!}

            {!! Form::hidden("foto", false, ['id' => 'uploadedFoto' ]) !!}
            @include('vaga.form', ['btnSubmit' => trans('global.lbl_cause_update')]);

    {!! Form::close() !!}

    @include('errors.list')
@stop
