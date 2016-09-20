@extends('emails._base', [
  'emailCabecalho' => 'Email de Cotação',
  'emailTitulo' => 'Formulário de Cotação de Viagens'
])

  @section('email-conteudo')
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:20px;">
        <tbody>
          <tr align="left">

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
            <br>
            <br>
            <hr/>
            <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES BÁSICAS:</h3><br>
            <?php echo('- Quanto este cliente pretende gastar nesta cotação (Em uma escala de 1 - Pouquíssimo a 5 - Muitíssimo) ? '); ?>
            <strong style="color:#F16F2B;">{{ $CotacaoViagem['cotacao_obj']['basico']['qto-gastar'] }}</strong><br>
            <?php echo('- Quais cotações este cliente pediu? '); ?>
            @foreach($CotacaoViagem['cotacao_obj']['basico']['cotacao'] as $tipo_cotacao)
              <?php echo('<strong style="color:#F16F2B;">' . $tipo_cotacao . '</strong>; '); ?>
            @endforeach
            <br>
            º De <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['origem'] }}</strong> para <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['destino'] }}</strong><br>
            º Data da IDA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-ida'] }}</strong><br>
            º Data da VOLTA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-volta'] }}</strong><br>
            <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['datas-flexiveis'] }}</strong><br>
            º Número de ADULTOS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-adultos'] }}</strong><br>
            º Número de CRIANÇAS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-criancas'] }}</strong><br>
            @if(isset($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']))
              <?php echo('º Idade das CRIANÇAS: '); ?>
              @foreach($CotacaoViagem['cotacao_obj']['basico']['idade-criancas'] as $idade_criancas)
                <?php echo('<strong>' . $idade_criancas . '</strong>, '); ?>
              @endforeach
              <?php echo('<br>'); ?>
            @endif

            @if(isset($CotacaoViagem['cotacao_obj']['basico']['pref-tempo']))
              <?php echo('º Prefere viajar de: '); ?>
              @foreach($CotacaoViagem['cotacao_obj']['basico']['pref-tempo'] as $preferencia_tempo)
                <?php echo('<strong>' . $preferencia_tempo . '</strong>; '); ?>
              @endforeach
              <?php echo('<br>'); ?>
            @endif

            @if(isset($CotacaoViagem['cotacao_obj']['basico']['horario-restrito']))
             <?php echo ('<strong style="color:red;">* Horários restritos?</strong> '); ?>
             <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['horario-restrito'] }}</strong><br>
             <br>
            @endif
            <hr/>

            {{-- HOSPEDAGEM --}}
            @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']))
              <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</h3><br>
              @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos']))
                <?php echo('º Número de quartos: <strong>' . $CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos'] . '</strong><br>'); ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel']))
                <?php echo('º Adicionais do Hotel que o cliente gostaria de ter: '); ?>
                @foreach($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel'] as $adicionais_hotel)
                  <?php echo('<strong>' . $adicionais_hotel . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref']) && $CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref'] != '')
                <?php echo('º Bairro ou região de preferência: <strong>' . $CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref'] . '</strong><br>') ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais']) && $CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais'] != '')
                <?php echo('<strong style="color:red;">* Informações adicionais: </strong><strong>' . $CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais'] . '</strong><br>') ?>
              @endif
            @endif
            <hr/>

            {{-- ALIMENTAÇÃO --}}
            @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']))
              <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES A ALIMENTAÇÃO:</h3><br>
              @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao']))
                <?php echo('º Tipos de refeição escolhida pelo cliente:<br>'); ?>
                @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['tipo-refeicao'] as $tipo_refeicao)
                  <?php echo('<strong>' . $tipo_refeicao . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha']))
                <?php echo('º Tipos de cozinha escolhidas pelo cliente:<br>'); ?>
                @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha'] as $opcao_cozinha)
                  <?php echo('<strong>' . $opcao_cozinha . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['momento']))
                <?php echo('º O cliente gostaria de curtir esses momentos de alimentação com: '); ?>
                @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['momento'] as $momento)
                  <?php echo('<strong>' . $momento . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato']))
                <?php echo('º Preço(s) médio(s) por prato que o cliente gostaria de pagar: '); ?>
                @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato'] as $tipo_cozinha)
                  <?php echo('<strong>' . $tipo_cozinha . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif
            @endif
            <hr/>

            {{-- CARROS --}}
            @if(isset($CotacaoViagem['cotacao_obj']['carros']))
              <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES AO ALUGUEL DE CARROS:</h3><br>

              @if(isset($CotacaoViagem['cotacao_obj']['carros']['categoria']))
                <?php echo('º Categoria de carro na qual o cliente gostaria de alugar: '); ?>
                <?php echo('<strong>' . $CotacaoViagem['cotacao_obj']['carros']['categoria'] . '</strong><br>'); ?>
              @endif

              @if(isset($CotacaoViagem['cotacao_obj']['carros']['adicionais']))
                <?php echo('º Adicionais que o cliente gostaria que o carro alugado tivesse: '); ?>
                @foreach($CotacaoViagem['cotacao_obj']['carros']['adicionais'] as $adicionais_carros)
                  <?php echo('<strong>' . $adicionais_carros . '</strong>; ') ?>
                @endforeach
                <?php echo('<br>') ?>
              @endif
            @endif

          </tr>
        </tbody>
      </table>
    </div>
  </td>
