<body>
    <h1 style="color:#F16F2B; text-align:center;">EMAIL AUTOMÁTICO DA PLATAFORMA</h1><br/>
    <h2 style"color:#F16F2B; text-align:center;">COTAÇÃO DE VIAGENS</h2>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES DO CLIENTE:</strong><br/>
    User ID do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-id'] }}</strong><br/>
    Nome do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-username'] }}</strong><br/>
    Email do Cliente: <strong>{{ $CotacaoViagem['usuario']['user-email'] }}</strong><br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES BÁSICAS:</strong><br/>
    - Quanto este cliente pretende gastar nesta cotação (Em uma escala de 1 - Pouquíssimo a 5 - Muitíssimo])?<br/>
    <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['qto-gastar'] }}</strong>
    - Quais cotações este cliente pediu?<br/>
    @foreach($CotacaoViagem['cotacao_obj']['basico']['cotacao'] as $tipo_cotacao)
      <strong><?php echo($tipo_cotacao) ?></strong><br/>
    @endforeach
    <br/>
    º De <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['origem'] }}</strong> para <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['destino'] }}</strong><br/>
    º Data da <strong>IDA</strong>: {{ $CotacaoViagem['cotacao_obj']['basico']['data-ida'] }}</br>
    º Data da <strong>VOLTA</strong>: {{ $CotacaoViagem['cotacao_obj']['basico']['data-volta'] }}</br>
    <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem['cotacao_obj']['basico']['datas-flexiveis'] }}</strong><br/>
    º Número de <strong>ADULTOS</strong>: {{ $CotacaoViagem['cotacao_obj']['basico']['numero-adultos'] }}</br>
    º Número de <strong>CRIANÇAS</strong>: {{ $CotacaoViagem['cotacao_obj']['basico']['numero-criancas'] }}</br>
    @if(isset($CotacaoViagem['cotacao_obj']['basico']['idade-criancas']))
      @foreach($CotacaoViagem['cotacao_obj']['basico']['idade-criancas'] as $idade_criancas)
        <?php echo('º Idade das <strong>CRIANÇAS</strong>:</br>' . $idade_criancas . '<br/>') ?>
      @endforeach
    @endif

    @if(isset($CotacaoViagem['cotacao_obj']['basico']['pref-tempo']))
      @foreach($CotacaoViagem['cotacao_obj']['basico']['pref-tempo'] as $preferencia_tempo)
        <?php echo('º Prefere viajar de:<br/>' . $preferencia_tempo . '<br/>') ?>
      @endforeach
    @endif
    <br/>
     <strong style="color:red;">* Horários restritos?</strong><br/>
     {{ $CotacaoViagem['cotacao_obj']['basico']['horario-restrito'] }}<br/>
     <br/>
    {{--
    <strong style="font-size:14px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</strong><br/>
    º Número de quartos: <strong>{{ $CotacaoViagem->hospedagem['hotel-numero-quartos'] }}</strong><br/>
    <table style="width:100%">
      <caption><strong>º Adicionais do Hotel</strong></caption>
      <tr>
        <td>Café da Manhã: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-cafe'] }}</td>
        <td>WiFi Gratuito: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-wifi'] }}</td>
        <td>Ar condicionado: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-ar-condicionado'] }}</td>
        <td>Televisão com TV a cabo: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-tv-cabo'] }}</td>
      </tr>
        <td>Cancelamento grátis: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-cancelamento'] }}</td>
        <td>Animais de estimação: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-animal'] }}</td>
        <td>Piscina: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-piscina'] }}</td>
        <td>Academia: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-academia'] }}</td>
      <tr>
        <td>Estacionamento gratuito: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-estacionamento'] }}</td>
        <td>Banheiro Privativo: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-banheiro-privativo'] }}</td>
        <td>Varanda: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-varanda'] }}</td>
        <td>Translado: {{ $CotacaoViagem->hospedagem['hotel-adicionais']['adicional-translado'] }}</td>
      </tr>
    </table>
    º Bairro ou região de preferência: {{ $CotacaoViagem->hospedagem['hotel-bairro-regiao'] }}<br/>
    <strong style="color:red;">* Informações adicionais:</strong><br/>
    {{ $CotacaoViagem->hospedagem['hotel-infos-adicionais'] }}
  --}}
</body>
