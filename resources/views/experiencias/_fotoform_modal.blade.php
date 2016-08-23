<div class="modal cropper-foto-modal fade" id="cropper-experiencia-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-b-no">
        <h3 class="modal-title text-center font-bold-upper laranja">
          Foto da experiência
        </h3>
      </div>
      <div class="modal-body">
          {!! Form::open(['url' => ['foto/cropandsaveexperiencia', isset($experiencia) ? $experiencia->id : ''], 'files' => true, 'id'=>'experiencia_foto_form', 'data-loading'=>'form-loading']) !!}
            <label id="btn-upload-img-experiencia" class="btn btn-acao btn-upload margin-b-1" for="input-experiencia-foto-perfil" title="Upload image file">
                <input class="sr-only" id="input-experiencia-foto-perfil" name="file" accept="image/*" type="file">
                <span data-original-title="Import image with Blob URLs" class="docs-tooltip" data-toggle="tooltip" title="">
                    <span class="fa fa-upload"></span>
                    SELECIONE UMA IMAGEM
                </span>
            </label>
            <div id="cropper-experiencia" class="cropper-img">
                <img src="{{ isset($foto) ? $foto : '/img/interrogacao.png' }}" />
            </div>
            {!! Form::hidden("x",  0, ['id' => 'x-experiencia-perfil']) !!}
            {!! Form::hidden("y",  0, ['id' => 'y-experiencia-perfil']) !!}
            {!! Form::hidden("w",  0, ['id' => 'w-experiencia-perfil']) !!}
            {!! Form::hidden("h",  0, ['id' => 'h-experiencia-perfil']) !!}
            {!! Form::hidden("r",  0, ['id' => 'r-experiencia-perfil']) !!}
            {!! Form::submit( "cortar foto", ['id'=>'btn-crop-photo-experiencia', 'class' => 'margin-t-1 soft-hide btn btn-primario btn-acao']) !!}
            <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x laranja margin-t-1" style="display:none"></i>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
