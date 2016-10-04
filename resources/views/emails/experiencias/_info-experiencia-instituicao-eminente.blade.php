<!-- Seção DICAS PARA A INSTITUIÇÃO SOBRE A EXPERIÊNCIA  -->
<td bgcolor="#3EA790" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; margin-top:0; padding-bottom:0;">
      <tbody>
        <tr align="left">
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#FFFFFF; line-height:1.2em; margin: 5px 0 0 0;">Dicas</h3>
            <ul>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Verifique o número de participantes da sua experiência neste email. Tenha em mente que o número de participantes ainda pode aumentar até lá.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Tenha certeza de que todos os equipamentos necessários para a realização da experiência estejam disponíveis para todos os participantes durante a experiência.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Disponibilize seus telefones de contato para os participantes, isso cria um elo inicial e mantém os participantes mais confiantes sobre a experiência.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Sua experiência é a céu aberto? Verifique as previsões do tempo e a informe aos seus participantes na chegada, isso os dá maior segurança.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Lembre-se que a Vivalá é sua parceira número um nesta experiência, então não hesite em entrar em contato conosco por email ou telefone para sanar suas dúvidas.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto">
                E não se esqueça: Gentileza gera gentileza :)
              </li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</td>
<!-- Fim da Seção DICAS PARA A INSTITUIÇÃO SOBRE A EXPERIÊNCIA  -->
<!-- Separador -->
<td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
  <tr></tr>
</td>
<!-- Fim do Separador -->
<!-- Seção de USUÁRIOS INSCRITOS + DETALHES DA EXPERIÊNCIA -->
<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:20px; padding-bottom:0;">
      <tbody>
        <!-- Seção USUÁRIOS INSCRITOS -->
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Usuários Inscritos na sua Experiência
            </h3>
          </td>
        </tr>
        @foreach($Inscricoes as $Inscricao)
          <tr>
            <td style="border: 1px solid #E58807; padding: 0 10px; margin-bottom:10px;">
              <p>
                <img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" alt="" title="" min-width="16px" width="16px" max-width="16px" min-height="17px" height="17px" max-height="17px" style="margin-right:10px;"/>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                  Nome
                </span>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ $Inscricao->perfil->nome_completo }}
                </span>
              </p>
              <p>
                <img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" alt="" title="" min-width="20px" width="20px" max-width="20px" min-height="15px" height="15px" max-height="15px" style="margin-right:10px;"/>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                  Email
                </span>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ $Inscricao->perfil->user->email }}
                </span>
              </p>
            </td>
          </tr>
        @endforeach
        <!-- Fim da Seção USUÁRIOS INSCRITOS -->
        <!-- Separador -->
        <tr align="center">
          <td>
            <div style="border-bottom: 1px solid #ECEBEB; width:300px; margin:25px 0;"></div>
          </td>
        </tr>
        <!-- Fim do Separador -->
        <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:40px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Resumo da Experiência
            </h3>
            <p style="float:left; margin-top:0; margin-bottom:0;">
              <img src="{{ $Experiencia->FotoOwnerUrlPublica }}" min-width="240px" width="auto" max-width="600px" min-height="300px" height="300px" max-height="300px" style="margin-right:20px;"/>
            </p>
            <p style="margin-top:10px; margin-bottom:10px;">
              <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                TIPO
              </span>
              <br>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                @if($Experiencia->isEventoUnico)
                  Evento Único
                @elseif ($Experiencia->isEventoRecorrente)
                  Evento Recorrente
                @elseif ($Experiencia->isEventoServico)
                  Evento Serviço
                @endif
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 10px;">
              <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                LOCAL
              </span>
              <br>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                {{ ucfirst(trim($Experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla)) }}
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 10px;">
              <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                ENDEREÇO
              </span>
              <br>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                {{ ucfirst($Experiencia->endereco_completo) }}
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 10px;">
              <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                VALOR
              </span>
              <br>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                R${{ $Experiencia->preco }}
              </span>
            </p>
          </td>
        </tr>
        <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Descrição
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Experiencia->descricao) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <!-- Seção DETALHES DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Detalhes
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Experiencia->detalhes) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
        <!-- Seção DETALHES EXTRAS DA EXPERIÊNCIA -->
        @if($Experiencia->informacoes)
          <tr>
            <td>
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                Informações Extras
              </h3>
            </td>
          </tr>
          @foreach($Experiencia->informacoes as $Informacao)
            <tr>
              <td>
                <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                  <img src="{{ $Informacao->PathIconePNG }}" min-width="32px" width="32px" max-width="32px" min-height="32px" height="32px" max-height="32px"/>
                </p>
                <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
                  {{ ucfirst(strtolower(trim($Informacao->descricao))) }}
                </p>
              </td>
            </tr>
          @endforeach
        @endif
        <!-- Fim da Seção de DETALHES EXTRAS DA EXPERIÊNCIA -->
      </tbody>
    </table>
  </div>
</td>
<!-- Fim da Seção de USUÁRIOS INSCRITOS + DETALHES DA EXPERIÊNCIA -->
