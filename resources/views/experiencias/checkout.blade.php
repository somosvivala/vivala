@extends('mobilelogado')

@section('content')
<div class="bg-checkout">
    <div class="popup-checkout">
        <span class="col-xs-12">
            <i class="fa fa-envelope round-icon-bg"></i>
        </span>
        <h1 class="negrito-exp col-xs-12">Você está quase lá!</h1>
        <small class="col-xs-12">Te enviaremos um email com todos os detalhes.</small>

        <span class="col-xs-12 margin-t-1">Para confirmar sua inscrição na experiência <b>Cão Feliz</b>, realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:</span>
        <div class="col-xs-12">
            <div class="dados-bancarios margin-t-1">
                <span class="row text-left negrito-exp col-xs-12">CONTA</span>
                <span class="row text-left negrito-exp col-xs-12">AGÊNCIA</span>
                <span class="row text-left negrito-exp col-xs-12">CNPJ</span>
                <span class="row text-left negrito-exp col-xs-12">BANCO DO BRASIL</span>
            </div>
        </div>
        <div class="col-xs-12 separador">
            <span>ou</span>
        </div>
        <span class="col-xs-12">Pague com boleto bancário:</span>
        <span class="col-xs-12 margin-t-1">
            <i class="fa fa-barcode sqr-icon-bg"></i>
        </span>
        <a href="/experiencias/{{ $Experiencia->id }}">
            <i class="fa fa-times x-preto"></i>
        </a>
    </div>
    <a class="btn-full-bottom" href="/experiencias">Ver mais experiências</a>
</div>
@endsection
