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
    <table style="border-radius:15px" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td>
            <table style="border-radius:15px;border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600">
              <tbody>

                {{-- CABEÇALHO DO EMAIL --}}
                <tr>
                  <td bgcolor="#ffffff">
                    <table cellspacing="0" border="0" width="100%">
                      <tbody>

                        {{-- Parceria Vivalá/ClickBus --}}
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


                <tr>
                  <td style="border-top:solid thin #aaa;border-bottom:solid thin #aaa" bgcolor="#FF762E">
                    <table style="padding:10px 40px 10px 40px" cellpadding="10" cellspacing="0" width="100%">
                      <tbody>

                        {{-- Boas vindas ao comprador --}}
                        <tr>
                          <td style="padding:10px 0px 5px 0px;color:#FFF;font-family:'Roboto',sans-serif;font-weight:400;font-size:26px;border-top:solid thin #282828;border-bottom:solid thin #282828" align="center">
                            {!! trans('clickbus.clickbus_email-payment-analyze') !!}
                            <br/>
                            <img src="https://vivala.com.br/img/clickbus/icon_clickbus-status-pendente.png" alt="{{ trans('clickbus.clickbus_email-status-pending') }}" style="display:block;padding:10px 0px 10px 0px; margin: 0 auto;" border="0" height="227px" width="227px">
                            <p style="font-weight:300;font-size:15px">
                              {!! trans('clickbus.clickbus_email-dear-client') !!}
                              <span style="font-weight:800">
                                {{-- NOME DO USUARIO --}}
                                {{ ucfirst($Compra->buyer_firstname) }}
                              </span>
                              {!! trans('clickbus.clickbus_email-payment-pending') !!}.
                            </p>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </td>
                </tr>

                {{-- DETALHES DA VIAGEM - Fazer Laço Ida e Volta --}}
                @foreach($Compra->poltronas as $indice=>$poltronas)
                <table style="border:solid thin #999999" cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600px">
                  <tbody>
                    <tr>
                      <td bgcolor="#fff">
                        <table style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;border-bottom:solid thin #999999;border-left:solid thin #999999;border-top:solid thin #999999;border-right:solid thin #999999;font-family:'Arial',sans-serif;font-weight:300;font-size:16px;color:#000" cellpadding="5px" cellspacing="0" align="center" bgcolor="#F4F4F4" width="90%">
                          <tbody>

                            {{-- NOME DO PASSAGEIRO --}}
                            <tr id="nome-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                              <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                                {!! trans('clickbus.clickbus_email-dear-client') !!}
                              </td>
                              <td style="text-align:right;padding-right:10px;font-size:12px">
                                {{ ucfirst($poltronas->passenger_name) }}
                              </td>
                            </tr>

                            {{-- NUMERO DO DOCUMENTO --}}
                            <tr id="documento-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                              <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                                {!! trans('clickbus.clickbus_email-document') !!}
                              </td>
                              <td style="text-align:right;padding-right:10px;font-size:12px">
                                {{ strtoupper($poltronas->passenger_document_number) }}
                              </td>
                            </tr>

                            {{-- LUGAR DE PARTIDA - LUGAR DA CHEGADA --}}
                            <tr id="rota-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                              <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                                {!! trans('clickbus.clickbus_email-route') !!}
                              </td>
                              <td style="text-align:right;padding-right:10px;font-size:12px;color:#000">
                                {{ ucfirst($poltronas->embarque->place_name) }} - {{ ucfirst($poltronas->desembarque->place_name) }}
                              </td>
                            </tr>

                            {{-- NUMERO DA POLTRONA --}}
                            <tr id="poltrona-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">
                              <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                                {!! trans('clickbus.clickbus_email-seat') !!}
                              </td>
                              <td style="text-align:right;padding-right:10px;font-size:12px">
                                {{ $poltronas->seat_number }}
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
                                &nbsp; $poltronas->departure_time
                                -
                                <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-relogio.png" alt="{{ trans('global.date_hour') }}" style="display:inline" border="0" height="14" width="14">
                                {{-- HORA usar format('H:i') --}}
                                &nbsp; $poltronas->departure_time
                              </td>

                            </tr>

                            <tr id="data-horario-volta-passageiro" style="height:35px;font-size:14px;font-weight:100" bgcolor="#F4F4F4">

                              <td style="text-align:left;padding-left:10px;color:#000;font-family:Arial">
                                {!! trans('clickbus.clickbus_email-arrival') !!}
                              </td>

                              <td style="text-align:right;padding-right:10px;font-size:12px">

                                <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-calendario.png" alt="{{ trans('global.date_date') }}" style="display:inline" height="14" width="13">
                                {{-- DATA/DA/PARTIDA (DD/MM/AAAA) usar format('d-m-Y') --}}
                                &nbsp; $poltronas->arrival_time
                                -
                                <img src="https://vivala.com.br/img/clickbus/small_icon_clickbus-relogio.png" alt="{{ trans('global.date_hour') }}" style="display:inline" border="0" height="14" width="14">
                                {{-- HORA usar format('H:i') --}}
                                &nbsp; $poltronas->arrival_time
                              </td>

                            </tr>

                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br/>
                @endforeach

                <tr id="transferencias-cancelamentos">
                  <td style="border-bottom:solid thin #999999;border-top:solid thin #999999">
                    <table style="font-family:'Roboto',sans-serif;font-weight:300;font-size:16px;padding:10px 0px 0px 0px" cellpadding="5px" cellspacing="0" align="center" bgcolor="#ffffff" width="95%">
                      <tbody>
                        <tr style="text-align:center">
                          <td style="border-right:solid thin #999999;font-weight:400" width="50%">
                            {!! trans('clickbus.clickbus_email-rules-seat-transfer') !!}
                          </td>
                          <td style="font-weight:400">
                            {!! trans('clickbus.clickbus_email-rules-deadlines-and-cancel') !!}
                          </td>
                        </tr>
                        <tr style="text-align:center">
                          <td style="border-right:solid thin #999999">
                            <img src="https://vivala.com.br/img/clickbus/icon_clickbus-poltrona.png" width="70px">
                          </td>
                          <td>
                            <img src="https://vivala.com.br/img/clickbus/icon_clickbus-calendario.png" width="70px">
                          </td>
                        </tr>

                        <tr style="font-family:'Roboto',sans-serif;font-weight:300;font-size:12px;text-align:justify">
                          <td style="padding:10px 25px 10px 10px;border-right:solid thin #999999">
                            {!! trans('clickbus.clickbus_email-rules-text5') !!}
                          </td>
                          <td style="padding:10px 10px 10px 25px">
                            {!! trans('clickbus.clickbus_email-riles-text6') !!}
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

                <tr>
                  <td align="center">
                    <table style="border-bottom:1px solid #ddd;padding-top:5px;padding-bottom:5px;font-size:12px;font-family:Arial" align="center" width="90%">
                      <tbody>
                        <tr>
                          <td align="center">
                            <span style="color: #F16F2B;font-weight: 800;">
                            {!! trans('clickbus.clickbus_email-vivala-title') !!}</span>
                             -
                            {!! trans('clickbus.clickbus_email-vivala-address') !!}.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td style="padding:5px 0px 0px 0px" align="center">
                    <table>
                      <tr>
                        <td align="center"><span>{!! trans('clickbus.clickbus_email-copyright-footer1') !!}</span></td>
                        <td align="center"><img src="https://vivala.com.br/logo.png" alt="Vivalá" style="display:block;padding:0px 0px 0px 0px" height="20" width="35"></td>
                        <td align="center"><span>{!! trans('clickbus.clickbus_email-copyright-footer2') !!}</span></td>
                      </tr>
                    </table>
                  </td>
                </tr>

              </tbody>
            </table>

            <table cellpadding="10px" cellspacing="0" align="center" bgcolor="#ffffff" width="600">
              <tbody>
                <tr>
                  <td style="padding:10px 10px 10px 10px;text-align:justify;font-family:'Arial',sans-serif;font-weight:400;font-size:12px">
                    {!! trans('clickbus.clickbus_email-faq-warning') !!}
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
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
