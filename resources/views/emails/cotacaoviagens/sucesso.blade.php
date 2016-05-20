<body>
    EMAIL AUTOMÁTICO DA PLATAFORMA PARA COTAÇÃO DE VIAGENS<br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES DO CLIENTE:</strong><br/>
    Nome do Cliente: <strong>{{ $request->nome }}</strong><br/>
    Email do Cliente: <strong>{{ $request->email }}</strong><br/>
    User ID do Cliente: <strong>{{ $request->user_id }}</strong><br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES BÁSICAS:</strong><br/>
    - Pediu Cotação de Voos? <strong>{{ $request }}</strong><br/>
    - Pediu Cotação de Onibus? <strong>{{ $request }}</strong><br/>
    - Pediu Cotação de Hospedagem? <strong>{{ $request }}</strong><br/>
    - Pediu Cotação de Carros? <strong>N/A</strong><br/>
    <br/>
    º De <strong>{{ $request }}</strong> para {{ $request }}
    º Data da <strong>IDA</strong>: {{ $request }}
    º Data da <strong>VOLTA</strong>: {{ $request }}
    <strong style="color:red;">* Datas flexíveis?</strong> <strong>{{ $request }}</strong><br/>
    º Número de <strong>ADULTOS</strong>: {{ $request }}
    º Número de <strong>CRIANÇAS</strong>: {{ $request }}
    <br/>
    º Prefere viajar de:<br/>
    @foreach($tempos as $tempo)
      <p>$tempo</p>
    @endforeach<br/>
    <br/>
    <br/>
    <strong style="font-size:14px;">INFORMAÇÕES REFERENTES A HOSPEDAGEM:</strong><br/>
    º Número de quartos: <strong>{{ $request }}</strong><br/>
    º Adicionais do Hotel:<br/>
    @foreach($adicionais as $adicional)
      <p>$adicional</p>
    @endforeach<br/>
    º Bairro ou região de preferência: {{ $request }}<br/>
    º Informações adicionais:<br/>
    {{ $request }}
</body>
