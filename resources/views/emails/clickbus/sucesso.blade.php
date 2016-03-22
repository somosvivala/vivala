<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-micros oft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
      <!--[if gte mso 15]>
      <xml>
      <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
      <meta content="text/html">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial -scale=1">
  </head>
  <body>
    <div>
      <table style="border-radius:15px" cellpadding="0" cellspacing="0" width="100%">
        <tbody>

          <tr>
            <td>

              {{-- CABEÇALHO DO EMAIL --}}
              <table style="border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600">
                <tbody>

                  {{-- Parceria Vivalá/ClickBus --}}
                  <tr>
                    <td bgcolor="#ffffff">
                      <table cellspacing="0" border="0" width="100%">
                        <tbody>
                          <tr>
                            <td style="border-top-left-radius:15px;border-top-right-radius:15px" bgcolor="#ffffff">
                              <table style="border-radius:15px" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="padding:0px 0px 5px 40px" align="left" width="35%">
                                      <a href="https://vivala.com.br" target="_blank">
                                        <img src="https://vivala.com.br/logo.png" alt="Vivalá" style="display:block" border="0" width="115px" height="63px">
                                      </a>
                                    </td>

                                    <td style="padding:0px 0px 0px 0px;color:#000000;font-family:'Roboto',sans-serif;font-weight:300;font-size:20px;font-weight:500;text-align:center" align="right">
                                      {!! trans('clickbus.clickbus_email-partnership') !!}
                                    </td>

                                    <td style="padding:0px 50px 0px 0px;color:#757579" align="right" width="35%">
                                      <img src="https://s3-sa-east-1.amazonaws.com/static2.clickbus.com.br/EmailTransational/logo-transicional-clickbus.png" alt="ClickBus" style="display:block" border="0" height="42" width="105">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>

                  {{-- Boas vindas ao comprador --}}
                  <tr>
                    <td style="text-align:center;padding-left:15px;padding-right:15px;background:#FF3B10;background:-moz-linear-gradient(top,#FF3B10 0%,#FF5B00 100%);background:-webkit-linear-gradient(top,#FF3B10 0%,#FF5B00 100%);background:-o-linear-gradient(top,#FF3B10 0%,#FF5B00 100%);background:-ms-linear-gradient(top,#FF3B10 0%,#FF5B00 100%);background:linear-gradient(to bottom,#FF3B10 0%,#FF5B00 100%)" align="center">
                      <p style="padding-top:15px;color:#fff;font-weight:100;font-family:Arial;font-size:29px;padding-left:20px;padding-right:20px;line-height:38px">
                        {!! trans('clickbus.clickbus_email-thanks-for-buying') !!}
                        <span style="font-weight:600">{!! trans('clickbus.clickbus_email-vivala-title') !!}!</span>
                      </p>
                      <img src="https://vivala.com.br/img/clickbus/icon_clickbus-status-concluido.png" alt="{{ trans('clickbus.clickbus_email-status-success') }}" style="display:block; margin: 0 auto; padding:0" border="0" height="45%" width="45%">
                      <p style="font-size:16px;color:#fff;font-weight:100;font-family:Arial;padding-bottom:15px">
                        {!! trans('clickbus.clickbus_email-dear-client') !!}
                        <span style="font-weight:600">
                          {{-- NOME DO USUARIO --}}
                          {{ trim(ucfirst($Compra->buyer_firstname)) }}
                        </span>
                        {!! trans('clickbus.clickbus_email-buy-fulfilled') !!}</p>
                    </td>
                  </tr>

                </tbody>
              </table>

              {{-- Espaço --}}
              <table align="center" height="5px" width="600px">
                <tbody>
                  <tr>
                    <td style="font-size:20px;color:#ffffff" height="5px">
                      -
                    </td>
                  </tr>
                </tbody>
              </table>

              <table style="border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600px">
                <tbody>
                  {{-- DETALHES DA VIAGEM - Título --}}
                  <tr id="detalhes-da-viagem">
                    <td style="color:#fff;background:#FF5B00;height:35px;padding:10px 0px 5px 0px;font-family:Arial;font-size:19px" align="center">
                     {!! trans('clickbus.clickbus_email-trip-details') !!}
                    </td>
                  </tr>
                </tbody>
              </table>

              {{-- DETALHES DA VIAGEM - Infos --}}
              @foreach($Compra->poltronas as $indice => $poltrona)
              <table style="border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600px">
                <tbody>

                  <tr>
                    <td style="background:#efefef;border:1px solid #000">
                      <table align="center" width="100%">
                        <tbody>

                          {{-- VIAÇÃO / LOCALIZADOR / NÚMERO DA PASSAGEM - Títulos --}}
                          <tr>
                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial" width="30%">
                              {!! trans('clickbus.clickbus_email-road-company') !!}
                            </td>

                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial" width="35%">
                              {!! trans('clickbus.clickbus_email-locator') !!}
                            </td>

                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial" width="35%">
                              {!! trans('clickbus.clickbus_email-ticket') !!}
                            </td>
                          </tr>

                          <tr>

                            {{-- NOME DA VIAÇÃO --}}
                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial;font-weight:bold;border-right:1px solid #000;padding:0px 5px 0px 5px" width="30%">
                              {{ ucfirst($poltrona->viacao->nome) }}
                            </td>

                            {{-- LOCALIZADOR --}}
                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial;font-weight:bold;border-right:1px solid #000;padding:0px 5px 0px 5px" width="30%">
                              {{ strtoupper($poltrona->localizer) }}
                            </td>

                            {{-- NUMERO DO TICKET dentro do laço de ida/volta --}}
                            <td style="font-size:18px;text-align:center;margin-bottom:0;font-family:Arial;font-weight:bold;padding:0px 5px 0px 5px" width="30%">
                              {{ $indice+1 }}
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td style="border-bottom:solid thin #aaaaaa" bgcolor="#fff">
                      <table style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;border-bottom:solid thin #999999;border-left:solid thin #999999;border-top:solid thin #999999;border-right:solid thin #999999;font-family:'Arial',sans-serif;font-weight:300;font-size:16px;color:#000" cellpadding="5px" cellspacing="0" align="center" bgcolor="#F4F4F4" width="90%">
                        <tbody>

                          {{-- NOME DO PASSAGEIRO --}}
                          <tr id="nome-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-passenger-name') !!}
                            </td>
                            <td style="text-align:right;padding-right:10px;font-size:12px">
                              {{ ucfirst($poltrona->passenger_name) }}
                            </td>
                          </tr>

                          {{-- NUMERO DO DOCUMENTO --}}
                          <tr id="documento-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-document') !!}
                            </td>
                            <td style="text-align:right;padding-right:10px;font-size:12px">
                              {{ strtoupper($poltrona->passenger_document_number) }}
                            </td>
                          </tr>

                          {{-- LUGAR DE PARTIDA - LUGAR DA CHEGADA --}}
                          <tr id="rota-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-route') !!}
                            </td>
                            <td style="text-align:right;padding-right:10px;font-size:12px;color:#000">
                              {{ ucfirst($poltrona->embarque->place_name) }} - {{ ucfirst($poltrona->desembarque->place_name) }}
                            </td>
                          </tr>

                          {{-- NUMERO DA POLTRONA --}}
                          <tr id="poltrona-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-seat') !!}
                            </td>
                            <td style="text-align:right;padding-right:10px;font-size:12px">
                              {{ $poltrona->seat_number }}
                            </td>
                          </tr>

                          {{-- DATAS E HORARIOS --}}
                          <tr id="data-horario-ida-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">

                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-boarding') !!}
                            </td>

                            <td style="text-align:right;padding-right:10px;font-size:12px;color:#000">
                              <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-calendario.png" alt="{{ trans('global.date_date') }}" style="display:inline" height="14" width="13">
                              {{-- DATA/DA/PARTIDA (DD/MM/AAAA) usar format('d-m-Y') --}}
                              &nbsp; {{ $poltrona->dataEmbarque }}
                              -
                              <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-relogio.png" alt="{{ trans('global.date_hour') }}" style="display:inline" border="0" height="14" width="14">
                              {{-- HORA usar format('H:i') --}}
                              &nbsp; {{ $poltrona->horaEmbarque }}
                            </td>

                          </tr>

                          <tr id="data-horario-volta-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">

                            <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                              {!! trans('clickbus.clickbus_email-arrival') !!}
                            </td>

                            <td style="text-align:right;padding-right:10px;font-size:12px">
                              <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-calendario.png" alt="{{ trans('global.date_date') }}" style="display:inline" height="14" width="13">
                              {{-- DATA/DA/PARTIDA (DD/MM/AAAA) usar format('d-m-Y') --}}
                              &nbsp; {{ $poltrona->dataDesembarque }}
                              -
                              <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-relogio.png" alt="{{ trans('global.date_hour') }}" style="display:inline" border="0" height="14" width="14">
                              {{-- HORA usar format('H:i') --}}
                              &nbsp; {{ $poltrona->horaDesembarque }}
                            </td>

                          </tr>

                        </tbody>
                      </table>
                      <br>
                    </td>
                  </tr>

                </tbody>
              </table>
              @endforeach
              <br/>

            </td>
          </tr>

        </tbody>
      </table>

      {{-- Espaço --}}
      <table align="center" height="5px" width="600px">
        <tbody>
          <tr>
            <td style="font-size:25px;color:#ffffff" height="5px">
              -
            </td>
          </tr>
        </tbody>
      </table>

      <table style="border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600px">
        <tbody>

          {{-- DETALHES DO PAGAMENTO --}}
          <tr id="detalhes-do-pagamento">
            <td style="color:#fff;background:#FF5B00;height:35px;padding:10px 0px 5px 0px;font-family:Arial;font-size:19px" align="center">
             {!! trans('clickbus.clickbus_email-payment-details') !!}
            </td>
          </tr>

          <tr>
            <td bgcolor="#fff">
              <table style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;border-bottom:solid thin #999999;border-left:solid thin #999999;border-right:solid thin #999999;border-top:solid thin #999999;font-family:'Arial',sans-serif;font-weight:300;font-size:16px;color:#000" cellpadding="5px" cellspacing="0" align="center" bgcolor="#F4F4F4" width="90%">
                <tbody>

                  {{-- NOME DO DONO DO CARTÃO --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-responsible') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px;color:#000">
                      {{ ucfirst($Compra->buyer_firstname) }} {{ ucfirst($Compra->buyer_lastname) }}
                    </td>
                  </tr>

                  {{-- TOTAL DE PASSAGENS --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-tickets-ammount') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px;color:#000">
                      {{ count($Compra->poltronas) }}
                    </td>
                  </tr>

                  {{-- VALOR DO TOTAL DO DESCONTO --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-discount-fee') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px">
                      {!! trans('clickbus.clickbus_email-sigla-real') !!}
                      {{ $Compra->desconto_total }}

                    </td>
                  </tr>

                  {{-- VALOR DA TAXA DE CONVENIÊNCIA --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-convenience-fee') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px">
                      {!! trans('clickbus.clickbus_email-sigla-real') !!}
                      {{ $Compra->taxas }}
                    </td>
                  </tr>

                  {{-- VALOR TOTAL DA COMPRA --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-total-payment') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px">
                      {!! trans('clickbus.clickbus_email-sigla-real') !!}
                      {{ $Compra->total }}
                    </td>
                  </tr>

                  {{-- MÉTODO DE PAGAMENTO --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-type-of-payment') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px">
                      @if($Compra->payment_method === "payment.debitcard")
                        {{-- DÉBITO --}}
                        {!! trans('clickbus.clickbus_email-payment-method-debitcard') !!}

                      @elseif($Compra->payment_method === "payment.creditcard")
                        {{-- CRÉDITO --}}
                        {!! trans('clickbus.clickbus_email-payment-method-creditcard') !!}

                      @else
                        {{-- MÉTODO NÃO ENCONTRADO --}}
                        {!! trans('clickbus.clickbus_email-payment-method-unavaiable') !!}

                      @endif
                    </td>
                  </tr>

                  {{-- DATA/DO/PAGAMENTO (DD/MM/AAAA) --}}
                  <tr style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                    <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                      {!! trans('clickbus.clickbus_email-date-of-payment') !!}
                    </td>
                    <td style="text-align:right;padding-right:10px;font-size:12px">
                      {{-- PEGAR PELO TIMESTAMP (???) --}}
                    </td>
                  </tr>

                </tbody>
              </table>
            </td>
          </tr>

          {{-- NUMERO DO PEDIDO NA CLICKBUS (alinhar com os caras, acho que isso não se manterá na versão final, ver se a API retorna este numero) --}}
          <tr>
            <td>
              <p style="font-size:14px;font-family:Arial" align="center">
                {!! trans('clickbus.clickbus_email-request-number') !!}
                <span style="font-weight:800!important;font-color:#FF3B10!important">{{ $Compra->localizer }}</span>.
                <br/>
              </p>
            </td>
          </tr>

          {{-- SEÇÃO DE DÚVIDAS --}}
          <tr>
            <td style="border-bottom:solid thin #999999;border-top:solid thin #999999">
              <table style="font-family:'Arial',sans-serif;font-weight:300;font-size:16px;padding:10px 0px 0px 0px" cellpadding="5px" cellspacing="0" align="center" bgcolor="#ffffff" width="98%">
                <tbody>
                  <tr style="text-align:center">

                    <td style="border-right:solid thin #999999;font-weight:400" width="30%">
                      {!! trans('clickbus.clickbus_email-faq-dont-delay') !!}
                    </td>

                    <td style="border-right:solid thin #999999;font-weight:400" width="40%">
                      {!! trans('clickbus.clickbus_email-faq-take-ticket') !!}
                    </td>

                    <td style="font-weight:400" width="30%">
                      {!! trans('clickbus.clickbus_email-faq-need-to-print') !!}
                    </td>
                  </tr>

                  <tr style="text-align:center">
                    <td style="border-right:solid thin #999999">
                      <img style="width: 100px; height:100px;" src="https://vivala.com.br/img/clickbus/icon_clickbus-calendario.png">
                    </td>

                    <td style="border-right:solid thin #999999">
                      <img style="width: 100px; height:100px;" src="https://vivala.com.br/img/clickbus/icon_clickbus-passagem.png">
                      <br/>
                    </td>

                    <td>
                      <img style="width: 100px; height:100px;" src="https://vivala.com.br/img/clickbus/icon_clickbus-impressora.png"><br/>
                    </td>
                  </tr>

                  <tr style="font-family:'Arial',sans-serif;font-weight:300;font-size:12px;text-align:justify">
                    <td style="padding:10px 10px 10px 10px;border-right:solid thin #999999">
                      {!! trans('clickbus.clickbus_email-faq-text1') !!}
                    </td>

                    <td style="padding:10px 10px 10px 10px;border-right:solid thin #999999">
                      {!! trans('clickbus.clickbus_email-faq-text2') !!}
                    </td>

                    <td style="padding:10px 10px 10px 10px">
                      {!! trans('clickbus.clickbus_email-faq-text3') !!}
                    </td>
                  </tr>

                </tbody>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <p style="font-size:14px;font-family:Arial" align="center">
                {!! trans('clickbus.clickbus_email-faq-call') !!}
              </p>
            </td>
          </tr>

          {{-- RODAPÉ COPYRIGHTS VIVALÁ --}}
          <tr>
            <td align="center">
              <table style="border-bottom:1px solid #ddd;padding-top:5px;padding-bottom:5px;font-size:12px;font-family:Arial" align="center" width="90%">
                <tbody>
                  <tr>
                    <td align="center">
                      <span style="color: #F16F2B;font-weight: 800;">
                      {!! trans('clickbus.clickbus_email-vivala-title')!!}</span>
                       -
                      {!! trans('clickbus.clickbus_email-vivala-address') !!}.
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>

          <tr>
            <td style="padding:0px 0px 0px 0px" align="center">
              <table>
                <tr>
                  <td align="center"><span style="font-size:10px;font-family:Arial">
                    {!! trans('clickbus.clickbus_email-copyright-footer1') !!}
                  </span></td>
                  <td align="center"><img src="https://vivala.com.br/logo.png" alt="Vivalá" style="display:block;padding:0px 0px 0px 0px" height="20" width="35"></td>
                  <td align="center"><span style="font-size:10px;font-family:Arial">
                    {!! trans('clickbus.clickbus_email-copyright-footer2') !!}
                  </span></td>
                </tr>
              </table>
            </td>
          </tr>

        </tbody>
      </table>

      {{-- RODAPÉ DE INFOS DE TRANSFERÊNCIA --}}
      <table cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600">
        <tbody>
          <tr>
            <td style="padding:10px 10px 10px 10px;text-align:justify;font-family:'Arial',sans-serif;font-weight:400;font-size:12px">
              {!! trans('clickbus.clickbus_email-faq-warning') !!}
            </td>
          </tr>

          <tr>
            <td style="padding:10px 10px 10px 10px;text-align:justify;font-family:'Arial',sans-serif;font-weight:400;font-size:12px">
              {!! trans('clickbus.clickbus_email-faq-warning-extended') !!}
            </td>
          </tr>

          <tr>
            <td style="padding:10px 5px 5px 5px;text-align:center;font-family:'Arial',sans-serif;font-weight:400;font-size:14px">
              {!! trans('clickbus.clickbus_email-rules-transfer-cancel') !!}
            </td>
          </tr>
          <tr>
            <td style="padding:10px 10px 10px 10px;text-align:justify;font-family:'Arial',sans-serif;font-weight:400;font-size:12px">
              {!! trans('clickbus.clickbus_email-rules-text1') !!}
            <br/><br/>
              {!! trans('clickbus.clickbus_email-rules-text2') !!}
            <br/><br/>
              {!! trans('clickbus.clickbus_email-rules-text3') !!}
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </body>
</html>
