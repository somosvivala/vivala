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
                Tenha certeza de que todos os equipamentos necessários para a realização da experiência estejam disponíveis.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                Disponibilize telefones para contato caso haja alguma emergência.
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto; padding-bottom:15px;">
                A sua Experiência é a céu aberto? Garanta protetores solares e capas de chuva para seus convidados!
              </li>
              <li style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; color:white; margin:0 auto">
                Não se esqueça: Gentileza gera gentileza :)
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
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:15px; margin-bottom:0;">
              Usuários Inscritos
            </h3>
          </td>
        </tr>
        @foreach($Inscricoes as $Inscricao)
          <tr>
            <td style="border: 1px solid #E58807; padding: 0 10px;">
              <p>
                <img src="{{ asset('/img/email/vivala-email-pessoa-icone.png') }}" alt="" title="" min-width="16px" width="16px" max-width="16px" min-height="17px" height="17px" max-height="17px" style="margin-right:10px;"/>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                  Nome
                </span>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ $Inscricao->perfil->nome_completo }}
                </span>
              </p>
              <p>
                <img src="{{ asset('/img/email/vivala-email-envelope-icone.png') }}" alt="" title="" min-width="20px" width="20px" max-width="20px" min-height="15px" height="15px" max-height="15px" style="margin-right:10px;"/>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                  Email
                </span>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ $Inscricao->perfil->user->email }}
                </span>
              </p>
              <p>
                <img src="{{ asset('/img/email/vivala-email-jogo-da-velha-icone.png') }}" alt="" title="" min-width="19px" width="19px" max-width="19px" min-height="16px" height="16px" max-height="16px" style="margin-right:10px;"/>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">
                  ID da inscrição
                </span>
                <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ str_pad(trim($Inscricao->id), 4, '0', STR_PAD_LEFT) }}
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
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Informações da sua Experiência
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
            <p style="margin-top:30px; margin-bottom: 15px;">
              <span style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:19px; font-weight:bold; color:#FFFFFF; background-color:#F06F37; padding: 4px 15px;" title="ID da Experiência">
                ID {{ str_pad(trim($Experiencia->id), 3, '0', STR_PAD_LEFT) }}
              </span>
            </p>
          </td>
        </tr>
        <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Descrição Completa da sua Experiência
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
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Detalhes da sua Experiência
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
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
                Informações Extras da sua Experiência
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
