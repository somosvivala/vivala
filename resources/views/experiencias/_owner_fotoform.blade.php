<div class="row">
  <div class="col-lg-9">
    {!! Form::label('foto_owner', 'Foto da Instituição/Empresa responsável') !!}
    <span class="campo-obrigatorio">* Obrigatório</span>
  </div>
  <div class="col-lg-3 text-right">
    <table class="col-lg-6 col-lg-offset-6 text-right">
      <td><abbr title="Foto do logotipo que resume, da melhor maneira possível, a Instituição/Empresa que está promovendo a experiência."><i class='fa fa-2x fa-question-circle-o'></i></abbr></td>
    </table>
  </div>
  <div class="col-lg-12">
    <div class="text-center">
      <a type="button" data-target="#cropper-owner-experiencia-modal" data-toggle="modal">
        <img class="round owner-experiencia-foto-atual" src="{{ isset($foto) ? $foto : '/img/interrogacao.png' }}"/>
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
    {!! Form::hidden('foto_owner') !!}
  </div>
</div>
