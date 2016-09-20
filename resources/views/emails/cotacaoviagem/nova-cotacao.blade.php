@extends('emails._base', [
  'emailCabecalho' => 'Email de Cotação',
  'emailTitulo' => 'Formulário de Cotação de Viagens'
])

  @section('email-conteudo')
    <!-- Seção de INFORMAÇÕES BÁSICAS -->
    <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px;">
      <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0;">
          <tbody>
            <tr align="left">
              <td>
                <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES DO CLIENTE:</h3>
                <p><img src="{{ asset('/img/icones/png/cinza-hashtag.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px" style="margin-right:10px;"/>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                    ID do usuário:
                  </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $CotacaoViagem['usuario']['user-id'] }}
                  </span>
                </p>
                <p><img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px" style="margin-right:10px;"/>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                    Nome:
                  </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $CotacaoViagem['usuario']['user-username'] }}
                  </span>
                </p>
                <p><img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                    Email do Cliente:
                  </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $CotacaoViagem['usuario']['user-email'] }}
                  </span>
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </td>
    <!-- Separador -->
    <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
      <tr></tr>
    </td>
    <!-- Fim do Separador -->
    <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px;">
      <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0;">
          <tbody>
            <tr align="left">
              <td>
                <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES BÁSICAS:</h3>
                <p style="margin-bottom:0px;">
                  <span>- Quanto este cliente pretende gastar nesta cotação (Em uma escala de 1 - Pouquíssimo a 5 - Muitíssimo)</span><br>
                  <strong style="color:#F16F2B;">{{ $CotacaoViagem['cotacao_obj']['basico']['qto-gastar'] }}</strong><br>
                </p>
                <p style="margin-bottom:0px;">
                  <span>- Quais cotações este cliente pediu?</span><br>
                  @foreach($CotacaoViagem['cotacao_obj']['basico']['cotacao'] as $tipoCotacao)
                    <strong style="color:#F16F2B;"> {{ $tipoCotacao }}</strong><br>
                  @endforeach
                </p>
                <p style="margin-bottom:0px;">
                  <span>º De <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['origem'] }}</strong> para <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['destino'] }}</strong></span>
                </p>
                <p style="margin-bottom:0px;">
                  <span>º Data da IDA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-ida'] }}</strong></span>
                </p>
                <p style="margin-bottom:0px;">
                  <span>º Data da VOLTA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-volta'] }}</strong></span>
                </p>
                <p style="margin-bottom:0px;">
                  <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['datas-flexiveis'] }}</strong>
                </p>
                <p style="margin-bottom:0px;">
                  <span>º Número de ADULTOS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-adultos'] }}</strong></span>
                </p>
                <p style="margin-bottom:0px;">
                  <span>º Número de CRIANÇAS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-criancas'] }}</strong></span>
                </p>
                @if( isset($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']) && !is_null($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']) )
                  <p style="margin-bottom:0px;">
                    <span>º Idade das CRIANÇAS: </span>
                    @foreach($CotacaoViagem['cotacao_obj']['basico']['idade-criancas'] as $idadeCriancas)
                      <strong>{{ $idadeCriancas }}</strong>
                    @endforeach
                    <br>
                  </p>
                @endif
                @if(isset($CotacaoViagem['cotacao_obj']['basico']['pref-tempo']))
                  <p style="margin-bottom:0px;">
                      <span>º Prefere viajar de:</span>
                      @foreach($CotacaoViagem['cotacao_obj']['basico']['pref-tempo'] as $preferenciaTempo)
                        <strong>{{ $preferenciaTempo }}</strong><br>
                      @endforeach
                      <br>
                  </p>
                @endif
                @if(isset($CotacaoViagem['cotacao_obj']['basico']['horario-restrito']))
                  <p style="margin-bottom:0px;">
                     <strong style="color:red;">* Horários restritos?</strong>
                     <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['horario-restrito'] }}</strong><br>
                  </p>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </td>
    <!-- Fim da Seção de INFORMAÇÕES BÁSICAS -->

    <!-- Seção de HOSPEDAGEM -->
    @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']))
      <!-- Separador -->
      <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
        <tr></tr>
      </td>
      <!-- Fim do Separador -->
      <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px;">
        <div style="display:block; margin:0 auto; max-width:600px;">
          <table style="width: 100%; padding-bottom:0;">
            <tr align="left">
              <td>
                  <h3 style="font-size:14px; color:#F16F2B; margin-bottom:20px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</h3>
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos']))
                    <p style="margin-bottom:0px;">
                      <span>º Número de quartos: <strong>{{ $CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos'] }}</strong></span>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel']))
                    <p style="margin-bottom:0px;">
                      <span>º Adicionais do Hotel que o cliente gostaria de ter:</span><br>
                      @foreach($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel'] as $adicionaisHotel)
                        <strong>{{ $adicionaisHotel }}</strong><br>
                      @endforeach
                      <br>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref']) && !empty($CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref']))
                    <p style="margin-bottom:0px;">
                      <span>º Bairro ou região de preferência:</span> <strong>{{ $CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref'] }}</strong>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais']) && !empty($CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais']))
                    <p style="margin-bottom:0px;">
                      <strong style="color:red;">* Informações adicionais: </strong><strong> {{ $CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais'] }}</strong>
                    </p>
                  @endif
              </td>
            </tr>
          </table>
        </div>
      </td>
    @endif
    <!-- Fim da Seção de HOSPEDAGEM -->

    <!-- Seção de ALIMENTAÇÃO -->
    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']))
      <!-- Separador -->
      <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
        <tr></tr>
      </td>
      <!-- Fim do Separador -->
      <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px;">
        <div style="display:block; margin:0 auto; max-width:600px;">
          <table style="width: 100%; padding-bottom:0;">
            <tbody>
              <tr align="left">
                <td>
                    <h3 style="font-size:14px; color:#F16F2B; margin-bottom:20px;">INFORMAÇÕES REFERENTES A ALIMENTAÇÃO:</h3>
                    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao']))
                      <p style="margin-bottom:0px;">
                        <span>º Tipos de refeição escolhida pelo cliente:</span><br>
                        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao'] as $tipoRefeicao)
                          <strong>{{ $tipoRefeicao }}</strong><br>
                        @endforeach
                        <br>
                      </p>
                    @endif
                    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha']))
                      <p style="margin-bottom:0px;">
                        <span>º Tipos de cozinha escolhidas pelo cliente:</span><br>
                        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha'] as $opcaoCozinha)
                          <strong>{{ $opcaoCozinha }}</strong><br>
                        @endforeach
                        <br>
                      </p>
                    @endif
                    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['momento']))
                      <p style="margin-bottom:0px;">
                        <span>º O cliente gostaria de curtir esses momentos de alimentação com: </span>
                        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['momento'] as $momento)
                          <strong>{{ $momento }}</strong><br>
                        @endforeach
                        <br>
                      </p>
                    @endif
                    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato']))
                      <p style="margin-bottom:0px;">
                        <span>º Preço(s) médio(s) por prato que o cliente gostaria de pagar: </span>
                        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato'] as $precoMedioPrato)
                          <strong>{{ $precoMedioPrato }}</strong><br>
                        @endforeach
                        <br>
                      </p>
                    @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </td>
    @endif
    <!-- Fim da Seção de ALIMENTAÇÃO -->

    <!-- Seção de CARROS -->
    @if(isset($CotacaoViagem['cotacao_obj']['carros']))
      <!-- Separador -->
      <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
        <tr></tr>
      </td>
      <!-- Fim do Separador -->
      <!-- Seção de CARROS -->
      <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px;">
        <div style="display:block; margin:0 auto; max-width:600px;">
          <table style="width: 100%; padding-bottom:0;">
            <tbody>
              <tr align="left">
                <td>
                    <h3 style="font-size:14px; color:#F16F2B; margin-bottom:20px;">INFORMAÇÕES REFERENTES AO ALUGUEL DE CARROS:</h3>
                    @if(isset($CotacaoViagem['cotacao_obj']['carros']['categoria']))
                      <p style="margin-bottom:0px;">
                        <span>º Categoria de carro na qual o cliente gostaria de alugar: </span>
                        <strong>{{ $CotacaoViagem['cotacao_obj']['carros']['categoria'] }}</strong>
                      </p>
                    @endif
                    @if(isset($CotacaoViagem['cotacao_obj']['carros']['adicionais']))
                      <p style="margin-bottom:0px;">
                        <span>º Adicionais que o cliente gostaria que o carro alugado tivesse: </span>
                        @foreach($CotacaoViagem['cotacao_obj']['carros']['adicionais'] as $adicionaisCarros)
                          <strong>{{ $adicionaisCarros }}</strong><br>
                        @endforeach
                        <br>
                      </p>
                    @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </td>
    @endif
    <!-- Fim da Seção de CARROS -->
  @stop
