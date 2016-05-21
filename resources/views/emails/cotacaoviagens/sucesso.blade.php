<?php echo var_dump($CotacaoViagem); ?>
<body>
    {{--
    EMAIL AUTOMÁTICO DA PLATAFORMA PARA COTAÇÃO DE VIAGENS<br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES DO CLIENTE:</strong><br/>
    User ID do Cliente: <strong>{{ $CotacaoViagem>usuario['user-id'] }}</strong><br/>
    Nome do Cliente: <strong>{{ $CotacaoViagem->usuario['user-username'] }}</strong><br/>
    Email do Cliente: <strong>{{ $CotacaoViagem->usuario['user-email'] }}</strong><br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES BÁSICAS:</strong><br/>
    - Pediu Cotação de Voos? <strong>{{ $CotacaoViagem->opcoes['cotacao-voo'] }}</strong><br/>
    - Pediu Cotação de Onibus? <strong>{{ $CotacaoViagem->opcoes['cotacao-onibus'] }}</strong><br/>
    - Pediu Cotação de Hospedagem? <strong>{{ $CotacaoViagem->opcoes['cotacao-hospedagem'] }}</strong><br/>
    - Pediu Cotação de Carros? <strong>{{ $CotacaoViagem->opcoes['cotacao-hospedagem'] }}</strong><br/>
    <br/>
    º De <strong>{{ $CotacaoViagem->dados['lugar-saida'] }}</strong> para <strong>{{ $CotacaoViagem->dados['lugar-chegada'] }}</strong><br/>
    º Data da <strong>IDA</strong>: {{ $CotacaoViagem->dados['data-ida'] }}
    º Data da <strong>VOLTA</strong>: {{ $$CotacaoViagem->dados['data-volta'] }}
    <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem->dados['datas-flexiveis'] }}</strong><br/>
    º Número de <strong>ADULTOS</strong>: {{ $CotacaoViagem->dados['numero-adultos'] }}
    º Número de <strong>CRIANÇAS</strong>: {{ $CotacaoViagem->dados->['numero-criancas'] }}
    <br/>
    º Prefere viajar de:<br/>
     - Manhã: {{ $CotacaoViagem->tempo-viagem->viaja-manha }}<br/>
     - Tarde: {{ $CotacaoViagem->tempo-viagem->viaja-tarde }}<br/>
     - Noite: {{ $CotacaoViagem->tempo-viagem->viaja-noite }}<br/>
     - Madrugada {{ $CotacaoViagem->tempo-viagem->viaja-madrugada }}<br/>
     <strong style="color:red;">* Horários restritos?</strong><br/>
     {{ $CotacaoViagem->tempo-viagem->horario-restrito }}<br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</strong><br/>
    º Número de quartos: <strong>{{ $CotacaoViagem->dados-hospedagem->hotel-numero-quartos }}</strong><br/>
    º Adicionais do Hotel:<br/>
    º Bairro ou região de preferência: {{ $CotacaoViagem->dados-hospedagem->hotel-bairro-regiao }}<br/>
    <strong style="color:red;">* Informações adicionais:</strong><br/>
    {{ $CotacaoViagem->dados-hospedagem->hotel-infos-adicionais }}
    --}
</body>
