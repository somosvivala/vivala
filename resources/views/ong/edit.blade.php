@extends('cuidar')

@section('content')
  <div class="panel panel-default">

    <div class="form-ong-head">
        <h3 class="text-center margin-t-2">{{ trans('global.lbl_volunteer_work_edit') }}</h3>
        {!! Form::open([ 'method' => 'DELETE', 'route' => ['ong.destroy', $ong->id] ]) !!}
        {!! Form::submit('Remover ', ['class' => 'btn', 'onclick' => "return confirm('Tem certeza que deseja excluir esse projeto?');"]) !!}
        {!! Form::close() !!}
    </div>

    <div class="panel-body">
        <div class="text-center">
            <a type="button" data-target="#cropper-ong-modal" data-toggle="modal">
                <img class="ong-foto-atual" src="/img/interrogacao.png"/>
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
        <div class="modal cropper-foto-modal fade" id="cropper-ong-modal">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body">
                        {!! Form::open(['url' => ['foto/cropandsave', $ong->id], 'files' => true, 'id'=>'ong_foto_form', 'data-loading'=>'form-loading']) !!}

                    {!! Form::hidden("tipoEntidade", "App\\Ong" ) !!}
    
                        <h2 class="text-center"></h2>
                        <label id="btn-upload-img-ong" class="btn btn-acao btn-upload margin-b-1" for="input-ong-foto-perfil" title="Upload image file">
                            <input class="sr-only" id="input-ong-foto-perfil" name="file" accept="image/*" type="file">
                            <span data-original-title="Import image with Blob URLs" class="docs-tooltip" data-toggle="tooltip" title="">
                                <span class="fa fa-upload"></span>
                                SELECIONE UMA IMAGEM
                            </span>
                        </label>    
                        <div id="cropper-ong" class="cropper-img">
                            <img src="{{ '/img/nophoto.png' }}" />
                        </div>
                        {!! Form::hidden("x",  0, ['id' => 'x-ong-perfil']) !!}
                        {!! Form::hidden("y",  0, ['id' => 'y-ong-perfil']) !!}
                        {!! Form::hidden("w",  0, ['id' => 'w-ong-perfil']) !!}
                        {!! Form::hidden("h",  0, ['id' => 'h-ong-perfil']) !!}
                        {!! Form::hidden("r",  0, ['id' => 'r-ong-perfil']) !!}
                        {!! Form::submit( "cortar foto", ['id'=>'btn-crop-photo', 'class' => 'margin-t-1 soft-hide btn btn-primario btn-acao']) !!}
                        <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::model($ong, ['method' => 'PATCH', 'action' => ['OngController@update', $ong->id] ]) !!}

                @include('ong.form', ['btnSubmit' => trans('global.lbl_ong_update') ]);

        {!! Form::close() !!}
</div>

    @include('errors.list')
@stop
