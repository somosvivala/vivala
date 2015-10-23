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
            <div class="col-sm-12">

                {{-- Adicionando div de update da foto de perfil da ong --}}
                <div class="text-center jc_coords row col-sm-12">

                    {!! Form::open(['url' => ['foto/cropandsave', 0], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'cropfoto-ajax']) !!}
                    {!! Form::hidden("NoOwner",  true) !!}

                    <img id="preview" src="{{ $vaga->getCapaUrl() }}" class="foto-preview"/>

                    <div class="file-upload">
                        <label for="image_file_upload">{{ trans('global.lbl_photo_send') }}<p>{{ trans('global.quiz_fromcomputer') }}</p>
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
