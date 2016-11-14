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
          <li class="col-lg-3 tour-pilar-viajar-step3">
            <a class="rodoviario logger-ativo" href="/viajar#rodoviario" data-tipo="abasviajar_tipo_onibus" data-desc="abasviajar_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" aria-controls="rodoviario" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_bus_drive') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step4">
            <a class="ativa-modal-quimera logger-ativo" href="/viajar#quimera" data-tipo="abasviajar_tipo_quimera" data-desc="abasviajar_desc_quimera" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" data-url="https://www.e-agencias.com.br/vivala">
              {{ trans('global.wannatravel_trip_hotels_flights_packs') }}
            </a>
          </li>
          <li class="col-lg-3 tour-pilar-viajar-step5 active">
            <a class="experiencias" href="#experiencias" aria-controls="experiencias" role="tab" data-toggle="tab">
              {{ trans('global.wannatravel_trip_experiences') }}
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
        {{-- Tab de RODOVIÁRIO --}}
          <div role="tabpanel" class="tab-pane " id="rodoviario">
                <div class="lista-rodoviario"></div>
          </div>
        {{-- Fim da Tab de RODOVIÁRIO --}}

        {{-- Tab de EXPERIÊNCIAS --}}
          <div role="tabpanel" id="experiencias" class="checkout-exp tab-pane text-center active">
            {{-- Seção de DEPÓSITO --}}
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="ajuste-fonte-futura-bold amarelo-aviso texto-titulo-checkout">
                    Você está quase lá!
                  </h1>
                </div>
                <div class="col-lg-12">
                  <span class="fa-stack fa-checkout-stack">
                    <i class="fa fa-circle fa-stack-2x amarelo-aviso fa-checkout-borda"></i>
                    <i class="fa fa-envelope fa-stack-1x fa-inverse fa-checkout-icone"></i>
                  </span>
                </div>
                <div class="col-lg-12 text-center margin-t-2 margin-b-2">
                  <p class="margin-b-1 ajuste-fonte-avenir-roman amarelo-aviso texto-subtitulo-checkout">
                    Te enviaremos um email com todos os detalhes.
                  </p>
                  <hr class=" divisor-amarelo">
                </div>
                <div class="col-lg-12 text-center margint-t-3 margin-b-1">
                  <p class="ajuste-fonte-avenir-roman texto-descricao-checkout">
                    Para confirmar sua inscrição na experiência <b>{{ mb_strtoupper(trim($Experiencia->nome)) }}</b>
                    <br/>
                    oferecida pela instituição <b>{{ mb_strtoupper(trim($Experiencia->owner_nome)) }}</b>, realize o depósito
                    <br>
                    de <b>R${{$Experiencia->preco}}</b> na conta a seguir:
                  </p>
                </div>
                <div class="col-lg-12">
                  <div class="dados-bancarios">
                    <span class="col-lg-12 margin-b-1 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_name') !!}: {{ env('VIVALA_FANTASY_NAME') }}</span>
                    <span class="col-lg-12 margin-b-1 text-left negrito-exp texto-maiusculo">CNPJ: {{ env('VIVALA_CNPJ') }}</span>
                    <span class="col-lg-12 margin-b-1 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_bank') !!}: {{ env('VIVALA_BANK') }}</span>
                    <span class="col-lg-12 margin-b-1 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_agency') !!}: {{ env('VIVALA_AG') }}</span>
                    <span class="col-lg-12 margin-b-0 text-left negrito-exp texto-maiusculo">{!! trans('global.lbl_account') !!}: {{ env('VIVALA_CC') }}</span>
                  </div>
                </div>
              </div>
            {{-- Fim da Seção de DEPÓSITO --}}

            {{-- Secao de GERAÇÃO DE BOLETO - só aparece se existe tempo habil para validar o pagamento --}}
            @if ($Inscricao->temTempoValidoParaCriarBoleto)
              <div class="row margin-t-0-5">
                <div class="col-lg-12 text-center">
                    <span class="ajuste-fonte-avenir-roman texto-descricao-checkout">ou</span>
                </div>
                <div class="col-lg-12 text-center">
                  <p class="ajuste-fonte-avenir-roman texto-descricao-checkout">
                    Pague com boleto bancário:
                  </p>
                </div>
                <div class="col-lg-12 text-center">
                  <button type="button" class="btn btn-lg btn-gerar-boleto" data-toggle="modal" data-target="#modal-experiencia-gerar-boleto" data-backdrop="static" data-keyboard="false">
                    <i class="fa fa-barcode"></i>
                    <span>Gerar<br>Boleto</span>
                  </button>
                </div>
              </div>
            @endif
            {{-- Fim da Secao de GERAÇÃO DE BOLETO --}}

            {{-- Seção VOLTAR PARA AS EXPERIÊNCIAS --}}
              <div class="row margin-t-4 margin-b-3">
                <div class="col-lg-12 text-center">
                  <a class="btn btn-acao" href="{{ url('experiencias') }}">Ver mais experiências</a>
                </div>
              </div>
            {{-- Fim da Seção VOLTAR PARA AS EXPERIÊNCIAS --}}
          </div>
        {{-- Fim da Tab de EXPERIÊNCIAS --}}

        {{-- Tab de RESTAURANTES --}}
          <div role="tabpanel" class="tab-pane " id="restaurantes">
              {{-- @include('chefsclub.buscarestaurantes') --}}
              {{-- @include('modals._listarestaurantes') --}}
          </div>
        {{-- Fim da Tab de RESTAURANTES --}}
      </div>
    </div>
  {{--- Fim da Seção Quero Viajar - Miolo --}}

  {{-- Modal de fechamento de pedido das Experiências --}}
    @include('modals.experiencias.desktop._checkout')
  {{-- Fim da Modal --}}

</div>
@endsection
