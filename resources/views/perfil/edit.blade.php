@extends('conectar')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="form-ong-head">
                <h3 class="text-center margin-t-2">{{ trans('global.lbl_profile_edit') }}</h3>
            </div>

        <div class="panel-body edit-perfil">
            <div class="text-center">
                <a type="button" data-target="#cropper-perfil-modal" data-toggle="modal">
                    <img class="perfil-foto-atual" src="{{ $foto ? $foto : '/img/interrogacao.png' }}"/>
                    <div class="row pointer margin-t-2">
                        <div class="file-upload">
                            <label for="image_file_upload">
                                {{ trans("global.lbl_photo_send") }}
                                <p>{{ trans("global.quiz_fromcomputer") }}</p>
                            </label>
                        </div>
                    </div>
                </a>
            </div>
            <div class="modal cropper-foto-modal fade" id="cropper-perfil-modal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-body">
                            {!! Form::open(['url' => ['foto/cropandsave', $perfil->id], 'files' => true, 'id'=>'perfil_foto_form', 'data-loading'=>'form-loading']) !!}

                        {!! Form::hidden("tipoEntidade", "App\\Perfil" ) !!}

                            <h2 class="text-center"></h2>
                            <label id="btn-upload-img-perfil" class="btn btn-acao btn-upload margin-b-1" for="input-perfil-foto-perfil" title="Upload image file">
                                <input class="sr-only" id="input-perfil-foto-perfil" name="file" accept="image/*" type="file">
                                <span data-original-title="Import image with Blob URLs" class="docs-tooltip" data-toggle="tooltip" title="">
                                    <span class="fa fa-upload"></span>
                                    SELECIONE UMA IMAGEM
                                </span>
                            </label>    
                            <div id="cropper-perfil" class="cropper-img">
                                <img src="{{ $foto ? $foto : '/img/interrogacao.png' }}" />
                            </div>
                            {!! Form::hidden("x",  0, ['id' => 'x-perfil-perfil']) !!}
                            {!! Form::hidden("y",  0, ['id' => 'y-perfil-perfil']) !!}
                            {!! Form::hidden("w",  0, ['id' => 'w-perfil-perfil']) !!}
                            {!! Form::hidden("h",  0, ['id' => 'h-perfil-perfil']) !!}
                            {!! Form::hidden("r",  0, ['id' => 'r-perfil-perfil']) !!}
                            {!! Form::submit( "cortar foto", ['id'=>'btn-crop-photo', 'class' => 'margin-t-1 soft-hide btn btn-primario btn-acao']) !!}
                            <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1" style="display:none"></i>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::model($user, ['url' => ['editarPerfil',  $user->id ]]) !!}
                @include('errors.list')
                @include('perfil.form', ['btnSubmit' => trans('global.lbl_profile_update')])
            {!! Form::close() !!}
    </div>
    </div>

@endsection
