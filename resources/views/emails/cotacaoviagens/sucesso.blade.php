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
    <h1 style="color:#F16F2B; text-align:center;">EMAIL AUTOMÁTICO DA PLATAFORMA</h1><br/>
    <h2 style"color:#F16F2B; text-align:center;">COTAÇÃO DE VIAGENS</h2>
    <br/>
    <br/>
    <h3 style="font-size:14px;">INFORMAÇÕES DO CLIENTE:</h3><br/>
    User ID do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-id'] }}</strong><br/>
    Nome do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-username'] }}</strong><br/>
    Email do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-email'] }}</strong><br/>
    <br/>
    <br/>
    <hr/>
    <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES BÁSICAS:</h3><br/>
    - Quanto este cliente pretende gastar nesta cotação (Em uma escala de 1 - Pouquíssimo a 5 - Muitíssimo])?
    <strong style="color:#F16F2B;">{{ $CotacaoViagem['cotacao_obj']['basico']['qto-gastar'] }}</strong><br/>
    - Quais cotações este cliente pediu?<br/>
    @foreach($CotacaoViagem['cotacao_obj']['basico']['cotacao'] as $tipo_cotacao)
      <?php echo('<strong style="color:#F16F2B;">' . $tipo_cotacao . '</strong>, '); ?>
    @endforeach
    <br/>
    º De <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['origem'] }}</strong> para <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['destino'] }}</strong><br/>
    º Data da IDA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-ida'] }}</strong><br/>
    º Data da VOLTA: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['data-volta'] }}</strong><br/>
    <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['datas-flexiveis'] }}</strong><br/>
    º Número de ADULTOS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-adultos'] }}</strong><br/>
    º Número de CRIANÇAS: <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['numero-criancas'] }}</strong><br/>
    @if(isset($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']))
      <?php echo('º Idade das CRIANÇAS: '); ?>
      @foreach($CotacaoViagem['cotacao_obj']['basico']['idade-criancas'] as $idade_criancas)
        <?php echo('<strong>' . $idade_criancas . '</strong>, '); ?>
      @endforeach
      <?php echo('<br/>'); ?>
    @endif

    @if(isset($CotacaoViagem['cotacao_obj']['basico']['pref-tempo']))
      <?php echo('º Prefere viajar de:<br/>'); ?>
      @foreach($CotacaoViagem['cotacao_obj']['basico']['pref-tempo'] as $preferencia_tempo)
        <?php echo('<strong>' . $preferencia_tempo . '</strong>, '); ?>
      @endforeach
      <?php echo('<br/>'); ?>
    @endif

    @if(isset($CotacaoViagem['cotacao_obj']['basico']['horario-restrito']))
     <strong style="color:red;">* Horários restritos?</strong><br/>
     <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['horario-restrito'] }}</strong><br/>
     <br/>
    @endif
    <hr/>

    {{-- HOSPEDAGEM --}}
    @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']))
      <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</h3><br/>
      @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos']))
        <?php echo('º Número de quartos: <strong>' . $CotacaoViagem['cotacao_obj']['hospedagem']['nro-quartos'] . '</strong><br/>'); ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel']))
        <?php echo('º Adicionais do Hotel que o cliente gostaria de ter:<br/>'); ?>
        @foreach($CotacaoViagem['cotacao_obj']['hospedagem']['adicionais-hotel'] as $adicionais_hotel)
          <?php echo('<strong>' . $adicionais_hotel . '</strong>, ') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref']) && $CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref'] != '')
        <?php echo('º Bairro ou região de preferência: <strong>' . $CotacaoViagem['cotacao_obj']['hospedagem']['bairro-regiao-pref'] . '</strong><br/>') ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais']) && $CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais'] != '')
        <?php echo('<strong style="color:red;">* Informações adicionais:</strong><br/>' . $CotacaoViagem['cotacao_obj']['hospedagem']['infos-adicionais'] . '<br/>') ?>
      @endif
    @endif
    <hr/>

    {{-- ALIMENTAÇÃO --}}
    @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']))
      <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES A ALIMENTAÇÃO:</h3><br/>
      @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['tipo_refeicao']))
        <?php echo('º Tipos de refeição escolhida pelo cliente:<br/>'); ?>
        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['tipo_refeicao'] as $tipo_refeicao)
          <?php echo('<strong>' . $tipo_cozinha . '</strong>, ') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha']))
        <?php echo('º Tipos de cozinha escolhidas pelo cliente:<br/>'); ?>
        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['opcao-cozinha'] as $opcao_cozinha)
          <?php echo('- <strong>' . $opcao_cozinha . '</strong><br/>') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['momento']))
        <?php echo('º O cliente gostaria de curtir esses momentos de alimentação com:<br/>'); ?>
        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['momento'] as $momento)
          <?php echo('<strong>' . $momento . '</strong>, ') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato']))
        <?php echo('º Preço(s) médio(s) por prato que o cliente gostaria de pagar: '); ?>
        @foreach($CotacaoViagem['cotacao_obj']['alimentacao']['preco-medio-prato'] as $tipo_cozinha)
          <?php echo('<strong>' . $tipo_cozinha . '</strong>, ') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif
    @endif
    <hr/>

    {{-- CARROS --}}
    @if(isset($CotacaoViagem['cotacao_obj']['carros']))
      <h3 style="font-size:14px; color:#F16F2B">INFORMAÇÕES REFERENTES AO ALUGUEL DE CARROS:</h3><br/>

      @if(isset($CotacaoViagem['cotacao_obj']['carros']['categoria']))
        <?php echo('º Categoria de carro na qual o cliente gostaria de alugar: '); ?>
        <?php echo($CotacaoViagem['cotacao_obj']['carros']['categoria'] . '<br/>'); ?>
      @endif

      @if(isset($CotacaoViagem['cotacao_obj']['carros']['adicionais']))
        @foreach($CotacaoViagem['cotacao_obj']['carros']['adicionais'] as $adicionais_carros)
          <?php echo('<strong>' . $adicionais_carros . '</strong>, ') ?>
        @endforeach
        <?php echo('<br/>') ?>
      @endif
    @endif

</body>
