@include('emails._header', [
  'emailCabecalho' => 'A sua inscrição na experiêcia foi cancelada',
  'emailTitulo' => 'O seu pedido de cancelamento foi efetivado'
])

  <!-- Primeira SEÇÃO -->
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:20px;">
        <tbody>
          <!-- Título da PRIMEIRA ESTRUTURA -->
          <tr align="center">
            <td>
              <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-weight:bold; font-size:26px; color:#D90011; margin-bottom:20px;">
                A sua inscrição foi cancelada
              </h1>
            </td>
          </tr>
          <!-- Fim do Título da PRIMEIRA ESTRUTURA -->
          <!-- Imagem da PRIMEIRA ESTRUTURA -->
          <tr align="center">
            <td>
              <img src="{{ asset('img/icones/png/vermelho-cancelado-vazio.png') }}" alt="{{ trans('global.lbl_canceled') }}" title="{{ trans('global.lbl_canceled') }}!" min-width="99px" width="auto" max-width="600px" min-height="150px" height="150px" max-height="150px" style="margin-bottom:20px;"/>
            </td>
          </tr>
          <!-- Fim da Imagem da PRIMEIRA ESTRUTURA -->
          <!-- Sub-título da PRIMEIRA ESTRUTURA -->
          <tr align="center">
            <td>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#D90011; font-size:16px;">
                Sua inscrição foi cancelada na experiência oferecida pela
                <br>
                <strong>{{ mb_strtoupper(trim($Inscricao->experiencia->owner_nome)) }}</strong>!
              </p>
            </td>
          </tr>
          <!-- Fim do Sub-título da Primeira PRIMEIRA ESTRUTURA -->
        </tbody>
      </table>
    </div>
  </td>
  <!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:7px 20px;">
    <tr></tr>
  </td>
  <!-- Fim do Separador -->
  <!-- Seção de INFORMAÇÕES -->
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:20px;">
        <tbody>
          <!-- Seção DETALHES DA EXPERIÊNCIA -->
          <tr>
            <td>
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:15px;">
                Detalhes da experiência
              </h3>
            </td>
          </tr>
          <tr>
            <td>
              <p style="float:left; margin-right:20px;">
                <img src="{{ $Inscricao->experiencia->FotoCapaUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
              </p>
              <p>
                <img src="{{ asset('/img/icones/png/cinza-calendario-certo.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="224px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1.2em;">
                  <strong>{{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}</strong>
                </span>
              </p>
              <p>
                <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
                  <strong>{{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}</strong>
                </span>
              </p>
              <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
                {{ trim($Inscricao->experiencia->descricao) }}
              </p>
            </td>
          </tr>
          <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
          <!-- Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
          <tr>
            <td>
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:15px; margin-bottom:15px;">
                Informações
              </h3>
            </td>
          </tr>
          <tr>
            <td>
              <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
                {{ ucfirst(strtolower(trim($Inscricao->experiencia->frequencia))) }}
              </p>
            </td>
          </tr>
          @if(!empty($Inscricao->experiencia->informacoes))
            @foreach($Inscricao->experiencia->informacoes as $Informacao)
              <tr>
                <td>
                  <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                    <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                  </p>
                  <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
                    {{ ucfirst(strtolower(trim($Informacao->descricao))) }}
                  </p>
                </td>
              </tr>
            @endforeach
          @endif
          <!-- Fim da Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
          <!-- Seção INFORMAÇÕES DA ONG -->
          <tr align="center">
            <td>
              <div style="padding:20px 15px; background-color:#ECEBEB; border-radius:15px; min-height:170px; height:170px; max-height:170px; min-width:450px; width:450px; max-width:450px; margin:40px auto 0; overflow:hidden;">
                <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center; padding-right:10px;">
                  <a href="{{ url('/experiencias/'.$Inscricao->experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                    <p style="margin-bottom: 0;">
                      <img src="{{ $Inscricao->experiencia->FotoOwnerUrlPublica }}" alt="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" title="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px" style="border-radius:50%;"/>
                    </p>
                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0; font-size:14px; line-height:18px;">
                      {{ $Inscricao->experiencia->owner_nome = (strlen(trim($Inscricao->experiencia->owner_nome)) > 30) ? ucfirst(substr(trim($Inscricao->experiencia->owner_nome),0,30)) . '[...]' : ucfirst(trim($Inscricao->experiencia->owner_nome)) }}
                    </p>
                  </a>
                  <p style="margin-top:10px; margin-bottom: 0;">
                    <span><a href="https://facebook.com/{{ $Inscricao->experiencia->owner->url_facebook }}" target="_blank" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-fb-circulo.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                    <span><a href="https://instagram.com/{{ $Inscricao->experiencia->owner->url_instagram }}" target="_blank" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-ig-circulo.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                    <span><a href="http://{{ $Inscricao->experiencia->owner->url_site = preg_replace('#^www\.(.+\.)#i', '$1', $Inscricao->experiencia->owner->url_site) }}" target="_blank" min-width="17px" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-link-circulo.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                  </p>
                </div>
                <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
                  <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
                    {{ $Inscricao->experiencia->owner_descricao = (strlen(trim($Inscricao->experiencia->owner_descricao)) > 260) ? substr(trim($Inscricao->experiencia->owner_descricao),0,260) . ' [...]' : trim($Inscricao->experiencia->owner_descricao) }}
                  </p>
                </div>
              </div>
            </td>
          </tr>
          <!-- Fim da Seção INFORMAÇÕES DA ONG -->
          <!-- Seção ENVIE SUA DÚVIDA OU SUGESTÃO  -->
          <tr align="center">
            <td>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; margin-top:30px; margin-bottom:0px;">
                Envie sua dúvida ou sugestão para
                <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">{{ env('VIVALA_LINK_EMAIL') }}</a>
              <p>
            </td>
          </tr>
          <!-- Fim da Seção ENVIE SUA DÚVIDA OU SUGESTÃO  -->
        </tbody>
      </table>
    </div>
  </td>
  <!-- Fim da Seção de INFORMAÇÕES -->
  <!-- Fim da Primeira SEÇÃO -->

@include('emails._footer')
