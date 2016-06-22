<!DOCTYPE html>
<html>
  <head>
    <title>TITULO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
    @import url('https://vivala.com.br/fonts/avenir/avenir.css');
    @import url('https://vivala.com.br/fonts/futura/futura.css');
    /***************************************
    * FONTES
    ***************************************/
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

      /***************************************
      * GLOBAL
      ***************************************/
        * {
          font-family: "Avenir Roman", "Helvetica", Helvetica, Arial, sans-serif;
          font-size: 100%;
          line-height: 1.6em;
          margin: 0;
          padding: 0;
        }
        img {
          max-width: 600px;
          width: auto;
        }
        body {
          -webkit-font-smoothing: antialiased;
          height: 100%;
          -webkit-text-size-adjust: none;
          width: 100% !important;
        }
      /***************************************
      * TIPOGRAFIA
      ***************************************/
      h1,
      h2,
      h3 {
        color: #111111;
        font-family: "FuturaBT Bold", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 200;
        line-height: 1.2em;
        margin: 40px 0 10px;
      }
      h1 {
        font-size: 30px;
      }
      h2 {
        font-size: 28px;
      }
      h3 {
        font-size: 22px;
      }
      p,
      ul,
      ol {
        font-size: 14px;
        font-weight: normal;
        margin-bottom: 10px;
      }
      ul li,
      ol li {
        margin-left: 5px;
        list-style-position: inside;
      }
      /***************************************
      * ELEMENTOS
      ***************************************/
      a {
        color: #F16F2B;
      }
      /***************************************
      * CORPO
      ***************************************/
      table.body-wrap {
        padding: 20px;
        width: 100%;
      }
      /***************************************
      * RODAPÉ
      ***************************************/
      table.footer-wrap {
        clear: both !important;
        width: 100%;
      }
      table.footer-wrap a {
        color: transparent;
      }
      /***************************************
      * RESPONSIVIDADE
      ***************************************/
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        clear: both !important;
        display: block !important;
        margin: 0 auto !important;
        max-width: 600px !important;
      }
      .container-divisor {
        clear: both !important;
        display: block !important;
        margin: 0 auto !important;
        max-width: 600px !important;
      }
      /* Set the padding on the td rather than the div for Outlook compatibility */
      .body-wrap .container {
        padding: 20px;
      }
      .body-wrap .container-divisor {
        padding: 5px 20px;
      }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        display: block;
        margin: 0 auto;
        max-width: 600px;
      }
      .content-header {
        display: block;
        margin: 0 auto;
        max-width: 600px;
        margin-bottom:20px;
      }
      /* Let's make sure tables in the content area are 100% wide */
      .content table {
        width: 100%;
      }
      </style>
      <link href='https://vivala.com.br/fonts/avenir/avenir.css' rel='stylesheet' type='text/css'>
      <link href='https://vivala.com.br/fonts/futura/futura.css' rel='stylesheet' type='text/css'>
  </head>
  <body bgcolor="#D1D3D4" style="font-size: 100%; line-height: 1.6em; margin:0; padding:0; -webkit-font-smoothing:antialiased; height: 100%; -webkit-text-size-adjust:none; width: 100%!important;">
    <!-- Corpo -->
    <table class="body-wrap" bgcolor="#D1D3D4" style="margin-bottom:10px; padding:20px; width:100%;">
      <tbody>
        <tr>
        <!-- Cabeçalho da Vivalá -->
        <td class="container" bgcolor="#F06F37" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
          <div class="content" style="display:block; margin:0 auto; max-width:600px;">
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
                  <h1 style="color: #FFFFFF; font-size:22px; font-family: 'FuturaBT Bold', Helvetica, Arial, 'Lucida Grande', sans-serif; font-weight:200; line-height:1.2em; margin:40px 0 10px; margin-top:0;">TITULO DO EMAIL</h1>
                </td>
              </tr>
              <!-- Fim do Título do EMAIL -->
              </tbody>
            </table>
          </div>
        </td>
        <!-- Fim do Cabeçalho da Vivalá -->
        <!-- Separador -->
        <td class="container-divisor" bgcolor="#D1D3D4" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
          <tr></tr>
        </td>
        <!-- Fim do Separador -->
        <!-- Corpo do Email -->
        <td class="container" bgcolor="#FFFFFF" style="clear:both !important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
          <div class="content" style="display:block; margin:0 auto; max-width:600px;">
            <!-- Seção TESTE -->
            <table style="width:100%; padding-bottom:0;">
              <tbody>
                <tr align="center">
                  <td>
                    <p>Testando envio de mensagem com formatação:</p>
                    <p>Olá, {{ $user->perfil->apelido }}</p>
                    <br/>
                    <!--img src="<?php/* echo $message->embed($user->perfil->getAvatarUrl());*/ ?>"-->
                    <br/>
                    <br/>
                    <p>Voce foi testado!</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Fim da Seção TESTE -->
            <table style="width:100%; padding-bottom:0;">
              <tbody>
                <!-- Seção ENVIE SUA DÚVIDA  -->
                <tr align="center">
                  <td>
                    <p style="margin-top:20px;">Envie sua dúvida para <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivalabrasil.com.br</a><p>
                  </td>
                </tr>
                <!-- Fim da Seção ENVIE SUA DÚVIDA  -->
              </tbody>
            </table>
          </div>
        </td>
        <!-- Fim do Corpo do Email -->
        <!-- Assinatura do Email -->
        <td class="container" bgcolor="#D1D3D4" style="clear:both !important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
          <div class="content" style="display:block; margin:0 auto; max-width:600px;">
            <table style="width: 100%;">
              <tr>
                <td align="center">
                  <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-fb-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-ig-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-link-cor-icone.png') }}"/>
                  </a>
                  <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-mail-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" style="color:transparent;">
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
    <table class="footer-wrap" style="clear:both!important; width:100%;"></footer>
    <!-- Fim do Rodapé -->
  </body>
</html>
