@extends('mobiletemplate')

@section('content')
<div class="bg-checkout">
    <div class="popup-checkout">
        <span class="col-xs-12 margin-t-1">
            <i class="fa fa-envelope round-icon-bg"></i>
        </span>
        <h1 class="col-xs-12 negrito-exp">Você está quase lá!</h1>
        <small class="col-xs-12">Te enviaremos um email com todos os detalhes.</small>
        <span class="col-xs-12 margin-t-1">
          Para confirmar sua inscrição na experiência
          <br />
          <b class="texto-maiusculo">{{ $Experiencia->nome }}</b>
          <br />
          oferecida pela instituição
          <br />
          <b class="texto-maiusculo">{{$Experiencia->owner->nome}}</b>,
          <br />
          realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:
        </span>
        <div class="col-xs-12">
            <div class="dados-bancarios margin-t-1">
                <span class="row col-xs-12 margin-t-0-5 texto-maiusculo negrito-exp">
                  <span class="text-left">{!! trans('global.lbl_name') !!}:</span>
                  <br />
                  <span class="text-center">{{ env('VIVALA_FANTASY_NAME') }}</span>
                </span>
                <span class="row col-xs-12 margin-t-0-5 texto-maiusculo negrito-exp">
                  <span class="text-left">CNPJ:</span>
                  <br />
                  <span class="text-center">{{ env('VIVALA_CNPJ') }}</span>
                </span>
                <span class="row col-xs-12 margin-t-0-5 texto-maiusculo negrito-exp">
                  <span class="text-left">{!! trans('global.lbl_bank') !!}:</span>
                  <br />
                  <span class="text-center">{{ env('VIVALA_BANK') }}</span>
                </span>
                <span class="row col-xs-12 margin-t-0-5 texto-maiusculo negrito-exp">
                  <span class="text-left">{!! trans('global.lbl_agency') !!}:</span>
                  <br />
                  <span class="text-center">{{ env('VIVALA_AG') }}</span>
                </span>
                <span class="row col-xs-12 text-center margin-t-0-5 margin-b-0-5 texto-maiusculo negrito-exp">
                  <span class="text-left">{!! trans('global.lbl_account') !!}:</span>
                  <br />
                  <span class="text-center">{{ env('VIVALA_CC') }}</span>
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
