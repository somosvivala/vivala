@extends('mobiletemplate')

@section('content')
<div class="bg-checkout">
    <div class="popup-checkout">
        <span class="col-xs-12 margin-t-1">
            <i class="fa fa-envelope round-icon-bg"></i>
        </span>
        <h1 class="col-xs-12 negrito-exp">Você está quase lá!</h1>
        <small class="col-xs-12">Te enviaremos um email com todos os detalhes.</small>
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
            <div class="margin-t-1 dados-bancarios">
                <span class="row col-xs-12 margin-t-0-5 texto-maiusculo negrito-exp">
                  <div class="text-left">{!! trans('global.lbl_name') !!}:</div>
                  <div class="text-center margin-t-0-5">{{ env('VIVALA_FANTASY_NAME') }}</div>
                </span>
                <span class="row col-xs-12 margin-t-1 texto-maiusculo negrito-exp">
                  <div class="text-left">CNPJ:</div>
                  <div class="text-center margin-t-0-5">{{ env('VIVALA_CNPJ') }}</div>
                </span>
                <span class="row col-xs-12 margin-t-1 texto-maiusculo negrito-exp">
                  <div class="text-left">{!! trans('global.lbl_bank') !!}:</div>
                  <div class="text-center margin-t-0-5">{{ env('VIVALA_BANK') }}</div>
                </span>
                <span class="row col-xs-12 margin-t-1 texto-maiusculo negrito-exp">
                  <div class="text-left">{!! trans('global.lbl_agency') !!}:</div>
                  <div class="text-center margin-t-0-5">{{ env('VIVALA_AG') }}</div>
                </span>
                <span class="row col-xs-12 margin-t-1 margin-b-0-5 texto-maiusculo negrito-exp">
                  <div class="text-left">{!! trans('global.lbl_account') !!}:</div>
                  <div class="text-center margin-t-0-5">{{ env('VIVALA_CC') }}</div>
                </span>
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
        {!! Form::model(Auth::user(), ['url' => '/experiencias/gerarboleto/', 'class'=>'gerar-boleto-experiencia']) !!}
      <div class="modal-body">
            {!! Form::hidden('experiencia_id', $Inscricao->experiencia->id) !!}
            @include('experiencias._form_dadosboleto')
      </div>
      <div class="modal-footer">
        <button type="submit" class="submit btn btn-acao btn-primary">Gerar boleto</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
