<div class="col-md-12 col-lg-12 padding-b-2">
  <div class="row">
    <div id="detalhes-da-viagem" class="col-md-6 col-lg-6">
      <div class="row detalhes-da-viagem-1">
        <div class="col-md-3 col-lg-3">
          <img src="{{ asset('/img/clickbus/icon_clickbus-passagens-view.svg') }}" height="135px" width="100%">
        </div>
        <div class="col-md-9 col-lg-9">
          <h3 class="text-center padding-t-1">
            {!! trans('clickbus.clickbus_success-buy-done') !!}
          </h3>
        </div>
      </div>
      <div class="row detalhes-da-viagem-2">
        <h3 class="text-center">
          {!! trans('clickbus.clickbus_success-thanks-for-vivala') !!}
        </h3>
      </div>
      <div class="row detalhes-da-viagem-3">
        <p class="padding-t-1 padding-l-1 padding-r-1">
          <span>
            {!! trans('clickbus.clickbus_success-dear-client') !!}
          </span>
          <span class="negrito">
            {!! trans('clickbus.clickbus_email-sigla-real') !!}
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

          @elseif($compra->payment_method === "payment.creditcard" || $compra->payment_method === "payment.creditcard.mercadopago")
            {{-- CRÉDITO --}}
            <span class="texto-negrito texto-maiusculo">
              <strong>
                {!! trans('clickbus.clickbus_email-payment-method-creditcard') !!}
              </strong>
            </span>
          @else
            {{-- MÉTODO NÃO ENCONTRADO --}}
            <span class="texto-negrito texto-maiusculo">
              <strong>
                {!! trans('clickbus.clickbus_email-payment-method-unavaiable') !!}
              </strong>
            </span>
          @endif
            {!! trans('clickbus.clickbus_success-approved-by-system') !!}
        </p>
        <p class="padding-l-1 padding-r-1">
          <i class="fa fa-3x fa-exclamation-circle"></i>
          <span>
            {!! trans('clickbus.clickbus_success-invoice-bill') !!}
          </span>
        </p>
        <p class="texto-negrito text-center">
          {!! trans('clickbus.clickbus_success-mercadopago') !!}
        </p>
      </div>
      <div class="row detalhes-da-viagem-4">
        <div class="col-md-12 col-lg-12 padding-t-1">
          <h4>{!! trans('clickbus.clickbus_success-we-sent-infos') !!}</h4>
        </div>
        {{-- Input de enviar emails pra outras pessoas sobre a COMPRA --}}
        {{--
        <!--div class="col-md-12 col-lg-12">
          <input type="hidden">
        </div-->
        --}}
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
      <h1 class="margin-b-1">
        {!! trans('clickbus.clickbus_success-next-to-end') !!}
      </h1>
      <p class="margin-b-1 text-center">
        {!! trans('clickbus.clickbus_success-some-tips-to-you') !!}
      </p>
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
      <div>
        <img src="{{ asset('/img/dummy.jpg') }}" height="25%" width="100%">
      </div>
      </div>
    </div>
  </div>
</div>
