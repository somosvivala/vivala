@extends('cuidar')

@section('content')
  <h1>Edite a Ong</h1>
	<!-- Adiciona um formulario pra upload de foto de capa-->
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/home']) !!}
            {!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

            <img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans("quiz.sendphoto") }}
                    <p>{{ trans("quiz.fromrcomputer") }}</p>
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
            {!! Form::submit( trans("Atualizar foto"), ['class' => 'btn btn-acao']) !!}
            {!! Form::close() !!}
        </div>


	<!-- Adiciona um formulario pra upload de foto-->
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/home']) !!}
            {!! Form::hidden("tipoEntidade",  "App\Perfil") !!}

            <img id="preview" src="{{ $foto?$foto:'/img/interrogacao.png' }}" class="foto-preview"/>

            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans("quiz.sendphoto") }}
                    <p>{{ trans("quiz.fromrcomputer") }}</p>
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
            {!! Form::submit( trans("Atualizar foto"), ['class' => 'btn btn-acao']) !!}
            {!! Form::close() !!}
        </div>



  	{!! Form::model($ong, ['method' => 'PATCH', 'action' => ['OngController@update', $ong->id] ]) !!}

		@include('ong.form', ['btnSubmit' => 'Atualizar Dados']);

    {!! Form::close() !!}

    @include('errors.list')
@stop
