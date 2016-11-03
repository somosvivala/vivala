@extends('mobiletemplate')

@section('content')
<div class="bg-checkout">
    <div class="popup-checkout">
        <span class="col-xs-12 margin-t-1">
            <i class="fa fa-envelope round-icon-bg"></i>
        </span>
        <h1 class="col-xs-12 negrito-exp">Você está quase lá!</h1>
        <small class="col-xs-12 margin-t-0-5">Te enviaremos um email com todos os detalhes.</small>
        <span class="col-xs-12 margin-t-1 dados-experiencia">
          Para confirmar sua inscrição na experiência
          <br />
          <b class="texto-maiusculo">{{ $Experiencia->nome }}</b>
          <br />
          oferecida pela instituição <b class="texto-maiusculo">{{$Experiencia->owner_nome}}</b>,
          <br />
          realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:
        </span>
        <div class="col-xs-12">
            <div class="margin-t-2 text-left dados-bancarios">
                <div class="margin-t-0-5 texto-maiusculo ">
                  <span class="negrito-exp">{!! trans('global.lbl_name') !!}:</span>
                  <span class="margin-t-0-5">{{ env('VIVALA_FANTASY_NAME') }}</span>
                </div>
                <div class="margin-t-0-5 texto-maiusculo ">
                  <span class="negrito-exp">CNPJ:</span>
                  <span class="margin-t-0-5">{{ env('VIVALA_CNPJ') }}</span>
                </div>
                <div class="margin-t-0-5 texto-maiusculo ">
                  <span class="negrito-exp">{!! trans('global.lbl_bank') !!}:</span>
                  <span class="margin-t-0-5">{{ env('VIVALA_BANK') }}</span>
                </div>
                <div class="margin-t-0-5 texto-maiusculo ">
                  <span class="negrito-exp">{!! trans('global.lbl_agency') !!}:</span>
                  <span class="margin-t-0-5">{{ env('VIVALA_AG') }}</span>
                </div>
                <div class="margin-t-0-5 margin-b-0-5 texto-maiusculo ">
                  <span class="negrito-exp">{!! trans('global.lbl_account') !!}:</span>
                  <span class="margin-t-0-5">{{ env('VIVALA_CC') }}</span>
                </div>
            </div>
        </div>

@if ($Inscricao->temTempoValidoParaCriarBoleto)

        <div class="col-xs-12 separador">
            <span>ou</span>
        </div>
        <span class="col-xs-12">Pague com boleto bancário:</span>
        <span class="col-xs-12 margin-t-1 margin-b-4">
            <button type="button" class="btn btn-lg btn-gerar-boleto" data-toggle="modal" data-target="#modal-gerar-boleto">
                <i class="fa fa-barcode"></i>
                <span>Gerar<br>Boleto</span>
            </button>
        </span>

@endif


        <a href="{{ url('experiencias') . '/' . $Experiencia->id }}">
            <i class="fa fa-times x-preto"></i>
        </a>
    </div>
    <a class="btn-full-bottom" href="{{ url('experiencias') }}">Ver mais experiências</a>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-gerar-boleto" tabindex="-1" role="dialog" aria-labelledby="modal-gerar-boleto" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Preencha os campos para gerar o boleto</h4>
      </div>
        {!! Form::model(Auth::user(), ['url' => '/experiencias/gerarboleto/', 'class'=>'gerar-boleto-experiencia form-por-ajax', 'data-callback' => 'callbackGerarBoletoExperiencia(data)', 'data-loading' => '.ajax-loading', 'data-errors' => '.error-container']) !!}
      <div class="modal-body">
            {{-- Incluindo listagem de erros --}}
            @include('errors.mobile-list')

            {!! Form::hidden('experiencia_id', $Inscricao->experiencia->id) !!}
            @include('experiencias._form_dadosboleto')
      </div>
      <div class="modal-footer">
        <input type="submit" class="submit btn btn-acao btn-primary">Gerar boleto</button>
        <p class="ajax-loading text-center hidden"><i class='fa fa-1-5x fa-spin fa-pulse fa-spinner laranja'></i></p>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
