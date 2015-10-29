@extends('cuidar')

@section('content')
<div class="panel panel-default">

    <div class="form-ong-head">
        <h3 class="text-center margin-t-2"> {{ trans('global.lbl_cause_edit') }}</h3>
        {!! Form::open([ 'method' => 'DELETE', 'route' => ['vagas.destroy', $vaga->id] ]) !!}
        {!! Form::submit( trans('global.lbl_remove'), ['class' => 'btn', 'onclick' => "return confirm('Tem certeza que deseja excluir essa vaga?');"]) !!}
        {!! Form::close() !!}
    </div>

    <div class="panel-body">
        <div id="causa-contato" class="row margin-t-2 form-ong">
             <h5 class="col-sm-12">{{ trans('global.lbl_cover_photo') }}</h5>
             <div class="text-center">
                <a type="button" data-target="#cropper-vaga-modal" data-toggle="modal">
                    <img class="vaga-foto-atual" src="/img/querocuidar.png"/>
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
            <div class="modal cropper-foto-modal fade" id="cropper-vaga-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            {!! Form::open(['url' => ['foto/cropandsave', 0], 'files' => true, 'id'=>'vaga_foto_form', 'data-loading'=>'form-loading']) !!}

                            {!! Form::hidden("NoOwner",  true) !!}
                            {!! Form::hidden("tipo",  'capa', ['id' => 'tipo_foto']) !!}
                            <h2 class="text-center"></h2>
                            <label id="btn-upload-img-vaga" class="btn btn-acao btn-upload margin-b-1" for="input-vaga-foto-perfil" title="Upload image file">
                                <input class="sr-only" id="input-vaga-foto-perfil" name="file" accept="image/*" type="file">
                                <span data-original-title="Import image with Blob URLs" class="docs-tooltip" data-toggle="tooltip" title="">
                                    <span class="fa fa-upload"></span>
                                    SELECIONE UMA IMAGEM
                                </span>
                            </label>    
                            <div id="cropper-vaga" class="cropper-img">
                                <img src="{{ '/img/querocuidar.png' }}" />
                            </div>
                            {!! Form::hidden("x",  0, ['id' => 'x-vaga-perfil']) !!}
                            {!! Form::hidden("y",  0, ['id' => 'y-vaga-perfil']) !!}
                            {!! Form::hidden("w",  0, ['id' => 'w-vaga-perfil']) !!}
                            {!! Form::hidden("h",  0, ['id' => 'h-vaga-perfil']) !!}
                            {!! Form::hidden("r",  0, ['id' => 'r-vaga-perfil']) !!}
                            {!! Form::submit( "cortar foto", ['id'=>'btn-crop-photo', 'class' => 'margin-t-1 soft-hide btn btn-primario btn-acao']) !!}
                            <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        @include('errors.list')
        {{-- Adicionando div de update da foto de perfil da ong --}}
        {!! Form::model($vaga, ['method' => 'PATCH', 'action' => ['VagaController@update', $vaga->id] ]) !!}
           {!! Form::hidden("foto", false, ['id' => 'uploadedFoto' ]) !!}
           @include('vaga.form', ['btnSubmit' => trans('global.lbl_cause_update')]);
        {!! Form::close() !!}

@stop
