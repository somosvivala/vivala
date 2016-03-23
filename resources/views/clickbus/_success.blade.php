<div class="col-md-12 col-lg-12 padding-b-2">
  <div class="row">
    <div id="detalhes-da-viagem" class="col-md-6 col-lg-6">
      <div class="row">
        <div class="col-md-4 col-lg-4">
          <img src="{{ asset('/img/clickbus/icon_clickbus-passagens-view.svg') }}" height="110px" width="100%">
        </div>
        <div class="col-md-8 col-lg-8">
          <h3>{!! trans('clickbus.clickbus_success-buy-done') !!}</h3>
        </div>
      </div>
      <div class="row">
        <h3>
          {!! trans('clickbus.clickbus_success-thanks-for-vivala') !!}
        </h3>
      </div>
      <div class="row">
        <p>
          <span>
            {!! trans('clickbus.clickbus_success-dear-client') !!}
          </span>
          <span class="negrito">
            {!! trans('clickbus.clickbus_email-sigla-real') !!}
          </span>
          <span class="negrito">
            {{ $compra->total }}
          </span>
            {!! trans('clickbus.clickbus_success-with') !!}
          @if($compra->payment_method === "payment.debitcard")
            {{-- DÉBITO --}}
            <span class="texto-negrito texto-maiusculo">
              {!! trans('clickbus.clickbus_email-payment-method-debitcard') !!}
            </span>

          @elseif($compra->payment_method === "payment.creditcard")
            {{-- CRÉDITO --}}
            <span class="texto-negrito texto-maiusculo">
              {!! trans('clickbus.clickbus_email-payment-method-creditcard') !!}
            </span>
          @else
            {{-- MÉTODO NÃO ENCONTRADO --}}
            <span class="texto-negrito texto-maiusculo">
              {!! trans('clickbus.clickbus_email-payment-method-unavaiable') !!}
            </span>
          @endif
            {!! trans('clickbus.clickbus_success-approved-by-system') !!}

        <p><i class="fa fa-3x fa-exclamation-circle"></i> {!! trans('clickbus.clickbus_success-invoice-bill') !!}</p>
        <p class="texto-negrito">{!! trans('clickbus.clickbus_success-mercadopago') !!}</p>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <p>{!! trans('clickbus.clickbus_success-we-sent-infos') !!}</p>
        </div>
        {{-- Input de enviar emails pra outras pessoas sobre a COMPRA --}}
        {{--
        <!--div class="col-md-12 col-lg-12">

          <input type="hidden">
        </div-->
        --}}
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <table>
              <th class="text-center">
                <h2>{!! trans('clickbus.clickbus_success-order-details') !!}</h2>
              </th>

              <tr>
                <td>
                  <span>{!! trans('clickbus.clickbus_success-buy-localizer') !!}</span>
                </td>
                <td>
                  <span>{!! trans('clickbus.clickbus_success-tickets-amount') !!}</span>
                </td>
                <td>
                  <span>{!! trans('clickbus.clickbus_success-order-total') !!}</span>
                </td>
              </tr>

              <tr>
                <td>
                  <span>{{ $compra->localizer }}</span>
                </td>
                <td>
                  <span>{{ $compra->poltronas->count() }}</span>
                </td>
                <td>
                  <span>{{ $compra->total }}</span>
                </td>

              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="dicas-de-viagem" class="col-md-6 col-lg-6">
      <h1 class="margin-b-1">
        {!! trans('clickbus.clickbus_success-next-to-end') !!}
      </h1>
      <p class="margin-b-1">
        {!! trans('clickbus.clickbus_success-some-tips-to-you') !!}
      </p>
      <table>
        <tr>
          <td>
            <img src="{{ asset('/img/clickbus/icon_clickbus-envelope-view.svg') }}" height="50px" width="100%">
          </td>
          <td>
            <img src="{{ asset('/img/clickbus/icon_clickbus-documento-view.svg') }}" height="50px" width="100%">
          </td>
          <td>
            <img src="{{ asset('/img/clickbus/icon_clickbus-relogio-view.svg') }}" height="50px" width="100%">
          </td>
        </tr>
        <tr>
          <td>
            <span>{!! trans('clickbus.clickbus_success-tip-1') !!}</span>
          </td>
          <td>
            <span>{!! trans('clickbus.clickbus_success-tip-2') !!}</span>
          </td>
          <td>
            <span>{!! trans('clickbus.clickbus_success-tip-3') !!}</span>
          </td>.
        </tr>
      </table>
      <div>
        {{-- ALGUMA IMAGEM LEGALZINHA EM SVG --}}
      </div>
      </div>
    </div>
  </div>
</div>
