<div id="sucesso-da-viagem" class="col-md-12 col-lg-12 padding-b-2">
  <div id="cabecalho" class="row padding-b-2 margin-b-1">
      <div class="col-md-12 col-lg-12">
        <div class="col-md-2 col-lg-2 text-center">
          <i class="fa fa-10x fa-check margin-t-0-25 margin-l-0-1"></i>
        </div>
        <div class="col-md-10 col-lg-10 text-center">
          <h1 class="texto-maiusculo ajuste-fonte-futura-bold">{!! trans('clickbus.clickbus_success-thanks-client') !!}</h1>
            @if($compra->payment_method === "payment.debitcard")
              {{-- DÉBITO --}}
                <p class="ajuste-fonte-avenir-light fa-1-5x">{!! trans('clickbus.clickbus_success-debit-method-text') !!}
                  <span class="texto-negrito texto-minusculo">
                    <strong class="fa-1-1x">
                      {!! trans('clickbus.clickbus_email-payment-method-debitcard') !!}
                    </strong>
                  </span>
                </p>
              <a href="{{ $compra->redirect_url }}" class="btn btn-acao btn-acao-sucesso" target="_blank">
                {{ trans('global.lbl_click_here') }}
              </a>
            @elseif($compra->payment_method === "payment.creditcard" || $compra->payment_method === "payment.creditcard.mercadopago")
              {{-- CRÉDITO --}}
                <p class="ajuste-fonte-avenir-light texto-sucesso">{!! trans('clickbus.clickbus_success-credit-method-text-1') !!}</p>
                <p class="ajuste-fonte-avenir-light texto-sucesso">{!! trans('clickbus.clickbus_success-credit-method-text-2') !!}</p>
            @else
              {{-- MÉTODO NÃO ENCONTRADO --}}
                <span class="texto-negrito texto-minusculo">
                  <strong>
                    {!! trans('clickbus.clickbus_email-payment-method-unavaiable') !!}
                  </strong>
                </span>
            @endif
        </div>
      </div>
  </div>

  <div id="corpo" class="row">
    <div id="detalhes-da-viagem" class="col-md-6 col-lg-6">
      <div class="row detalhes-da-viagem-1">
        <p class="padding-t-1 padding-l-1 padding-r-1">
          <span>
            {!! trans('clickbus.clickbus_success-your-bought') !!}
          </span>
          <span class="negrito">
            <strong>
              {!! trans('clickbus.clickbus_email-sigla-real') !!}
            </strong>
          </span>
          <span class="negrito">
            <strong>
              {{ number_format($compra->total, 2, '.', '') }}
            </strong>
          </span>
            {!! trans('clickbus.clickbus_success-with') !!}
          @if($compra->payment_method === "payment.debitcard")
            {{-- DÉBITO --}}
            <span class="texto-negrito texto-maiusculo">
              <strong>
                {!! trans('clickbus.clickbus_email-payment-method-debitcard') !!}
              </strong>
            </span>
            <span>{!! trans('clickbus.clickbus_success-approved-by-system') !!}</span>
          @elseif($compra->payment_method === "payment.creditcard" || $compra->payment_method === "payment.creditcard.mercadopago")
            {{-- CRÉDITO --}}
            <span class="texto-negrito texto-maiusculo">
              <strong>
                {!! trans('clickbus.clickbus_email-payment-method-creditcard') !!}
              </strong>
            </span>
            <span>{!! trans('clickbus.clickbus_success-approved-by-system') !!}</span>
            <div class="col-sm-2 col-md-2 col-lg-2 text-center">
              <i class="fa fa-3x fa-exclamation-circle"></i>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 text-center">
                <span>
                  {!! trans('clickbus.clickbus_success-invoice-bill') !!}
                </span>
                <p class="texto-negrito text-center">
                  {!! trans('clickbus.clickbus_success-mercadopago') !!}
                </p>
            </div>
          @else
            {{-- MÉTODO NÃO ENCONTRADO --}}
            <span class="texto-negrito texto-maiusculo">
              <strong>
                {!! trans('clickbus.clickbus_email-payment-method-unavaiable') !!}
              </strong>
            </span>
          @endif
        </p>
      </div>
      <div class="row detalhes-da-viagem-2">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <h3 class="text-center">
              {!! trans('clickbus.clickbus_success-order-details') !!}
            </h3>

            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <span>
                      {!! trans('clickbus.clickbus_success-buy-localizer') !!}
                    </span>
                  </td>
                  <td>
                    <span>
                      {!! trans('clickbus.clickbus_success-tickets-amount') !!}
                    </span>
                  </td>
                  <td>
                    <span>
                      {!! trans('clickbus.clickbus_success-order-total') !!}
                    </span>
                  </td>
                </tr>

                <tr class="active">
                  <td>
                    <span>
                      <strong>
                        {{ $compra->localizer }}
                      </strong>
                    </span>
                  </td>
                  <td>
                    <span>
                      <strong>
                        {{ $compra->poltronas->count() }}
                      </strong>
                    </span>
                  </td>
                  <td>
                    <span>
                      <strong>
                        {{ number_format($compra->total, 2, '.', '') }}
                      </strong>
                    </span>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div id="dicas-da-viagem" class="col-md-6 col-lg-6">
      <h3 class="margin-b-1 text-center ajuste-fonte-avenir-light fa-1-5x">
        {!! trans('clickbus.clickbus_success-next-to-end') !!}
      </h3>
      <hr class="dicas-de-viagem-divisor"/>

      <table class="tres-dicas-de-viagem">

        <tr>
          <td class="text-center padding-t-1 padding-b-1">
            <img src="{{ asset('/img/clickbus/icon_clickbus-envelope-view.svg') }}" height="50px" width="100%">
          </td>
          <td class="text-center padding-t-1 padding-b-1">
            <img src="{{ asset('/img/clickbus/icon_clickbus-documento-view.svg') }}" height="50px" width="100%">
          </td>
          <td class="text-center padding-t-1 padding-b-1">
            <img src="{{ asset('/img/clickbus/icon_clickbus-relogio-view.svg') }}" height="50px" width="100%">
          </td>
        </tr>

        <tr>
          <td class="text-center padding-b-1">
            <span>{!! trans('clickbus.clickbus_success-tip-1') !!}</span>
          </td>
          <td class="text-center padding-b-1">
            <span>{!! trans('clickbus.clickbus_success-tip-2') !!}</span>
          </td>
          <td class="text-center padding-b-1">
            <span>{!! trans('clickbus.clickbus_success-tip-3') !!}</span>
          </td>
        </tr>

      </table>

      <hr class="dicas-de-viagem-divisor"/>
      </div>
    </div>
  </div>
</div>
