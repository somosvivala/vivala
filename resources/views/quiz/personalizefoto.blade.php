@extends('quiz.index')

@section('pergunta')
<div id="tour-quiz" class="col-sm-12 pergunta quiz-2">
    <span class="absolute-top-right laranja">
        <a href="{{ url ('quiz')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('quiz/contemais')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
    </span>
    <div class="row">
      <div class="titulo col-sm-12 padding-b-1">
        <h2 class="tour_quiz-2-step1">{{ trans("global.quiz_profile_customize") }}</h2>
        <h3>{{ trans("global.quiz_photo_customize") }}</h3>
      </div>
    </div>
    <a type="button" data-target="#cropper-quiz-modal" data-toggle="modal">

        <img class="tour_quiz-2-step2" class="quiz-foto-atual" src="{{ $foto?$foto:'/img/interrogacao.png' }}"/>

        <div class="row pointer margin-t-2">
            <div class="file-upload">
                <label for="image_file_upload">
                    {{ trans("global.lbl_photo_send") }}
                    <p>{{ trans("global.quiz_fromcomputer") }}</p>
                </label>
            </div>
        </div>
    </a>
    <div class="modal cropper-foto-modal fade" id="cropper-quiz-modal">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">
                    {!! Form::open(['url' => ['foto/cropandsave',  Auth::user()->perfil->id ], 'files' => true, 'data-redirect' => '/quiz/contemais', 'id'=>'quiz_foto_form', 'data-loading'=>'form-loading']) !!}

                    <h2 class="text-center">{{ trans("global.quiz_profile_customize") }}</h2>
                    <label id="btn-upload-img-quiz" class="btn btn-acao btn-upload margin-b-1" for="input-quiz-foto-perfil" title="Upload image file">
                        <input class="sr-only" id="input-quiz-foto-perfil" name="file" accept="image/*" type="file">
                        <span data-original-title="Import image with Blob URLs" class="docs-tooltip" data-toggle="tooltip" title="">
                            <span class="fa fa-upload"></span>
                            SELECIONE UMA IMAGEM
                        </span>
                    </label>
                    <div id="cropper-quiz" class="cropper-img">
                        <img src="{{ '/img/nophoto.png' }}" />
                    </div>
                    {!! Form::hidden("tipoEntidade",  "App\Perfil") !!}
                    {!! Form::hidden("x",  0, ['id' => 'x-quiz-perfil']) !!}
                    {!! Form::hidden("y",  0, ['id' => 'y-quiz-perfil']) !!}
                    {!! Form::hidden("w",  0, ['id' => 'w-quiz-perfil']) !!}
                    {!! Form::hidden("h",  0, ['id' => 'h-quiz-perfil']) !!}
                    {!! Form::hidden("r",  0, ['id' => 'r-quiz-perfil']) !!}
                    {!! Form::submit( "cortar foto", ['id'=>'btn-crop-photo', 'class' => 'soft-hide btn btn-primario btn-acao']) !!}
                    <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x " style="display:none"></i>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
