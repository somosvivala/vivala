@extends('conectar')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="form-ong-head">
                <h3 class="text-center margin-t-2">{{ trans('global.lbl_perfil_edit') }}</h3>
            </div>

            <div class="panel-body">

                <!-- Adiciona um formulario pra upload de foto-->
                <div class="jc_coords text-center row col-sm-12">

                    {!! Form::open(['url' => ['foto/cropandsave',  $perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'cropfoto-ajax']) !!}
                    {!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

                    <img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

                    <div class="file-upload">
                        <label for="image_file_upload">
                            {{ trans('global.lbl_photo_send') }}
                            <p>{{ trans('global.quiz_fromcomputer') }}</p>
                            {!! Form::file("image_file_upload", ['id' => 'image_file_upload', 'class' => 'upload']) !!}
                        </label>
                    </div>
                    
                    {!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!}
                    {!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!}
                    {!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!}
                    {!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!}
                    {!! Form::hidden("_token",  csrf_token(), ['name' => '_token' ]) !!}
                    {!! Form::submit( trans('global.lbl_photo_update'), ['class' => 'btn btn-acao']) !!}
                    {!! Form::close() !!}
                </div>

                @include('errors.list')
                
                {!! Form::model($user, ['url' => ['editarPerfil',  $user->id ]]) !!}
                    @include('perfil.form', ['btnSubmit' => trans('global.lbl_perfil_update')])
                {!! Form::close() !!}
        </div>
    </div>

@endsection
