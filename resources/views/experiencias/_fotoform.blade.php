{!! Form::label('foto_experiencia', 'Foto da Experiência') !!}
{!! Form::hidden('foto_experiencia') !!}
<div class="col-sm-12">
    <div class="text-center">
        <a type="button" data-target="#cropper-experiencia-modal" data-toggle="modal">
            <img class="experiencia-foto-atual" src="{{ isset($experiencia) && isset($experiencia->fotoCapa) ? $experiencia->fotoCapa->path : '/img/interrogacao.png' }}"/>
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
</div>
