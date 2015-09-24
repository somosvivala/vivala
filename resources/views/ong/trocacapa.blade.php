@extends('cuidar')

@section('content')
  <h1>Edite a foto de capa</h1>
	<!-- Adiciona um formulario pra upload de foto de capa-->
        <div class="text-center jc_coords row col-sm-12">

            {!! Form::open(['url' => ['foto/cropandsave', $ong->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);', 'class' => 'form-ajax', 'data-redirect' => '/ongs/sobre/'.$ong->id]) !!}
            {!! Form::hidden("tipoEntidade",  "App\Ong") !!}

            <img id="preview" src="{{ isset($fotoCapa)?$fotoCapa:'/img/interrogacao.png' }}" class="foto-preview"/>

            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans("quiz.sendphoto") }}
                    <p>{{ trans("quiz.fromrcomputer") }}</p>
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

@stop
