<div id="modal-experiencia-gerar-boleto" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="modal-experiencia-gerar-boleto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header border-b-no">
        <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('lbl_close') !!}">
          <span aria-hidden="true"><i class="fa fa-1-5x fa-close"></i></span>
        </button>
        <h3 class="modal-title text-center font-bold-upper laranja">
          Preencha os campos para gerar o boleto
        </h3>
      </div>
      <div class="modal-body">
        {!! Form::model(Auth::user(), ['url' => '/experiencias/gerarboleto/', 'class'=>'gerar-boleto-experiencia form-por-ajax', 'data-callback' => 'callbackSucessoGeracaoBoletoExperiencias(data)', 'data-loading' => '.ajax-loading', 'data-errors' => '.error-container']) !!}
          {!! Form::hidden('experiencia_id', $Inscricao->experiencia->id) !!}
          @include('experiencias._form_dadosboleto')
      </div>
      <div class="modal-footer border-t-no">
          {!! Form::submit('Gerar Boleto', ['class' => 'btn btn-primario btn-acao pull-right']) !!}
        <p class="ajax-loading text-center hidden"><i class='fa fa-1-5x fa-spin fa-pulse fa-spinner laranja'></i></p>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
