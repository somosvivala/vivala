<div class="col-md-12 col-lg-12 padding-b-2">
  <div class="row">
    <div id="detalhes-da-viagem" class="col-md-6 col-lg-6">
      <div class="row">
        <div class="col-md-4 col-lg-4">
          SVG LEGALZINHO DOS TICKETS COM SINAL DE OK
        </div>
        <div class="col-md-8 col-lg-8">
          <h3>Compra Finalizada com Sucesso!</h3>
        </div>
      </div>
      <div class="row">
        <h3>
          <span class="negrito">Obrigado</span> por comprar na <span class="negrito">Vivalá</span>!
        </h3>
      </div>
      <div class="row">
        <p>
          <span class="negrito">
          Caro cliente
          </span>
          , a sua compra de
          <span class="negrito">{!! trans('clickbus.clickbus_email-sigla-real') !!}</span>
          <span class="negrito">{{ $compra->total }}</span>

          com

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

          foi aprovada pelo nosso sistema.

        <p><i></i> Essa compra aparecerá na sua fatura com o nome:</p>
        <p class="texto-negrito">MERCADOPAGO*Vivala</p>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <p>Nós enviamos estas informações para o email cadastrado em sua compra!</p>
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
                <h2>Resumo do Pedido</h2>
              </th>
              <tr>
                <td>
                  <span>Localizador:</span>
                </td>
                <td>
                  Total de tickets:

                </td>
                <td>Total da compra:</td>
              </tr>
              <tr>
                <td><span>{{ $compra->localizer }}</span></td>
                <td><span>{{ $compra->quantidade_passagens }}</span></td>
                <td><span>{{ $compra->poltronas->count() }}</span></td>
              </tr>
            </table>
          </div>
          {{-- PRECISA FAZER IDA E VOLTA (SE TIVER)--}}
          {{--
          <!-- <div class="col-md-12 col-lg-12 text-center">
            <p>Detalhes:</p>
            <table>
              <tr>
                <td>
                  LOCAL DE PARTIDA -> LOCAL DE CHEGADA
                </td>
                <td>
                  DATA DA PARTIDA
                </td>
                <td>
                  <p>
                    POLTRONAS
                  </p>
                  <p>
                    16 (MARCEL RODRIGUES BIANCHI) [NUMERO DO DOCUMENTO]
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  R$VAL.OR DA PASSAGEM
                </td>
                <td>
                  HORARIO DE SAÍDA -> HORÁRIO DE CHEGADA
                </td>
              </tr>
            </table>
          </div> -->
          --}}
        </div>
      </div>
    </div>
    <div id="dicas-de-viagem" class="col-md-6 col-lg-6">
      <h1 class="margin-b-1">
        Agora você esta mais perto da sua <strong>viagem</strong>!
      </h1>
      <p class="margin-b-1">
        Algumas <span class="negrito">dicas</span> para você ficar mais tranquilo:
      </p>
      <table>
        <tr>
          <td>IMAGEM DO MAIL</td>
          <td>IMAGEM DO DOCUMENTO</td>
          <td>IMAGEM DO RELOGIO</td>
        </tr>
        <tr>
          <td>
            Você receberá os <span class="negrito">detalhes</span> da sua <span class="negrito">compra</span> por <span class="negrito">email</span>.
          </td>
          <td>
            Para retirar sua passagem você precisará <span class="negrito">apenas</span> do seu <span class="negrito">documento</span>!
          </td>
          <td>
            Chegue na rodoviária <span class="negrito">45 minutos</span> antes de sua viagem
          </td>.
        </tr>
      </table>
      <div>
        ALGUMA IMAGEM LEGALZINHA EM SVG
      </div>
      </div>
    </div>
  </div>
</div>
