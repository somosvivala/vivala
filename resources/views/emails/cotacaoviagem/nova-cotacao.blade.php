@extends('emails._base', [
  'emailCabecalho' => 'Email de Cotação',
  'emailTitulo' => 'Formulário de Cotação de Viagens'
])

  @section('email-conteudo')
    <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
      <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:20px;">
          <tbody>
            <!-- Seção de INFORMAÇÕES BÁSICAS -->
            <tr align="left">
              <td>
                <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES DO CLIENTE:</h3><br>
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
            <tr align="left">
              <td>
                <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES BÁSICAS:</h3>
                <p style="margin-bottom:0px;">
                  <span>- Quanto este cliente pretende gastar nesta cotação (Em uma escala de 1 - Pouquíssimo a 5 - Muitíssimo)</span>
                  <strong style="color:#F16F2B;">{{ $CotacaoViagem['cotacao_obj']['basico']['qto-gastar'] }}</strong><br>
                </p>
                <p style="margin-bottom:0px;">
                  <span>- Quais cotações este cliente pediu?</span>
                  @foreach($CotacaoViagem['cotacao_obj']['basico']['cotacao'] as $tipoCotacao)
                    <strong style="color:#F16F2B;"> {{ $tipoCotacao }}</strong>
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
                  <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['datas-flexiveis'] }}</strong><br>
                  <span>º Número de ADULTOS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-adultos'] }}</strong></span><br>
                  <span>º Número de CRIANÇAS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-criancas'] }}</strong></span><br>
                  @if( isset($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']) && !is_null($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']) )
                    <span>º Idade das CRIANÇAS: </span>
                    @foreach($CotacaoViagem['cotacao_obj']['basico']['idade-criancas'] as $idadeCriancas)
                      <strong>{{ $idadeCriancas }}</strong>
                    @endforeach
                    <br>
                  @endif
                </p>
                <p style="margin-bottom:0px;">
                  @if(isset($CotacaoViagem['cotacao_obj']['basico']['pref-tempo']))
                    <span>º Prefere viajar de:</span>
                    @foreach($CotacaoViagem['cotacao_obj']['basico']['pref-tempo'] as $preferenciaTempo)
                      <strong>{{ $preferenciaTempo }}</strong>
                    @endforeach
                    <br>
                  @endif
                </p>
                <p style="margin-bottom:0px;">
                  @if(isset($CotacaoViagem['cotacao_obj']['basico']['horario-restrito']))
                   <strong style="color:red;">* Horários restritos?</strong>
                   <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['horario-restrito'] }}</strong><br>
                  @endif
                  <br>
                </p>
              </td>
            </tr>
            <!-- Fim da Seção de INFORMAÇÕES BÁSICAS -->
            <!-- Separador -->
            <tr align="center">
              <td>
                <div style="border-bottom:1px solid #FFFFFF; width:300px; margin:25px 0;"></div>
              </td>
            </tr>
            <!-- Fim do Separador -->
            <!-- Seção de HOSPEDAGEM -->
            <tr align="left">
              <td>
                @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']))
                  <h3 style="font-size:14px; color:#F16F2B; margin-bottom:20px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</h3>
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos']))
                    <p style="margin-bottom:0px;">
                      <span>º Número de quartos: <strong>{{ $CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos'] }}</strong></span>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel']))
                    <p style="margin-bottom:0px;">
                      <span>º Adicionais do Hotel que o cliente gostaria de ter:</span>
                      @foreach($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel'] as $adicionaisHotel)
                        <strong>{{ $adicionaisHotel }}</strong>
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
                @endif
              </td>
            </tr>
            <!-- Fim da Seção de HOSPEDAGEM -->
            <!-- Separador -->
            <tr align="center">
              <td>
                <div style="border-bottom:1px solid #FFFFFF; width:300px; margin:25px 0;"></div>
              </td>
            </tr>
            <!-- Fim do Separador -->
            <!-- Seção de ALIMENTAÇÃO -->
            <tr align="left">
              <td>
                @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']))
                  <h3 style="font-size:14px; color:#F16F2B; margin-bottom:20px;">INFORMAÇÕES REFERENTES A ALIMENTAÇÃO:</h3>
                  @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao']))
                    <p style="margin-bottom:0px;">
                      <span>º Tipos de refeição escolhida pelo cliente:</span><br>
                      @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao'] as $tipoRefeicao)
                        <strong>{{ $tipoRefeicao }}</strong>
                      @endforeach
                      <br>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha']))
                    <p style="margin-bottom:0px;">
                      <span>º Tipos de cozinha escolhidas pelo cliente:</span><br>
                      @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha'] as $opcaoCozinha)
                        <strong>{{ $opcaoCozinha }}</strong>
                      @endforeach
                      <br>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['momento']))
                    <p style="margin-bottom:0px;">
                      <span>º O cliente gostaria de curtir esses momentos de alimentação com: </span>
                      @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['momento'] as $momento)
                        <strong>{{ $momento }}</strong>
                      @endforeach
                      <br>
                    </p>
                  @endif
                  @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato']))
                    <p style="margin-bottom:0px;">
                      <span>º Preço(s) médio(s) por prato que o cliente gostaria de pagar: </span>
                      @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato'] as $tipoCozinha)
                        <strong>{{ $tipoCozinha }}</strong>
                      @endforeach
                      <br>
                    </p>
                  @endif
                @endif
              </td>
            </tr>
            <!-- Fim da Seção de ALIMENTAÇÃO -->
            <!-- Separador -->
            <tr align="center">
              <td>
                <div style="border-bottom:1px solid #FFFFFF; width:300px; margin:25px 0;"></div>
              </td>
            </tr>
            <!-- Fim do Separador -->
            <!-- Seção de CARROS -->
            <tr align="left">
              <td>
                @if(isset($CotacaoViagem['cotacao_obj']['carros']))
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
                        <strong>{{ $adicionaisCarros }}</strong>
                      @endforeach
                      <br>
                    </p>
                  @endif
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </td>
  @stop
