<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - Nova Inscrição na Experiência</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      @import url('https://vivala.com.br/fonts/avenir/avenir.css');
      @import url('https://vivala.com.br/fonts/futura/futura.css');
      @font-face {
        font-family: 'Avenir Light';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Light/Avenir-Light.svg#Avenir-Light') format('svg');
      }
      @font-face{
        font-family: 'Avenir Medium';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Medium/Avenir-Medium.svg#Avenir-Medium') format('svg');
      }
      @font-face{
        font-family: 'Avenir Roman';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Roman/Avenir-Roman.svg#Avenir-Roman') format('svg');
      }
      @font-face{
        font-family: 'Avenir Black';
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.eot');
        src: url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.woff') format('woff'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/avenir/Avenir-Black/Avenir-Black.svg#Avenir-Black') format('svg');
      }
      @font-face{
        font-family: 'FuturaBT Bold';
        src: url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/Futura-BTBold.eot');
        src: url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/Futura-BTBold?#iefix') format('embedded-opentype'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff2') format('woff2'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff') format('woff'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.ttf') format('truetype'),
        url('https:///vivala.com.br/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.svg#FuturaBT-Bold') format('svg');
      }
    </style>
    <link href='https://vivala.com.br/fonts/avenir/avenir.css' rel='stylesheet' type='text/css'>
    <link href='https://vivala.com.br/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
  </head>
  <body bgcolor="#ECEBEB" style="font-size: 100%; line-height: 1.6em; margin:0; padding:0; -webkit-font-smoothing:antialiased; height: 100%; -webkit-text-size-adjust:none; width: 100%!important;">
    <!-- Corpo -->
    <table bgcolor="#ECEBEB" style="padding:20px 20px 0 20px; width:100%;">
    <tbody>
        <tr>
          <!-- Cabeçalho da Vivalá -->
          <td bgcolor="#F06F37" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tbody>
                <!-- Logo da VIVALÁ -->
                <tr align="center">
                  <td>
                    <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank">
                      <img src="{{ asset('logo-branco.png') }}" alt="{{ trans('global.alt_vivala') }}" title="{{ trans('global.title_vivala') }}" border="0" min-width="107px" width="auto" max-width="600px" min-height="59px" height="59px" max-height="59px" style="display:block; margin:auto;">
                    </a>
                  </td>
                </tr>
                <!-- Fim do Logo da VIVALÁ -->
                <!-- Separador -->
                <tr align="center">
                  <td>
                    <div style="border-bottom:1px solid #FFFFFF; width:300px; margin:25px 0;"></div>
                  </td>
                </tr>
                <!-- Fim do Separador -->
                <!-- Título do EMAIL -->
                <tr align="center">
                  <td>
                    <h2 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:22px; font-weight:normal; color:#FFFFFF; line-height:1.2em; margin:40px 0 10px; margin-top:0;">
                      A experiência da <strong>{{ mb_strtoupper(trim($Inscricao->experiencia->owner_nome)) }}</strong> tem uma nova inscrição
                    </h2>
                  </td>
                </tr>
                <!-- Fim do Título do EMAIL -->
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim do Cabeçalho da Vivalá -->
          <!-- Separador -->
          <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
            <tr></tr>
          </td>
          <!-- Fim do Separador -->
          <!-- Corpo do Email -->
          <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%; padding-bottom:0; margin-top:20px; padding-bottom:0;">
                <tbody>
                  <!-- Primeira SEÇÃO -->
                  <!-- Seção DADOS DO USUÁRIO -->
                  <tr>
                    <td>
                      <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:0;">
                        Dados do usuário
                      </h3>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p><img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" alt="" title="" min-width="16px" width="16px" max-width="16px" min-height="17px" height="17px" max-height="17px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Nome: </span>
                        <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ $Inscricao->perfil->nome_completo }}
                        </span>
                      </p>
                      <p><img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" alt="" title="" min-width="20px" width="20px" max-width="20px" min-height="15px" height="15px" max-height="15px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Email: </span>
                        <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ $Inscricao->perfil->user->email }}
                        </span>
                      </p>
                      <p><img src="{{ asset('/img/icones/png/cinza-hashtag.png') }}" alt="" title="" min-width="19px" width="19px" max-width="19px" min-height="16px" height="16px" max-height="16px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">ID da Inscrição: </span>
                        <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ str_pad(trim($Inscricao->id), 4, '0', STR_PAD_LEFT) }}
                        </span>
                      </p>
                      <p><img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="" title="" min-width="19px" width="19px" max-width="19px" min-height="16px" height="16px" max-height="16px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Data da Inscrição: </span>
                        <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ $Inscricao->dataExperiencia->format('d/m/Y') }}
                        </span>
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Seção DADOS DO USUÁRIO -->
                  <!-- Separador -->
                  <tr align="center">
                    <td>
                      <div style="border-bottom: 1px solid #ECEBEB; width:300px; margin:25px 0;"></div>
                    </td>
                  </tr>
                  <!-- Fim do Separador -->
                  <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
                  <tr>
                    <td style="padding-bottom:30px;">
                      <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                        Informações da Experiência
                      </h3>
                      <p style="float:left; margin-top:0; margin-bottom:0;">
                        <img src="{{ $Inscricao->experiencia->FotoOwnerUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
                        <span style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; position:relative; right:40px; bottom:190px; color:#FFFFFF; background-color:#F06F37; padding: 5px 15px;" title="ID da Experiência">ID {{ str_pad(trim($Inscricao->experiencia->id), 3, '0', STR_PAD_LEFT) }}</span>
                      </p>
                      <p style="margin-top:10px; margin-bottom:10px;">
                        <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                          TIPO/FREQUÊNCIA
                        </span>
                        <br>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          @if($Inscricao->experiencia->isEventoUnico) Evento Único
                          @elseif ($Inscricao->experiencia->isEventoRecorrente) Evento Recorrente
                          @elseif ($Inscricao->experiencia->isEventoServico) Evento Serviço
                          @endif
                        </span>
                      </p>
                      <p style="margin-top:10px; margin-bottom: 10px;">
                        <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                          PREÇO
                        </span>
                        <br>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          R${{ $Inscricao->experiencia->preco }}
                        </span>
                      </p>
                      <p style="margin-top:10px; margin-bottom: 10px;">
                        <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                          LOCAL
                        </span>
                        <br>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}
                        </span>
                      </p>
                      <p style="margin-top:10px; margin-bottom: 10px;">
                        <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                          ENDEREÇO
                        </span>
                        <br>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                          {{ ucfirst($Inscricao->experiencia->endereco_completo) }}
                        </span>
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
                  <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
                  <tr>
                    <td style="padding-bottom:30px;">
                      <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                        Descrição Completa
                      </h3>
                      <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                        {{ trim($Inscricao->experiencia->descricao) }}
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
                  <!-- Seção DETALHES DA EXPERIÊNCIA -->
                  <tr>
                    <td style="padding-bottom:30px;">
                      <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                        Detalhes
                      </h3>
                      <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                        {{ trim($Inscricao->experiencia->detalhes) }}
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
                  <!-- Seção DETALHES EXTRAS DA EXPERIÊNCIA -->
                  @if(!empty($Inscricao->experiencia->informacoes))
                    <tr>
                      <td>
                        <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                          Informações Extras
                        </h3>
                      </td>
                    </tr>
                    @foreach($Inscricao->experiencia->informacoes as $Informacao)
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
          <!-- Fim do Corpo do Email -->
          <!-- Assinatura do Email -->
          <td bgcolor="#ECEBEB" style="clear:both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px 20px 0 20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tr>
                  <td align="center">
                    <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-fb-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-ig-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_site') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_site') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-vivala-circulo.png') }}"/>
                    </a>
                    <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_email') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_email') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-email-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-in-circulo.png') }}"/>
                    </a>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <!-- Fim da Assinatura do Email -->
        </tr>
      </tbody>
    </table>
    <!-- Fim do Corpo -->
    <!-- Rodapé -->
    <table style="clear:both!important; width: 100%;">
      <tbody>
        <tr>
          <td style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:0 20px 20px 20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tbody>
                <tr align="center">
                  <td>
                    <h4 style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:10px; font-weight:200; line-height:1.2em; margin-top:0;">
                      Feito com carinho pela Vivalá - Conecte-se ao Brasil de verdade
                    </h4>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </footer>
    <!-- Fim do Rodapé -->
  </body>
</html>
