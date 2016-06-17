@extends('mobiletemplate')

@section('content')
<div class="bg-checkout">
    <div class="popup-checkout">
        <span class="col-xs-12 margin-t-3">
            <i class="fa fa-envelope round-icon-bg"></i>
        </span>
        <h1 class="col-xs-12 negrito-exp">Você está quase lá!</h1>
        <small class="col-xs-12">Te enviaremos um email com todos os detalhes.</small>
        <span class="col-xs-12 margin-t-3">Para confirmar sua inscrição na experiência da instituição
          <b class="texto-maiusculo">{{$Experiencia->owner->nome}}</b>,
          realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:
        </span>
        <div class="col-xs-12">
            <div class="dados-bancarios margin-t-1">
                <span class="row col-xs-12 text-left margin-t-0-5 margin-b-0-5 negrito-exp texto-maiusculo">{!! trans('global.lbl_account') !!}</span>
                <span class="row col-xs-12 text-left margin-t-0-5 margin-b-0-5 negrito-exp texto-maiusculo">{!! trans('global.lbl_agency') !!}</span>
                <span class="row col-xs-12 text-left margin-t-0-5 margin-b-0-5 negrito-exp texto-maiusculo">CNPJ</span>
                <span class="row col-xs-12 text-left margin-t-0-5 margin-b-0-5 negrito-exp texto-maiusculo">{!! trans('global.lbl_bank') !!}</span>
            </div>
        </div>
        <div class="col-xs-12 separador">
            <span>ou</span>
        </div>
        <span class="col-xs-12">Pague com boleto bancário:</span>
        <span class="col-xs-12 margin-t-1 margin-b-4">
            <i class="fa fa-barcode sqr-icon-bg"></i>
        </span>
        <a href="{{ url('experiencias') . '/' . $Experiencia->id }}">
            <i class="fa fa-times x-preto"></i>
        </a>
    </div>
    <a class="btn-full-bottom" href="{{ url('experiencias') }}">Ver mais experiências</a>
</div>
@endsection
