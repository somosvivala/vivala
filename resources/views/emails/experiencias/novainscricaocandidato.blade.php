<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - Experiência em Andamento</title>
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
    <body bgcolor="#D1D3D4" style="font-size: 100%; line-height: 1.6em; margin:0; padding:0; -webkit-font-smoothing:antialiased; height: 100%; -webkit-text-size-adjust:none; width: 100%!important;">
      <!-- Corpo -->
      <table bgcolor="#D1D3D4" style="padding:20px 20px 0 20px; width:100%;">
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
                      Falta apenas um passo para sua experiência acontecer!
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
          <td bgcolor="#D1D3D4" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:7px 20px;">
            <tr></tr>
          </td>
          <!-- Fim do Separador -->
          <!-- Corpo do Email -->
          <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%; padding-bottom:0; margin-top:20px;">
                <tbody>
                  <!-- Primeira SEÇÃO -->
                  <!-- Título da Primeira Estrutura -->
                  <tr align="center">
                    <td>
                      <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:26px; font-weight:bold; color:#FAA325; margin-bottom:20px;">
                        Você está quase lá!
                      </h1>
                    </td>
                  </tr>
                  <!-- Fim do Título da Primeira Estrutura -->
                  <!-- Imagem da Primeira Estrutura -->
                  <tr align="center">
                    <td>
                      <img src="{{ asset('img/email/vivala-pagamento-pendente-icone-2.png') }}" alt="{{ trans('global.lbl_almost_there') }}" title="{{ trans('global.lbl_almost_there') }}!" min-width="99px" width="auto" max-width="600px" min-height="99px" height="99px" max-height="99px" style="margin-bottom:20px;"/>
                    </td>
                  </tr>
                  <!-- Fim da Imagem da Primeira Estrutura -->
                  <!-- Seção de INFOS BANCÁRIAS -->
                  <tr align="center">
                    <td>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                        Para confirmar sua inscrição na experiência da <strong>{{ mb_strtoupper($Experiencia->owner->nome) }}</strong>
                      </p>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                        realize o depósito de <strong>R${{ $Experiencia->preco }}</strong> na conta a seguir:
                      </p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <div style="background-color:#ECEBEB; text-align:left; padding:10px; max-width:300px; margin-left:20px; margin-right:20px;">
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                          <b>NOME</b> <span>{{ $ExperienciasRepository->depositFantasyName }}</span>
                        </p>
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                          <b>CONTA</b> <span>{{ $ExperienciasRepository->depositCC }}</span>
                        </p>
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                          <b>AGÊNCIA</b> <span>{{ $ExperienciasRepository->depositAG }}</span>
                        </p>
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                          <b>CNPJ</b> <span>{{ $ExperienciasRepository->depositCNPJ }}</span>
                        </p>
                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454;">
                          <b>BANCO</b> <span>{{ $ExperienciasRepository->depositBank }}</span>
                        </p>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Seção de INFOS BANCÁRIAS -->
                  <!-- Seção do DEPÓSITO -->
                  <tr align="center">
                    <td>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; margin-top:30px;">
                        Não se esqueça de nos enviar o comprovante clicando no botão abaixo!
                      </p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <button style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; text-transform:uppercase; color:#F06F37; background-color:#FFFFFF; padding:15px 30px; border:1px solid #F06F37; margin-left:20px; margin-right:20px;">
                        ENVIAR COMPROVANTE DE DEPÓSITO
                      </button>
                    </td>
                  </tr>
                  <!-- Fim da Seção do DEPÓSITO -->
                  <!-- Seção do BOLETO BANCÁRIO -->
                  <tr align="center">
                    <td>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; margin-top:30px;">
                        Ou pague com boleto bancário:
                      </p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <div style="padding:15px 30px; border:1px solid #25A494; min-width:200px; width:200px; max-width:200px;">
                        <img style="display:inline-block; float:left; vertical-align:middle;" src="{{ asset('img/email/vivala-email-codigo-de-barras-icone.png') }}" min-width="55px" width="55px" max-width="55px" min-height="43px" height="43px" max-height="43px"/>
                        <span style="display:block; font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; color:#25A494; text-transform:uppercase; display:block; word-break:break-word; word-wrap:break-word; padding-left:60px;">
                          GERAR BOLETO
                        </span>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Seção do BOLETO BANCÁRIO -->
                  <!-- Divisor -->
                  <tr align="center">
                    <td>
                      <div style="border-bottom:1px solid #DCDEDF; width:500px; margin:50px 0;"></div>
                    </td>
                  </tr>
                  <!-- Fim do Divisor -->
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
                        <img src="{{ asset('img/dummy_ong-splash.png') }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
                      </p>
                      <p>
                        <img src="{{ asset('/img/email/vivala-email-data-icone.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="23px" width="23px" max-width="23px" min-height="25px" height="25px" max-height="25px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1.2em;">
                          <strong>{{ $Experiencia->proximaOcorrencia->data_ocorrencia->format('d/m/y') }}</strong>
                        </span>
                      </p>
                      <p>
                        <img src="{{ asset('/img/email/vivala-email-marcador-mapa-icone.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" style="vertical-align:top;" min-width="11px" width="11px" max-width="11px" min-height="16px" height="16px" max-height="16px"/>
                        <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
                          <strong>{{ ucfirst($Experiencia->local->nome) }} - {{ strtoupper($Experiencia->local->estado->sigla) }}</strong>
                        </span>
                      </p>
                      <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
                        {{ $Experiencia->descricao }}
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
                      <p style="float:left; margin-right:20px; margin-bottom:0px;">
                        <img src="{{ asset('img/email/vivala-email-agenda-icone.png') }}" min-width="19px" width="19px" max-width="19px" min-height="19px" height="19px" max-height="19px"/>
                      </p>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-bottom:0px;">
                        Semanal
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px; margin-bottom:0px;">
                        <img src="{{ asset('img/email/vivala-email-hora-icone.png') }}" min-width="19px" width="19px" max-width="19px" min-height="19px" height="19px" max-height="19px"/>
                      </p>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-bottom:0px;">
                        Todos os domingos
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px; margin-bottom:0px;">
                        <img src="{{ asset('img/email/vivala-email-pessoas-icone.png') }}" min-width="19px" width="19px" max-width="19px" min-height="19px" height="19px" max-height="19px"/>
                      </p>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-bottom:0px;">
                        Grupos de 10 pessoas
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
                  <!-- Seção INFORMAÇÕES DA ONG -->
                  <tr align="center">
                    <td>
                      <div style="padding:20px 15px; background-color:#ECEBEB; border-radius:15px; min-height:150px; height:150px; max-height:150px; min-width:450px; width:450px; max-width:450px; margin:40px auto 0; overflow:hidden;">
                        <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center;">
                          <a href="{{ url('/ong/'.$Experiencia->owner->prettyUrl->url) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                            <p style="margin-bottom: 0;">
                              <img src="{{ asset('img/dummy_ong-icon.png') }}" alt="{{ ucfirst($Experiencia->owner->nome) }}" title="{{ ucfirst($Experiencia->owner->nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px"/>
                            </p>
                            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0;">
                                {{ ucfirst($Experiencia->owner->nome) }}
                            </p>
                          </a>
                          <p style="margin-bottom: 0;">
                            <span><a href="https://facebook.com/{{ $Experiencia->owner->url_facebook }}" target="_blank" style="color:transparent!important;">
                              <img src="{{ asset('img/email/vivala-email-terceiros-fb-icone.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                            </a></span>
                            <span><a href="https://instagram.com/{{ $Experiencia->owner->url_instagram }}" target="_blank" style="color:transparent!important;">
                              <img src="{{ asset('img/email/vivala-email-terceiros-ig-icone.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                            </a></span>
                            <span><a href="http://{{ $Experiencia->owner->url_site }}" target="_blank" min-width="17px" style="color:transparent!important;">
                              <img src="{{ asset('img/email/vivala-email-terceiros-site-icone.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                            </a></span>
                          </p>
                        </div>
                        <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
                          <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
                            {{ $Experiencia->owner->descricao = (strlen($Experiencia->owner->descricao) > 13) ? substr($Experiencia->owner->descricao,0,260).' [...]' : $Experiencia->owner->descricao }}
                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Seção INFORMAÇÕES DA ONG -->
                  <!-- Seção ENVIE SUA DÚVIDA  -->
                  <tr align="center">
                    <td>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; margin-top:20px;">
                        Envie sua dúvida para
                        <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivalabrasil.com.br</a>
                      <p>
                    </td>
                  </tr>
                  <!-- Fim da Seção ENVIE SUA DÚVIDA  -->
                  <!-- Fim da Primeira SEÇÃO -->
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim do Corpo do Email -->
          <!-- Assinatura do Email -->
          <td bgcolor="#D1D3D4" style="clear:both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px 20px 0 20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tr>
                  <td align="center">
                    <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/email/vivala-email-fb-cor-icone.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/email/vivala-email-ig-cor-icone.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_site') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_site') }}" style="color:transparent;">
                      <img src="{{ asset('img/email/vivala-email-link-cor-icone.png') }}"/>
                    </a>
                    <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_email') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_email') }}" style="color:transparent;">
                      <img src="{{ asset('img/email/vivala-email-mail-cor-icone.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/email/vivala-email-in-cor-icone.png') }}"/>
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
                      Feito com <3 pela Vivalá - Conecte-se ao Brasil de verdade
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