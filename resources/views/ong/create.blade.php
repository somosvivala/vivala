@extends('cuidar')

@section('content')
<div class="panel panel-default">

    <div class="form-ong-head">
        <h3 class="text-center margin-t-2">{{ trans('global.lbl_ong_register') }}!</h3>
        <h5 class="text-center margin-b-2">{{ trans('global.ong_register_and_help_improve') }}</h5>
    </div>

    <div class="panel-body">
        {{-- Adicionando div de update da foto de perfil da ong --}}
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave', 0], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'cropfoto-ajax']) !!}
            {!! Form::hidden("NoOwner",  true) !!}
           
            
            <img id="preview" src="/img/interrogacao.png" class="foto-preview"/>  

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
            <div class="erros">
            </div>
            {!! Form::submit( trans('global.lbl_photo_update'), ['class' => 'btn btn-acao']) !!}
            {!! Form::close() !!}
        </div>

        {!! Form::open(['url' => 'ong']) !!}
             {!! Form::hidden("foto", false, ['id' => 'uploadedFoto' ]) !!}

            @include('ong.form', ['btnSubmit' => trans('global.lbl_ong_register')])
        {!! Form::close() !!}
    </div>

    @include('errors.list')

</div>
@endsection
