<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - {{ isset($emailCabecalho) ? $emailCabecalho : '[ERRO] Cabeçalho não encontrado'  }}</title>
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
  <!-- Início do BODY -->
  <body bgcolor="#ECEBEB" style="font-size: 100%; line-height: 1.6em; margin:0; padding:0; -webkit-font-smoothing:antialiased; height: 100%; -webkit-text-size-adjust:none; width: 100%!important;">
    <!-- CORPO TOTAL do Email -->
    <table bgcolor="#ECEBEB" style="padding:20px 20px 0 20px; width:100%;">
      <tbody>
        <tr>
          <!-- Cabeçalho da Vivalá -->
          <td bgcolor="#F06F37" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:30px;">
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
                  @if(!empty($emailTitulo))
                    <tr align="center">
                      <td>
                        <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:26px; font-weight:normal; color:#FFFFFF; margin:40px 0 10px; margin-top:0; line-height:40px;">
                          {!! isset($emailTitulo) ? $emailTitulo : '[ERRO] TÍTULO do email não encontrado!' !!}
                        </h1>
                      </td>
                    </tr>
                  @endif
                  <!-- Fim do Título do EMAIL -->
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim do Cabeçalho da Vivalá -->
          <!-- Separador -->
          <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
            <tr></tr>
          </td>
          <!-- Fim do Separador -->
          <!-- CORPO MIOLO do Email -->
            @yield('email-conteudo')
          <!-- Fim do CORPO MIOLO do Email -->
          <!-- Seção ENVIE SUA DÚVIDA  -->
          <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%; padding-bottom:0; margin-top:20px;">
                <tbody>
                  <tr align="center">
                    <td>
                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; margin-top:20px;">
                        Envie sua dúvida para
                        <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivalabrasil.com.br</a>
                      <p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <!-- Fim da Seção ENVIE SUA DÚVIDA  -->
          <!-- ASSINATURA do Email -->
          <td bgcolor="#ECEBEB" style="clear:both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
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
          <!-- Fim da ASSINATURA do Email -->
        </tr>
      </tbody>
    </table>
    <!-- Fim do CORPO TOTAL -->
    <!-- RODAPÉ -->
    <table style="clear:both!important; width: 100%;">
      <tbody>
        <tr>
          <td style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:0 30px 20px 30px;">
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
    </table>
    <!-- Fim do RODAPÉ -->
  </body>
  <!-- Fim do BODY -->
</html>
