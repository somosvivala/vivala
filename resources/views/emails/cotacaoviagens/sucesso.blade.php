<body>
    <h1 style="color:#F16F2B;">EMAIL AUTOMÁTICO DA PLATAFORMA PARA COTAÇÃO DE VIAGENS</h1><br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES DO CLIENTE:</strong><br/>
    User ID do Cliente: <strong>{{ $CotacaoViagem->usuario['user-id'] }}</strong><br/>
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
    º Data da <strong>IDA</strong>: {{ $CotacaoViagem->dados['data-ida'] }}</br>
    º Data da <strong>VOLTA</strong>: {{ $CotacaoViagem->dados['data-volta'] }}</br>
    <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $CotacaoViagem->dados['datas-flexiveis'] }}</strong><br/>
    º Número de <strong>ADULTOS</strong>: {{ $CotacaoViagem->dados['numero-adultos'] }}</br>
    º Número de <strong>CRIANÇAS</strong>: {{ $CotacaoViagem->dados['numero-criancas'] }}</br>
    <br/>
    º Prefere viajar de:<br/>
     - Manhã: {{ $CotacaoViagem->tempo['viaja-manha'] }}<br/>
     - Tarde: {{ $CotacaoViagem->tempo['viaja-tarde'] }}<br/>
     - Noite: {{ $CotacaoViagem->tempo['viaja-noite'] }}<br/>
     - Madrugada {{ $CotacaoViagem->tempo['viaja-madrugada'] }}<br/>
     <strong style="color:red;">* Horários restritos?</strong><br/>
     {{ $CotacaoViagem->tempo['horario-restrito'] }}<br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</strong><br/>
    º Número de quartos: <strong>{{ $CotacaoViagem->hospedagem['hotel-numero-quartos'] }}</strong><br/>
    º Adicionais do Hotel:<br/>
    º Bairro ou região de preferência: {{ $CotacaoViagem->hospedagem['hotel-bairro-regiao'] }}<br/>
    <strong style="color:red;">* Informações adicionais:</strong><br/>
    {{ $CotacaoViagem->hospedagem['hotel-infos-adicionais'] }}
</body>
