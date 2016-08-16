@extends('viajar')

@section('content')
<div id="tour-pilares" class="pilar-viajar">

  {{--- Seção Quero Viajar - Foto de Capa --}}
    <div class="foto-fundo-bottom foto-header" style="background-image:url('/img/queroviajar.png');">
      <h2>{{ trans('global.wannatravel_title') }}</h2>
      <h3>{{ trans('global.wannatravel_subtitle') }}</h3>
      <div class="col-lg-12">
        <a class="suave padding-btn">{{ trans('global.lbl_how_it_works') }}</a>
      </div>
    </div>
  {{--- Fim da Seção Quero Viajar - Foto de Capa --}}

  {{--- Seção Quero Viajar - Miolo --}}
    <div class="col-lg-12 fundo-cheio tour-pilar-viajar-step2">
      <h3 class="text-center font-bold-upper">
        {{ trans('global.wannatravel_trip_already_know') }}
        <small class="sub-titulo">{{ trans('global.wannatravel_trip_setup') }}</small>
      </h3>
      <ul class="margin-t-2 margin-b-3 lista-border pesquisa-viajar">
        <div class="row row-eq-height">
          <li class="col-lg-3 tour-pilar-viajar-step3 active">
            <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_experiences') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step4">
            <a class="rodoviario logger-ativo" href="/viajar#rodoviario" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="rodoviario" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_bus_drive') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step5">
            <a class="ativa-modal-quimera logger-ativo" href="/viajar#quimera" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" data-url="https://www.e-agencias.com.br/vivala">
              {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step6">
            <a class="restaurantes logger-ativo" href="/viajar#restaurantes" data-tipo="abasviajar_tipo_restaurantes" data-desc="abasviajar_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="restaurantes" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_restaurants') }}
            </a>
          </li>
        </div>
      </ul>
      <div class="tab-content">
        <div id="experiencias" class="checkout-exp tab-pane text-center active" role="tabpanel">
          <span class="col-lg-12">
            <i class="fa fa-envelope round-icon-bg"></i>
          </span>
          <h1 class="col-lg-12">Você está quase lá!</h1>
            <span class="col-lg-12">Te enviaremos um email com todos os detalhes.</span>
            <span class="col-lg-12 margin-t-1 margin-b-2">Para confirmar sua inscrição na experiência <b>{{ $Experiencia->owner_nome }}</b>, realize o depósito de <b>R${{$Experiencia->preco}}</b> na conta a seguir:</span>
            <div class="col-lg-12">
              <div class="dados-bancarios">
                <span class="col-lg-12 margin-b-0-5 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_name') !!}: {{ env('VIVALA_FANTASY_NAME') }}</span>
                <span class="col-lg-12 margin-b-0-5 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_account') !!}: {{ env('VIVALA_CC') }}</span>
                <span class="col-lg-12 margin-b-0-5 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_agency') !!}: {{ env('VIVALA_AG') }}</span>
                <span class="col-lg-12 margin-b-0-5 text-left negrito-exp texto-maiusculo">CNPJ: {{ env('VIVALA_CNPJ') }}</span>
                <span class="col-lg-12 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_bank') !!}: {{ env('VIVALA_BANK') }}</span>
              </div>
            </div>
            <div class="col-lg-12 separador">
                <span>ou</span>
            </div>
            <span class="col-lg-12">Pague com boleto bancário:</span>
            <span class="col-lg-12 margin-t-1 margin-b-4">
                <button type="button" class="btn btn-lg btn-gerar-boleto" data-toggle="modal" data-target="#modal-experiencia-gerar-boleto" data-backdrop="static" data-keyboard="false">
                  <i class="fa fa-barcode"></i>
                  <span>Gerar<br>Boleto</span>
                </button>
            </span>
        </div>
        <div class="row text-center margin-t-1 margin-b-2">
            <a class="btn btn-acao" href="{{ url('experiencias') }}">Ver mais experiências</a>
        </div>
        <div role="tabpanel" class="tab-pane " id="rodoviario">
              <div class="lista-rodoviario"></div>
          </div>
        <div role="tabpanel" class="tab-pane " id="restaurantes">
            {{-- @include('chefsclub.buscarestaurantes') --}}
            {{-- @include('modals._listarestaurantes') --}}
          </div>

      </div>
    </div>
  {{--- Fim da Seção Quero Viajar - Miolo --}}

  {{-- Modal de fechamento de pedido das Experiências --}}
    @include('modals.experiencias.desktop._checkout')
  {{-- Fim da Modal --}}

</div>
@endsection
